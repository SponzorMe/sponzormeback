<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksSponzorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('task_sponzors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('task_id')->unsigned();
			$table->foreign('task_id')->references('id')->on('perk_tasks');
			$table->integer('perk_id')->unsigned();
			$table->foreign('perk_id')->references('id')->on('perks');
			$table->integer('sponzor_id')->unsigned();
			$table->foreign('sponzor_id')->references('id')->on('users');
			$table->integer('organizer_id')->unsigned();
			$table->foreign('organizer_id')->references('id')->on('users');
			$table->integer('event_id')->unsigned();
			$table->foreign('event_id')->references('id')->on('events');
			$table->integer('sponzorship_id')->unsigned();
			$table->foreign('sponzorship_id')->references('id')->on('sponzorship');
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
		Schema::drop('task_sponzors');
	}

}
