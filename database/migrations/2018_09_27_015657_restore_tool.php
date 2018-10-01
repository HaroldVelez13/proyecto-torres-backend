<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RestoreTool extends Migration
{
       /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restore_toll',function (Blueprint $table){

                
        /**
         * Foreignkeys section
         */
        $table->integer('restore_id')->unsigned()->nullable();
        $table->foreign('restore_id')->references('id')->on('restores')->onDelete('cascade');
        
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
        Schema::drop('restore_toll');
       
    }
}
