<?php

use Illuminate\Database\Seeder;

class UserCategoryTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('users_categories')->delete();
        
		\DB::table('users_categories')->insert(array (
			0 => 
			array (				
				'user_id' => '1',
				'category_id' => '1',
			),
			1 => 
			array (				
				'user_id' => '1',
				'category_id' => '2',
			),
			2 => 
			array (				
				'user_id' => '2',
				'category_id' => '3',
			),
			3 => 
			array (				
				'user_id' => '2',
				'category_id' => '4',
			),
			4 => 
			array (				
				'user_id' => '3',
				'category_id' => '5',
			),
		));
	}

}