<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepublicUsersTable extends Migration
{
    /**
        * Run the migrations.
        *
        * @return void
        */
       public function up()
       {
           Schema::create('republic_users', function (Blueprint $table) {
               $table->integer('user_id')->unsigned()->index();
               $table->foreign('user_id')->references('id')
                   ->on('users')->onUpdate('cascade')->onDelete('cascade');

               $table->integer('republic_id')->unsigned()->index();
               $table->foreign('republic_id')->references('id')
                   ->on('republics')->onUpdate('cascade')->onDelete('cascade');

               $table->primary(['user_id', 'republic_id']);
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
           Schema::drop('republic_users');
       }
}
