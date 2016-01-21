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
				'title' => "My Fist Event",
				'location' => 'Santiago de Chile',
				'ends' => new DateTime(),
				'starts' => new DateTime(),
				'location_reference' => 'referenceafsddf',
				'organizer' => '1003',//Ojo aca colocar el organizer de sponzorme
				'image' => 'event_dummy.png',//Debe estar en public images/events
				'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'type'=>1,//Ojo aca debe coincidir con los tipos de evento
				'category'=>1,//Ojo aca debe coincidir con el id de alguna categoria
				'privacy'=>0,
				'updated_at' => new DateTime(),
				'created_at' => new DateTime(),
				'lang' => 'en',
				'id' => '1003',
			),
			1 =>
			array (
				'title' => "My Second Event",
				'location' => 'Medellin Colombia',
				'ends' => new DateTime(),
				'starts' => new DateTime(),
				'location_reference' => 'referenceafsddf',
				'organizer' => '1003',//Ojo aca colocar el organizer de sponzorme
				'image' => 'event_dummy.png',//Debe estar en public images/events
				'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'type'=>1,//Ojo aca debe coincidir con los tipos de evento
				'category'=>1,//Ojo aca debe coincidir con el id de alguna categoria
				'privacy'=>0,
				'updated_at' => new DateTime(),
				'created_at' => new DateTime(),
				'lang' => 'en',
				'id' => '1002',
			),
		));
	}

}
