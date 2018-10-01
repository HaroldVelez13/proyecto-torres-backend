<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Job.
 *
 * @author  The scaffold-interface created at 2018-08-01 02:29:53am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Job extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'jobs';

    /**
     * The Users that belong to the job.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

	
}
