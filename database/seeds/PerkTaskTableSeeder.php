<?php

use Illuminate\Database\Seeder;

class PerkTaskTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('perk_tasks')->delete();

		\DB::table('perk_tasks')->insert(array (
			0 =>
			array (
				'title' => "Give thanks in social networks",
				'description' => "Facebook, twitter, instagram!!,",
				'type' => '0',
				'status' => '0',
				'event_id' => '1003',
				'user_id' => '1003',
				'perk_id' => '1',
			),
			1 =>
			array (
				'title' => "Give you $300 usd more",
				'description' => "Via paypal",
				'type' => '0',
				'status' => '0',
				'event_id' => '1003',
				'user_id' => '1003',
				'perk_id' => '1',
			),
		));
	}

}
