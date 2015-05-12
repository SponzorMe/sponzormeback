<?php

use Illuminate\Database\Seeder;

class TasksSponzorsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('task_sponzors')->delete();
        
		\DB::table('task_sponzors')->insert(array (
			0 => 
			array (
				'status' => 1,				
				'event_id' => '1',
				'organizer_id' => '1',
				'sponzor_id' => '1',
				'perk_id' => '1',
				'task_id' => '1',
				'sponzorship_id' => '1',
			),
		));
	}

}