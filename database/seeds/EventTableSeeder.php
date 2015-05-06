<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('events')->delete();
        
		\DB::table('events')->insert(array (
			0 => 
			array (
				'title' => 1,
				'location' => 'Charity',
				'ends' => '2014-09-18 19:00:00',
				'starts' => '0000-00-00 00:00:00',				
				'location_reference' => 'referenceafsddf',
				'organizer' => '3',//Ojo aca colocar el organizer de sponzorme
				'image' => 'event_dummy.png',//Debe estar en public images/events
				'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'type'=>1,//Ojo aca debe coincidir con los tipos de evento
				'category'=>1,//Ojo aca debe coincidir con el id de alguna categoria
				'privacy'=>0,
				'updated_at' => '2014-09-18 19:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
		));
	}

}
