<?php

use Illuminate\Database\Seeder;

class SponzorshipsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('sponzorships')->delete();

		\DB::table('sponzorships')->insert(array (
			0 =>
			array (
				'status' => '0',
				'event_id' => '1',
				'sponzor_id' => '2',
				'organizer_id' => '3',
				'perk_id' => '1',
				'cause' => 'I like your event, is amazing 1',
			),
			1 =>
			array (
				'status' => '1',
				'event_id' => '2',
				'sponzor_id' => '2',
				'organizer_id' => '3',
				'perk_id' => '1',
				'cause' => 'I like your event, is amazing 2',
			),
			2 =>
			array (
				'status' => '0',
				'event_id' => '1',
				'sponzor_id' => '2',
				'organizer_id' => '3',
				'perk_id' => '2',
				'cause' => 'I like your event, is amazing 3',
			),
		));
	}

}
