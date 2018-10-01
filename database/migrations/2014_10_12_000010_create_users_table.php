<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            //custom file
            $table->integer('cc');
            $table->string('last_name')->nullable();
            $table->date('init_at')->nullable();
            $table->date('finish_at')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('cell')->nullable();
            $table->enum('uniform_size', ['xs', 's', 'm','l','xl'])->default('s');
            $table->enum('gender', ['m', 'f', 'o'])->default('o');
            $table->integer('shoe_size')->nullable();
            $table->string('img_url')->nullable();
            $table->date('birthday');

            /**
             * Foreignkeys section
             */        
            $table->integer('ep_id')->unsigned()->nullable();
            $table->foreign('ep_id')->references('id')->on('eps')->onDelete('cascade');

            $table->integer('pension_id')->unsigned()->nullable();
            $table->foreign('pension_id')->references('id')->on('pensions')->onDelete('cascade');

            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('users');
    }
}
