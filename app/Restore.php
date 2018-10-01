<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Restore.
 *
 * @author  The scaffold-interface created at 2018-08-03 08:59:29pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Restore extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'restores';

	
	public function reservation()
	{
		return $this->belongsTo('App\Reservation','reservation_id');
	}

	
}
