<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ep.
 *
 * @author  The scaffold-interface created at 2018-08-03 08:28:31pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Ep extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'eps';
    /**
     * Get the Users for the Eps.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
	
}
