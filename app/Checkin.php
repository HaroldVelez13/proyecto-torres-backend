<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Checkin.
 *
 * @author  The scaffold-interface created at 2018-08-03 08:51:19pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Checkin extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'checkins';

	
}
