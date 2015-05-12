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
				'perk_id' => '1',
			),
		));
	}

}