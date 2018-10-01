<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasRoles, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 
                            'last_name', 
                            'email',
                            'password',
                            'cc',
                            'init_at',
                            'finish_at',
                            'address',
                            'phone',
                            'cell',
                            'uniform_size',
                            'shoe_size',
                            'img_url',
                            'birthday',
                            'ep_id', 
                            'pension_id',
                            'gender'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password','roles'];
    /**
     * The Eps that belong to the user.
    */
    public function ep()
    {
        return $this->belongsTo('App\Ep','eps_id');
    }
    /**
     * The pension that belong to the user.
    */
    public function pension()
    {
        return $this->belongsTo('App\pension','pension_id');
    }

    /**
     * The jos that belong to the user.
    */
    public function jobs()
    {
        return $this->belongsToMany('App\Job');
    }
}
