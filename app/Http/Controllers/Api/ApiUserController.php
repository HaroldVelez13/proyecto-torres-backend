<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Ep;
use App\Pension;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Http\File;
use App\Http\Requests\UserCreate;
use App\Http\Requests\UserUpdate;


class ApiUserController extends Controller
{
    private $path;
    private $image_url;

    public function __construct()
    {
        $this->path =  'avatars';
        $this->image_url=null;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        foreach ($users as $user){            
            $firstRol = $user->roles->first();
            $user->rol = $firstRol['name'];
                        
        }       
        return response()->json(['users' => $users], 200);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getEpsPensions()
    { 

        $eps = Ep::all();
        $pensions = Pension::all();

        return response()->json(['eps'=>$eps, 'pensions'=>$pensions], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(UserCreate $userRequest)
    {   
        if ($userRequest->password) {
            $userRequest->password = $userRequest->cc;
        }
        $this->image_url = $userRequest->img_url;
        $image = new ImageHelper($this->path, $this->image_url);

        if (!$userRequest->rol) {
            $userRequest->rol = 'employe';
        }

        $user = new User();
        $user->name         = $userRequest->name;          
        $user->last_name    = $userRequest->last_name;    
        $user->email        = $userRequest->email;        
        $user->password     = Hash::make($userRequest->password);   
        $user->cc           = $userRequest->cc;         
        $user->init_at      = $userRequest->init_at;    
        $user->address      = $userRequest->address;      
        $user->phone        = $userRequest->phone;        
        $user->cell         = $userRequest->cell;         
        $user->uniform_size = $userRequest->uniform_size;  
        $user->shoe_size    = $userRequest->shoe_size;                    
        $user->img_url      = $image->saveImage();     
        $user->birthday     = $userRequest->birthday;    
        $user->ep_id        = $userRequest->ep_id;          
        $user->pension_id   = $userRequest->pension_id;      
        $user->gender       = $userRequest->gender;            

        $user->save();
        $user->assignRole($userRequest->rol);

        return response()->json(['user'=>$user], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::findOrfail($id);
        $firstRol = $user->roles->first();
        $user->rol = $firstRol['name'];
        $eps = Ep::all();
        $pensions = Pension::all();

        return response()->json(['user'=>$user, 'eps'=>$eps, 'pensions'=>$pensions], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdate $userRequest, $id)
    {
        //
        $user = User::findOrfail($id);

        //Validate change to Image            

        if ( $user->img_url != $userRequest->img_url ) {
            $image_url_new = $userRequest->img_url;
            $image_url_old = $user->img_url;        
            $image = new ImageHelper($this->path, $this->image_url, $image_url_new, $image_url_old);
            $user->img_url = $image->updateImage();
        }

        $user->name         = $userRequest->name;          
        $user->last_name    = $userRequest->last_name;    
        $user->email        = $userRequest->email;        
        $user->cc           = $userRequest->cc;         
        $user->init_at      = $userRequest->init_at;    
        $user->finish_at    = $userRequest->finish_at;    
        $user->address      = $userRequest->address;      
        $user->phone        = $userRequest->phone;        
        $user->cell         = $userRequest->cell;         
        $user->uniform_size = $userRequest->uniform_size;  
        $user->shoe_size    = $userRequest->shoe_size;                    
        $user->birthday     = $userRequest->birthday;    
        $user->ep_id        = $userRequest->ep_id;          
        $user->pension_id   = $userRequest->pension_id;      
        $user->gender       = $userRequest->gender;                 

        $user->save();

        //validate chage rol
        if ($userRequest->rol) {
           
        
            $firstRol = $user->roles->first();
            $rol_old= $firstRol['name'];
            if ($rol_old != $userRequest->rol) {
                if ($rol_old) {
                   $user->removeRole($rol_old);
                }
                if (!$userRequest->rol) {
                    $userRequest->rol='employe';
                }
                $user->assignRole($userRequest->rol);
            }     
        }

        return response()->json(['user'=>$user], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminChangePassword(Request $request, $id){
        $data = $request->validate([
            'password' => 'required|string|min:6',
            'password_confirm' => 'required|string|min:6',
        ]); 

        if($request->password == $request->password_confirm){
            $user = User::findOrfail($id);
            $user->password = Hash::make($request->password);
            return response()->json(['success'=>'Contraseña Reestablecia'], 200);
        }  
        return response()->json(['errors'=>'Los campos deben ser iguales'], 422);     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrfail($id);

        $this->image_url =  $user->img_url;      
        $image = new ImageHelper($this->path, $this->image_url);
        $image->DeleteImage();


        $firstRol = $user->roles->first();
        $rol= $firstRol['name'];
        if ($rol) {           
            $user->removeRole($rol);                
        }
        
        
        $user->delete();

        return response()->json('ok', 200);

    }   

}
