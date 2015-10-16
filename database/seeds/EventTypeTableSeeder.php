<?php

use Illuminate\Database\Seeder;

class EventTypeTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('event_types')->delete();
        
		\DB::table('event_types')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'Charity',
				'description' => 'Give us your money',
				'updated_at' => '2014-09-18 19:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'Recruitment',
				'description' => 'Recruitment',
				'updated_at' => '2014-09-18 19:00:17',
				'created_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
		));
	}

}
