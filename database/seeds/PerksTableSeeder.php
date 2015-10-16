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
<<<<<<< HEAD
<<<<<<< HEAD
        
		\DB::table('perks')->insert(array (
			0 => 
			array (
				'kind' => 1,
				'id_event' => 1,
				'usd' => '23',
				'total_quantity' => '4',				
=======
=======
>>>>>>> staging

		\DB::table('perks')->insert(array (
			0 =>
			array (
				'kind' => "Gold",
				'id_event' => 1,
				'usd' => '23',
				'total_quantity' => '4',
				'reserved_quantity' => '3'
			),
			1 =>
			array (
				'kind' => "Plate",
				'id_event' => 1,
				'usd' => '23',
				'total_quantity' => '4',
<<<<<<< HEAD
>>>>>>> local
=======
>>>>>>> staging
				'reserved_quantity' => '3'
			),
		));
	}

}
