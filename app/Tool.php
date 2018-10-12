<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tool.
 *
 * @author  The scaffold-interface created at 2018-08-01 02:40:00am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Tool extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	protected $hidden = ['deleted_at'];

    public $timestamps = false;
    
    protected $table = 'tools';

	
	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	/* The checkins that belong to the tool.
    */
    public function checkins()
    {
        return $this->belongsToMany('App\Checkin');
    }

}
