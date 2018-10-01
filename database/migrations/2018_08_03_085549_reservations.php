<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Reservations.
 *
 * @author  The scaffold-interface created at 2018-08-03 08:55:49pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Reservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('reservations',function (Blueprint $table){

        $table->increments('id');
        
        $table->date('date');
        
        /**
         * Foreignkeys section
         */
        
        $table->integer('job_id')->unsigned()->nullable();
        $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
        
        
        
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
        Schema::drop('reservations');
    }
}
