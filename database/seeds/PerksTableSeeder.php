<?php

use Illuminate\Database\Seeder;

class PerksTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('perks')->delete();
        
		\DB::table('perks')->insert(array (
			0 => 
			array (
				'kind' => 1,
				'id_event' => 1,
				'usd' => '23',
				'total_quantity' => '4',				
				'available_quantity' => '2'
			),
		));
	}

}
