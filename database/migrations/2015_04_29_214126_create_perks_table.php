<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('kind');
			$table->string('usd');
			$table->integer('total_quantity');
			$table->integer('reserved_quantity')->default(0);
			$table->integer('id_event')->unsigned();
			$table->foreign('id_event')->references('id')->on('events')->onDelete('cascade');
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
		Schema::drop('perks');
	}

}
