<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Jobs.
 *
 * @author  The scaffold-interface created at 2018-08-01 02:29:53am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Jobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('jobs',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('business_person');
        
        $table->String('principal_phone');
        
        $table->String('optional_phone')->nullable();
        
        $table->date('init_date')->nullable();
        
        $table->date('finish_date')->nullable();

        $table->String('city')->nullable();        

        
        
        
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
        Schema::drop('jobs');
    }
}
