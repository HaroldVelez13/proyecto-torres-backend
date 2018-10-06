<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Tools.
 *
 * @author  The scaffold-interface created at 2018-08-01 02:40:00am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Tools extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('tools',function (Blueprint $table){

        $table->increments('id');        
        $table->String('barcode')->unique();
        $table->integer('total');
        
        $table->enum('state', ['activo', 'inactivo'])->default('activo');
        $table->enum('type', ['herramienta', 'insumo']);
        
        /**
         * Foreignkeys section
         */
        
        $table->integer('category_id')->unsigned()->nullable();
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        
        
        
        $table->softDeletes();
        
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
        Schema::drop('tools');
    }
}
