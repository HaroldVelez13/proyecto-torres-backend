<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Checkins.
 *
 * @author  The scaffold-interface created at 2018-08-03 08:51:19pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Checkins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('checkins',function (Blueprint $table){

        $table->increments('id');
        
        $table->date('date');
        
        $table->String('url_image');
        
        $table->integer('total');
        
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
        Schema::drop('checkins');
    }
}
