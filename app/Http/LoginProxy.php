<?php
namespace App\Http;

use Illuminate\Foundation\Application;
use App\Exceptions\UserNotFoundException;
use App\User;
use Illuminate\Http\Request;

class LoginProxy
{
    const REFRESH_TOKEN = 'refreshToken';

    private $user;

    private $auth;

    private $cookie;

    private $db;

    private $request;

    private $userRepository;

    public function __construct(Application $app, User $userRepository) {
        $this->userRepository = $userRepository;

        $this->auth = $app->make('auth');
        $this->cookie = $app->make('cookie');
        $this->db = $app->make('db');
        $this->request = $app->make('request');
    }

    /**
     * Attempt to create an access token using user credentials
     *
     * @param string $email
     * @param string $password
     */
    public function attemptLogin($email, $password)
    {
        $this->user = $this->userRepository->where('email', $email)->first();

        if (!is_null($this->user)) {
            return $this->proxy("password", [
                'username' => $email,
                'password' => $password
            ]);
        }

        throw new UserNotFoundException();
    }

    /**
     * Attempt to refresh the access token used a refresh token that
     * has been saved in a cookie
     */
    public function attemptRefresh()
    {
        $refreshToken = $this->request->cookie(self::REFRESH_TOKEN);

        return $this->proxy('refresh_token', [
            'refresh_token' => $refreshToken
        ]);
    }

    /**
     * Proxy a request to the OAuth server.
     *
     * @param string $grantType what type of grant type should be proxied
     * @param array $data the data to send to the server
     */
    public function proxy($grantType, array $data = [])
    {
        $form_params = array_merge($data, [
            'client_id'     => env('PASSWORD_CLIENT_ID'),
            'client_secret' => env('PASSWORD_CLIENT_SECRET'),
            'grant_type'    => $grantType,
            'scope'         => '*'
        ]);
        
        $req = Request::create('oauth/token', 'POST', $form_params);
        $response = app()->handle($req);   
      
        if (!$response->isSuccessful()) {
            throw new UserNotFoundException();
        }
       
        $data = json_decode($response->getContent());
        // Create a refresh token cookie
        $this->cookie->queue(
            self::REFRESH_TOKEN,
            $data->refresh_token,
            864000, // 10 days
            null,
            null,
            false,
            true // HttpOnly
        );

        $user = $this->user;
        $firstRol = $user->roles->first();
        $rol = $firstRol['name'];      

        return  ['token' => $data->access_token, 'user'=>  $user,'rol'=>  $rol] ;
    }

    /**
     * Logs out the user. We revoke access token and refresh token.
     * Also instruct the client to forget the refresh cookie.
     */
    public function logout()
    {
        $accessToken = $this->auth->user()->token();

        $refreshToken = $this->db
            ->table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);

        $accessToken->revoke();

        $this->cookie->queue($this->cookie->forget(self::REFRESH_TOKEN));
    }
}