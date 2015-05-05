<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponzorsEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sponzors_events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sponzor_id')->unsigned();
			$table->foreign('sponzor_id')->references('id')->on('users');
			$table->integer('peak_id')->unsigned();
			$table->foreign('peak_id')->references('id')->on('peaks');
			$table->integer('event_id')->unsigned();
			$table->foreign('event_id')->references('id')->on('events');
			$table->boolean('status');
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
		Schema::drop('sponzors_events');
	}

}
