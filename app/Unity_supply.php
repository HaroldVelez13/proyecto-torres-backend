<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Unity_supply.
 *
 * @author  The scaffold-interface created at 2018-08-01 02:35:12am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Unity_supply extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    public $timestamps = false;
    
    protected $table = 'unity_supplies';

	
	public function supply()
	{
		return $this->belongsTo('App\Supply','supply_id');
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
