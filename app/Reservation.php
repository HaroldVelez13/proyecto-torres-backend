<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Reservation.
 *
 * @author  The scaffold-interface created at 2018-08-03 08:55:49pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Reservation extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'reservations';

	
	public function job()
	{
		return $this->belongsTo('App\Job','job_id');
	}

	
}
