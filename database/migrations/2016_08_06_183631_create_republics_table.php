<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepublicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('republics', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->string('name');
            $table->string('description');
            $table->string('telephone');
            $table->integer('simple_rooms');
            $table->integer('suite_rooms');
            $table->string('street');
            $table->string('neighbourhood');
            $table->string('city');
            $table->string('state');
            $table->integer('vacancy');
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
        Schema::drop('republics');
    }
}
