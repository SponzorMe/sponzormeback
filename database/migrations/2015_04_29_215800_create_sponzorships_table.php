<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponzorshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sponzorships', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sponzor_id')->unsigned();
			$table->foreign('sponzor_id')->references('id')->on('users');
<<<<<<< HEAD
<<<<<<< HEAD
=======
			$table->integer('organizer_id')->unsigned();
			$table->foreign('organizer_id')->references('id')->on('users');
>>>>>>> local
=======
			$table->integer('organizer_id')->unsigned();
			$table->foreign('organizer_id')->references('id')->on('users');
>>>>>>> staging
			$table->integer('perk_id')->unsigned();
			$table->foreign('perk_id')->references('id')->on('perks');
			$table->integer('event_id')->unsigned();
			$table->foreign('event_id')->references('id')->on('events');
			$table->boolean('status')->default(0);
<<<<<<< HEAD
<<<<<<< HEAD
=======
			$table->longText('cause');
>>>>>>> local
=======
			$table->longText('cause');
>>>>>>> staging
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
		Schema::drop('sponzorships');
	}

}
