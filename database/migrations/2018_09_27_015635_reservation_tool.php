<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReservationTool extends Migration
{
       /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_toll',function (Blueprint $table){

                
        /**
         * Foreignkeys section
         */
        $table->integer('reservation_id')->unsigned()->nullable();
        $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
        
        $table->integer('tool_id')->unsigned()->nullable();
        $table->foreign('tool_id')->references('id')->on('tools')->onDelete('cascade');
        
        
        
        $table->softDeletes();
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reservation_toll');
       
    }
}
