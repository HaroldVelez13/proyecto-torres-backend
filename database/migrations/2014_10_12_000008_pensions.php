<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Pensions.
 *
 * @author  The scaffold-interface created at 2018-08-03 08:29:22pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Pensions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('pensions',function (Blueprint $table){

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
        Schema::drop('pensions');
    }
}
