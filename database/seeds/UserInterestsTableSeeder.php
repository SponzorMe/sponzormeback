<?php

use Illuminate\Database\Seeder;

class UserInterestsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('users_interests')->delete();

		\DB::table('users_interests')->insert(array (
			0 =>
			array (
				'user_id' => '1002',
				'interest_id' => '3',
			),
			3 =>
			array (
				'user_id' => '1002',
				'interest_id' => '4',
			),
			4 =>
			array (
				'user_id' => '1003',
				'interest_id' => '5',
			),
		));
	}

}
