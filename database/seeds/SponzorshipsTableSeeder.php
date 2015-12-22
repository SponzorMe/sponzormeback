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

		\DB::table('sponzorships')->insert(array ());
	}

}
