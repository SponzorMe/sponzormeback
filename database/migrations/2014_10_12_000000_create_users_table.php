<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->boolean('activated');
			$table->string('activation_code');
			$table->string('activated_at');
			$table->string('last_login');
			$table->string('persist_code');
			$table->string('reset_password_code');
			$table->string('company');
			$table->boolean('sex');
			$table->unsignedInteger('age');
			$table->unsignedInteger('custom_status');
			$table->string('login_code');
			$table->string('login_valid_until');
			$table->string('lang',5);
			$table->string('image');
			$table->longText('description');
			$table->string('eventbriteKey');
			$table->string('meetupRefreshKey');
			$table->unsignedInteger('comunity_size');
			$table->string('location');
			$table->string('location_reference');
			$table->boolean('demo');
			$table->boolean('type');
			$table->boolean('status');
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
