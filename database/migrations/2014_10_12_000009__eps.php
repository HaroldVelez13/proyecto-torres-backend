<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Eps.
 *
 * @author  The scaffold-interface created at 2018-08-03 08:28:31pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Eps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('eps',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('name');       


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('eps');
    }
}
