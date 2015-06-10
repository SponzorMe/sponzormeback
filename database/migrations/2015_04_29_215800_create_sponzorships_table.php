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
			$table->integer('perk_id')->unsigned();
			$table->foreign('perk_id')->references('id')->on('perks');
			$table->integer('event_id')->unsigned();
			$table->foreign('event_id')->references('id')->on('events');
			$table->boolean('status')->default(0);
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
