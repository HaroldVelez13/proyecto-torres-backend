<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pension.
 *
 * @author  The scaffold-interface created at 2018-08-03 08:29:22pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Pension extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'pensions';


    public function users()
    {
        return $this->hasMany('App\User');
    }
	
}
