<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Slides.
 *
 * @author  The scaffold-interface created at 2018-08-03 09:03:40pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Slides extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('slides',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('name')->nullable();
        
        $table->String('description')->nullable();
        
        $table->String('url_slide');        
        
        $table->enum('state', ['active', 'inactive'])->default('inactive');
        
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
        Schema::drop('slides');
    }
}
