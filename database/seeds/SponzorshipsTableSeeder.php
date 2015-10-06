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
				'status' => '4',
				'event_id' => '1',
				'sponzor_id' => '1',
				'organizer_id' => '2',
				'perk_id' => '1',
				'cause' => 'I like your event, is amazing 1',
			),
			1 =>
			array (
				'status' => '3',
				'event_id' => '1',
				'sponzor_id' => '1',
				'organizer_id' => '2',
				'perk_id' => '1',
				'cause' => 'I like your event, is amazing 2',
			),
			2 =>
			array (
				'status' => '3',
				'event_id' => '1',
				'sponzor_id' => '1',
				'organizer_id' => '2',
				'perk_id' => '1',
				'cause' => 'I like your event, is amazing 3',
			),
		));
	}

}
