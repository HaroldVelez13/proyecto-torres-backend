<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Restores.
 *
 * @author  The scaffold-interface created at 2018-08-03 08:59:29pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Restores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('restores',function (Blueprint $table){

        $table->increments('id');
        
        $table->date('date');
        
        /**
         * Foreignkeys section
         */
        
        $table->integer('reservation_id')->unsigned()->nullable();
        $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
        
        
        
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
        Schema::drop('restores');
    }
}
