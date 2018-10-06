<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category.
 *
 * @author  The scaffold-interface created at 2018-08-01 02:38:51am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Category extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'categories';

     /**
     * The tools that belong to the category.
    */
    public function tools()
    {
        return $this->belongsToMany('App\Tool');
    }

	
}
