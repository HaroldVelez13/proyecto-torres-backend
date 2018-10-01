<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Supply.
 *
 * @author  The scaffold-interface created at 2018-08-01 02:32:02am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Supply extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'supplies';

	
}
