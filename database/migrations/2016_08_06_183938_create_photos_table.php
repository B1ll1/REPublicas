<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function(Blueprint $table) {
            		$table->increments('id');
            		$table->integer('republic_id')->unsigned()->index();
            		$table->foreign('republic_id')->references('id')->on('republics')->onUpdate('cascade')
            		    ->onDelete('cascade');
            		$table->string('path');
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
		Schema::drop('photos');
	}

}
