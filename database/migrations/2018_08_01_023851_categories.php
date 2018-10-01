<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Tool_categories.
 *
 * @author  The scaffold-interface created at 2018-08-01 02:38:51am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Categories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('categories',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('name');
        
        $table->String('material')->nullable();
        
        $table->String('description')->nullable();
        
        $table->integer('min_stock')->nullable();
        
        /**
         * Foreignkeys section
         */
        
        
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
