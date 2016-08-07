<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rooms', function(Blueprint $table) {
		            $table->increments('id');
		            $table->integer('republic_id')->index()->unsigned();
		            $table->foreign('republic_id')->references('id')->on('republics')
		                       ->onUpdate('cascade')->onDelete('cascade');
		            $table->integer('num_beds');
		            $table->enum('type', ['normal', 'suite']);
		            $table->decimal('price');
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
		Schema::drop('rooms');
	}

}
