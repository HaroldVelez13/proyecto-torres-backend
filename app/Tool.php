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
    
	
    public $timestamps = true;
    
    protected $table = 'tools';

	
	public function category()
	{
		return $this->belongsTo('App\category','category_id');
	}

	

	// /**
 //     * check_in.
 //     *
 //     * @return  \Illuminate\Support\Collection;
 //     */
 //    public function check_ins()
 //    {
 //        return $this->belongsToMany('App\Check_in');
 //    }

 //    /**
 //     * Assign a check_in.
 //     *
 //     * @param  $check_in
 //     * @return  mixed
 //     */
 //    public function assignCheck_in($check_in)
 //    {
 //        return $this->check_ins()->attach($check_in);
 //    }
 //    /**
 //     * Remove a check_in.
 //     *
 //     * @param  $check_in
 //     * @return  mixed
 //     */
 //    public function removeCheck_in($check_in)
 //    {
 //        return $this->check_ins()->detach($check_in);
 //    }


	// /**
 //     * check_in.
 //     *
 //     * @return  \Illuminate\Support\Collection;
 //     */
 //    public function check_ins()
 //    {
 //        return $this->belongsToMany('App\Check_in');
 //    }

 //    /**
 //     * Assign a check_in.
 //     *
 //     * @param  $check_in
 //     * @return  mixed
 //     */
 //    public function assignCheck_in($check_in)
 //    {
 //        return $this->check_ins()->attach($check_in);
 //    }
 //    /**
 //     * Remove a check_in.
 //     *
 //     * @param  $check_in
 //     * @return  mixed
 //     */
 //    public function removeCheck_in($check_in)
 //    {
 //        return $this->check_ins()->detach($check_in);
 //    }

}
