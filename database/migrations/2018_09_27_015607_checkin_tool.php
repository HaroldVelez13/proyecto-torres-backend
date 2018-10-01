<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CheckinTool extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkin_toll',function (Blueprint $table){

                
        /**
         * Foreignkeys section
         */
        $table->integer('checkin_id')->unsigned()->nullable();
        $table->foreign('checkin_id')->references('id')->on('checkins')->onDelete('cascade');
        
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
        Schema::drop('checkin_toll');
       
    }
}
