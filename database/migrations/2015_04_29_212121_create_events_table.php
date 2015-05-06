<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('location');
			$table->timestamp('ends');
			$table->timestamp('starts');
			$table->string('location_reference');
			$table->integer('organizer')->unsigned();
			$table->foreign('organizer')->references('id')->on('users');
			$table->string('image');
			$table->longText('description');
			$table->integer('category')->unsigned();
			$table->foreign('category')->references('id')->on('categories');
			$table->integer('type')->unsigned();
			$table->foreign('type')->references('id')->on('event_types');
			$table->boolean('privacy');
			$table->string('lang',5);
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
		Schema::drop('events');
	}

}
