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

		\DB::table('task_sponzors')->insert(array (	));
	}

}
