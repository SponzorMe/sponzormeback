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
			$table->integer('organizer_id')->unsigned();
			$table->foreign('organizer_id')->references('id')->on('users');
=======
>>>>>>> 886196f6324c74af87a64306a83398414c37e1b1
			$table->integer('perk_id')->unsigned();
			$table->foreign('perk_id')->references('id')->on('perks');
			$table->integer('event_id')->unsigned();
			$table->foreign('event_id')->references('id')->on('events');
			$table->boolean('status')->default(0);
<<<<<<< HEAD
			$table->longText('cause');
=======
>>>>>>> 886196f6324c74af87a64306a83398414c37e1b1
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
