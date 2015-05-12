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
				'title' => 1,
				'description' => "lksdfjalkfjalskdfjdsalk",
				'type' => '23',
				'status' => '4',				
				'event_id' => '1',
				'user_id' => '1',
				'perk_id' => '1',
			),
		));
	}

}