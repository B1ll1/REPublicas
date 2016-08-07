<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function(Blueprint $table) {
            		$table->increments('id');
            		$table->integer('republic_id')->index()->unsigned();
            		$table->foreign('republic_id')->references('id')->on('republics')
            		            ->onUpdate('cascade')->onDelete('cascade');
            		$table->integer('user_id')->index()->unsigned();
            		$table->foreign('user_id')->references('id')->on('users')
            		            ->onUpdate('cascade')->onDelete('cascade');
            		$table->string('message')->nullable();
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
		Schema::drop('notifications');
	}

}
