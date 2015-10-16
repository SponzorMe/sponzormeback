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
<<<<<<< HEAD
        
		\DB::table('perk_tasks')->insert(array (
			0 => 
			array (
				'title' => 1,
				'description' => "lksdfjalkfjalskdfjdsalk",
				'type' => '23',
				'status' => '4',				
=======

		\DB::table('perk_tasks')->insert(array (
			0 =>
			array (
				'title' => "Give thanks in social networks",
				'description' => "Facebook, twitter, instagram!!,",
				'type' => '0',
				'status' => '0',
				'event_id' => '1',
				'user_id' => '1',
				'perk_id' => '1',
			),
			1 =>
			array (
				'title' => "Give you $300 usd more",
				'description' => "Via paypal",
				'type' => '1',
				'status' => '0',
>>>>>>> local
				'event_id' => '1',
				'user_id' => '1',
				'perk_id' => '1',
			),
		));
	}

<<<<<<< HEAD
}
=======
}
>>>>>>> local
