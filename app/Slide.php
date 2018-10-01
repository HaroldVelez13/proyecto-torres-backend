<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Slide.
 *
 * @author  The scaffold-interface created at 2018-08-03 09:03:40pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Slide extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'slides';

	
}
