<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('categories')->delete();

		\DB::table('categories')->insert(array (
			0 =>
			array (
				'id' => 1,
				'title' => 'Outdoor',
				'body' => 'All About the Bussines!',
				'created_at' => '2014-08-20 10:11:45',
				'updated_at' => '2014-08-20 10:11:45',
				'lang' => 'en',
			),
			1 =>
			array (
				'id' => 2,
				'title' => 'Art & Culture',
				'body' => 'All About the Bussines!',
				'created_at' => '2014-08-20 10:11:45',
				'updated_at' => '2014-08-20 10:11:45',
				'lang' => 'en',
			),
			2 =>
			array (
				'id' => 3,
				'title' => 'Dancing',
				'body' => 'All About the Bussines!',
				'created_at' => '2014-08-20 10:11:45',
				'updated_at' => '2014-08-20 10:11:45',
				'lang' => 'en',
			),
			3 =>
			array (
				'id' => 4,
				'title' => 'Wellness',
				'body' => 'All About the Bussines!',
				'created_at' => '2014-08-20 10:11:45',
				'updated_at' => '2014-08-20 10:11:45',
				'lang' => 'en',
			),
			4 =>
			array (
				'id' => 5,
				'title' => 'Career & Business',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			5 =>
			array (
				'id' => 6,
				'title' => 'Eat & Foods',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			6 =>
			array (
				'id' => 7,
				'title' => 'Belief',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			7 =>
			array (
				'id' => 8,
				'title' => 'Sports & Fitness',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			8 =>
			array (
				'id' => 9,
				'title' => 'Education',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			9 =>
			array (
				'id' => 10,
				'title' => 'Photography',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			10 =>
			array (
				'id' => 11,
				'title' => 'Languages',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			11 =>
			array (
				'id' => 12,
				'title' => 'Books',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			12 =>
			array (
				'id' => 13,
				'title' => 'Music',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			13 =>
			array (
				'id' => 14,
				'title' => 'Technology',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
		));
	}

}
