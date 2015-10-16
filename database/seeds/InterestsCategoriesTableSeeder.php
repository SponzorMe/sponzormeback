<?php

use Illuminate\Database\Seeder;

class InterestsCategoriesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('interests_categories')->delete();
<<<<<<< HEAD
<<<<<<< HEAD
        
		\DB::table('interests_categories')->insert(array (
			1 => 
=======

		\DB::table('interests_categories')->insert(array (
			1 =>
>>>>>>> local
=======

		\DB::table('interests_categories')->insert(array (
			1 =>
>>>>>>> staging
			array (
				'id_interest' => 1,
				'name' => 'Outdoors',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at magna dolor. Sed commodo feugiat lobortis. Aliquam lacinia sollicitudin porta. Nulla mollis eu enim non feugiat. Mauris convallis purus ut porta elementum. Nunc elementum ligula vel tincidunt luctus. Quisque orci enim, tempus eu fringilla a, semper ac libero. Sed condimentum leo at ipsum fringilla, ut elementum tellus ultrices. Mauris quis tempor urna, sit amet blandit lorem. In ante ante, feugiat non leo ut, molestie commodo purus. Vivamus lacinia sollicitudin urna. Aliquam et sem sed est tincidunt molestie condimentum non ligula. Quisque sed ipsum eu libero dictum pellentesque at et lorem. Morbi cursus faucibus gravida.',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			2 => 
=======
			2 =>
>>>>>>> local
=======
			2 =>
>>>>>>> staging
			array (
				'id_interest' => 2,
				'name' => 'Hiking',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at magna dolor. Sed commodo feugiat lobortis. Aliquam lacinia sollicitudin porta. Nulla mollis eu enim non feugiat. Mauris convallis purus ut porta elementum. Nunc elementum ligula vel tincidunt luctus. Quisque orci enim, tempus eu fringilla a, semper ac libero. Sed condimentum leo at ipsum fringilla, ut elementum tellus ultrices. Mauris quis tempor urna, sit amet blandit lorem. In ante ante, feugiat non leo ut, molestie commodo purus. Vivamus lacinia sollicitudin urna. Aliquam et sem sed est tincidunt molestie condimentum non ligula. Quisque sed ipsum eu libero dictum pellentesque at et lorem. Morbi cursus faucibus gravida.',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			3 => 
=======
			3 =>
>>>>>>> local
=======
			3 =>
>>>>>>> staging
			array (
				'id_interest' => 3,
				'name' => 'Sailing',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at magna dolor. Sed commodo feugiat lobortis. Aliquam lacinia sollicitudin porta. Nulla mollis eu enim non feugiat. Mauris convallis purus ut porta elementum. Nunc elementum ligula vel tincidunt luctus. Quisque orci enim, tempus eu fringilla a, semper ac libero. Sed condimentum leo at ipsum fringilla, ut elementum tellus ultrices. Mauris quis tempor urna, sit amet blandit lorem. In ante ante, feugiat non leo ut, molestie commodo purus. Vivamus lacinia sollicitudin urna. Aliquam et sem sed est tincidunt molestie condimentum non ligula. Quisque sed ipsum eu libero dictum pellentesque at et lorem. Morbi cursus faucibus gravida.',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			4 => 
=======
			4 =>
>>>>>>> local
=======
			4 =>
>>>>>>> staging
			array (
				'id_interest' => 4,
				'name' => 'Cruises',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at magna dolor. Sed commodo feugiat lobortis. Aliquam lacinia sollicitudin porta. Nulla mollis eu enim non feugiat. Mauris convallis purus ut porta elementum. Nunc elementum ligula vel tincidunt luctus. Quisque orci enim, tempus eu fringilla a, semper ac libero. Sed condimentum leo at ipsum fringilla, ut elementum tellus ultrices. Mauris quis tempor urna, sit amet blandit lorem. In ante ante, feugiat non leo ut, molestie commodo purus. Vivamus lacinia sollicitudin urna. Aliquam et sem sed est tincidunt molestie condimentum non ligula. Quisque sed ipsum eu libero dictum pellentesque at et lorem. Morbi cursus faucibus gravida.',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			5 => 
=======
			5 =>
>>>>>>> local
=======
			5 =>
>>>>>>> staging
			array (
				'id_interest' => 5,
				'name' => 'Scuba Diving',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			6 => 
=======
			6 =>
>>>>>>> local
=======
			6 =>
>>>>>>> staging
			array (
				'id_interest' => 6,
				'name' => 'Trail Running',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			7 => 
=======
			7 =>
>>>>>>> local
=======
			7 =>
>>>>>>> staging
			array (
				'id_interest' => 7,
				'name' => 'Sport Bikes',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			8 => 
=======
			8 =>
>>>>>>> local
=======
			8 =>
>>>>>>> staging
			array (
				'id_interest' => 8,
				'name' => 'Aviation',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			9 => 
=======
			9 =>
>>>>>>> local
=======
			9 =>
>>>>>>> staging
			array (
				'id_interest' => 9,
				'name' => 'Adventure',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			10 => 
=======
			10 =>
>>>>>>> local
=======
			10 =>
>>>>>>> staging
			array (
				'id_interest' => 10,
				'name' => 'Camping',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			11 => 
=======
			11 =>
>>>>>>> local
=======
			11 =>
>>>>>>> staging
			array (
				'id_interest' => 11,
				'name' => 'Outdoor Adventures',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			12 => 
=======
			12 =>
>>>>>>> local
=======
			12 =>
>>>>>>> staging
			array (
				'id_interest' => 12,
				'name' => 'Weekend Adventures',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			13 => 
=======
			13 =>
>>>>>>> local
=======
			13 =>
>>>>>>> staging
			array (
				'id_interest' => 13,
				'name' => 'Live Music',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			14 => 
=======
			14 =>
>>>>>>> local
=======
			14 =>
>>>>>>> staging
			array (
				'id_interest' => 14,
				'name' => 'Performing Arts',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			15 => 
=======
			15 =>
>>>>>>> local
=======
			15 =>
>>>>>>> staging
			array (
				'id_interest' => 15,
				'name' => 'Collaboration',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			16 => 
=======
			16 =>
>>>>>>> local
=======
			16 =>
>>>>>>> staging
			array (
				'id_interest' => 16,
				'name' => 'Artists',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			17 => 
=======
			17 =>
>>>>>>> local
=======
			17 =>
>>>>>>> staging
			array (
				'id_interest' => 17,
				'name' => 'Acting',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			18 => 
=======
			18 =>
>>>>>>> local
=======
			18 =>
>>>>>>> staging
			array (
				'id_interest' => 18,
				'name' => 'Theater',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			19 => 
=======
			19 =>
>>>>>>> local
=======
			19 =>
>>>>>>> staging
			array (
				'id_interest' => 19,
				'name' => 'Creativity',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			20 => 
=======
			20 =>
>>>>>>> local
=======
			20 =>
>>>>>>> staging
			array (
				'id_interest' => 20,
				'name' => 'Painting',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			21 => 
=======
			21 =>
>>>>>>> local
=======
			21 =>
>>>>>>> staging
			array (
				'id_interest' => 21,
				'name' => 'Creative Circle',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			22 => 
=======
			22 =>
>>>>>>> local
=======
			22 =>
>>>>>>> staging
			array (
				'id_interest' => 22,
				'name' => 'Arts & Entertainment',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			23 => 
=======
			23 =>
>>>>>>> local
=======
			23 =>
>>>>>>> staging
			array (
				'id_interest' => 23,
				'name' => 'Graphic Design',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			24 => 
=======
			24 =>
>>>>>>> local
=======
			24 =>
>>>>>>> staging
			array (
				'id_interest' => 24,
				'name' => 'Drawing',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			25 => 
=======
			25 =>
>>>>>>> local
=======
			25 =>
>>>>>>> staging
			array (
				'id_interest' => 25,
				'name' => 'Ballroom Dancing',
				'description' => 'Tutorials 1',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			26 => 
=======
			26 =>
>>>>>>> local
=======
			26 =>
>>>>>>> staging
			array (
				'id_interest' => 26,
				'name' => 'Dance Lessons',
				'description' => 'Tutorials 2',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			27 => 
=======
			27 =>
>>>>>>> local
=======
			27 =>
>>>>>>> staging
			array (
				'id_interest' => 27,
				'name' => 'Belly Dance Lessons',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			28 => 
=======
			28 =>
>>>>>>> local
=======
			28 =>
>>>>>>> staging
			array (
				'id_interest' => 28,
				'name' => 'Dancing',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			29 => 
=======
			29 =>
>>>>>>> local
=======
			29 =>
>>>>>>> staging
			array (
				'id_interest' => 29,
				'name' => 'Social Dancing',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			30 => 
=======
			30 =>
>>>>>>> local
=======
			30 =>
>>>>>>> staging
			array (
				'id_interest' => 30,
				'name' => 'Salsa',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			31 => 
=======
			31 =>
>>>>>>> local
=======
			31 =>
>>>>>>> staging
			array (
				'id_interest' => 31,
				'name' => 'Latin Dance',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			32 => 
=======
			32 =>
>>>>>>> local
=======
			32 =>
>>>>>>> staging
			array (
				'id_interest' => 32,
				'name' => 'Dance and Movement',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			33 => 
=======
			33 =>
>>>>>>> local
=======
			33 =>
>>>>>>> staging
			array (
				'id_interest' => 33,
				'name' => 'Swing Dancing',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			34 => 
=======
			34 =>
>>>>>>> local
=======
			34 =>
>>>>>>> staging
			array (
				'id_interest' => 34,
				'name' => 'Salsa Dance Lessons',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			35 => 
=======
			35 =>
>>>>>>> local
=======
			35 =>
>>>>>>> staging
			array (
				'id_interest' => 35,
				'name' => 'Bachata',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			36 => 
=======
			36 =>
>>>>>>> local
=======
			36 =>
>>>>>>> staging
			array (
				'id_interest' => 36,
				'name' => 'Tango',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			37 => 
=======
			37 =>
>>>>>>> local
=======
			37 =>
>>>>>>> staging
			array (
				'id_interest' => 37,
				'name' => 'PTSD',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			38 => 
=======
			38 =>
>>>>>>> local
=======
			38 =>
>>>>>>> staging
			array (
				'id_interest' => 38,
				'name' => 'Healthy Living',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			39 => 
=======
			39 =>
>>>>>>> local
=======
			39 =>
>>>>>>> staging
			array (
				'id_interest' => 39,
				'name' => 'Intimacy',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			40 => 
=======
			40 =>
>>>>>>> local
=======
			40 =>
>>>>>>> staging
			array (
				'id_interest' => 40,
				'name' => 'Meditation',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			41 => 
=======
			41 =>
>>>>>>> local
=======
			41 =>
>>>>>>> staging
			array (
				'id_interest' => 41,
				'name' => 'Self-Improvement',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			42 => 
=======
			42 =>
>>>>>>> local
=======
			42 =>
>>>>>>> staging
			array (
				'id_interest' => 42,
				'name' => 'Cancer Survivors',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			43 => 
=======
			43 =>
>>>>>>> local
=======
			43 =>
>>>>>>> staging
			array (
				'id_interest' => 43,
				'name' => 'Medical Marijuana',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			44 => 
=======
			44 =>
>>>>>>> local
=======
			44 =>
>>>>>>> staging
			array (
				'id_interest' => 44,
				'name' => 'Healthy Family',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			45 => 
=======
			45 =>
>>>>>>> local
=======
			45 =>
>>>>>>> staging
			array (
				'id_interest' => 45,
				'name' => 'Special Needs Families',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			46 => 
=======
			46 =>
>>>>>>> local
=======
			46 =>
>>>>>>> staging
			array (
				'id_interest' => 46,
				'name' => 'Grief Support',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			47 => 
=======
			47 =>
>>>>>>> local
=======
			47 =>
>>>>>>> staging
			array (
				'id_interest' => 47,
				'name' => 'ADHD',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			48 => 
=======
			48 =>
>>>>>>> local
=======
			48 =>
>>>>>>> staging
			array (
				'id_interest' => 48,
				'name' => 'Relationship Building',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			49 => 
=======
			49 =>
>>>>>>> local
=======
			49 =>
>>>>>>> staging
			array (
				'id_interest' => 49,
				'name' => 'Real Estate',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			50 => 
=======
			50 =>
>>>>>>> local
=======
			50 =>
>>>>>>> staging
			array (
				'id_interest' => 50,
				'name' => 'Asian Professionals',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			51 => 
=======
			51 =>
>>>>>>> local
=======
			51 =>
>>>>>>> staging
			array (
				'id_interest' => 51,
				'name' => 'Business Strategy',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			52 => 
=======
			52 =>
>>>>>>> local
=======
			52 =>
>>>>>>> staging
			array (
				'id_interest' => 52,
				'name' => 'Leadership Development',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			53 => 
=======
			53 =>
>>>>>>> local
=======
			53 =>
>>>>>>> staging
			array (
				'id_interest' => 53,
				'name' => 'Indian Professionals',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			54 => 
=======
			54 =>
>>>>>>> local
=======
			54 =>
>>>>>>> staging
			array (
				'id_interest' => 54,
				'name' => 'Professional Development',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			55 => 
=======
			55 =>
>>>>>>> local
=======
			55 =>
>>>>>>> staging
			array (
				'id_interest' => 55,
				'name' => 'Leadership',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			56 => 
=======
			56 =>
>>>>>>> local
=======
			56 =>
>>>>>>> staging
			array (
				'id_interest' => 56,
				'name' => 'Golf as a Business Tool',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			57 => 
=======
			57 =>
>>>>>>> local
=======
			57 =>
>>>>>>> staging
			array (
				'id_interest' => 57,
				'name' => 'Fundraising',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			58 => 
=======
			58 =>
>>>>>>> local
=======
			58 =>
>>>>>>> staging
			array (
				'id_interest' => 58,
				'name' => 'Young Professionals',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			59 => 
=======
			59 =>
>>>>>>> local
=======
			59 =>
>>>>>>> staging
			array (
				'id_interest' => 59,
				'name' => 'Success',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			60 => 
=======
			60 =>
>>>>>>> local
=======
			60 =>
>>>>>>> staging
			array (
				'id_interest' => 60,
				'name' => 'Latino/a Professionals',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			61 => 
=======
			61 =>
>>>>>>> local
=======
			61 =>
>>>>>>> staging
			array (
				'id_interest' => 61,
				'name' => 'Dining Out',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			62 => 
=======
			62 =>
>>>>>>> local
=======
			62 =>
>>>>>>> staging
			array (
				'id_interest' => 62,
				'name' => 'Pubs and Bars',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			63 => 
=======
			63 =>
>>>>>>> local
=======
			63 =>
>>>>>>> staging
			array (
				'id_interest' => 63,
				'name' => 'Wine',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			64 => 
=======
			64 =>
>>>>>>> local
=======
			64 =>
>>>>>>> staging
			array (
				'id_interest' => 64,
				'name' => 'Vegan',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			65 => 
=======
			65 =>
>>>>>>> local
=======
			65 =>
>>>>>>> staging
			array (
				'id_interest' => 65,
				'name' => 'Beer',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			66 => 
=======
			66 =>
>>>>>>> local
=======
			66 =>
>>>>>>> staging
			array (
				'id_interest' => 66,
				'name' => 'Exploring New Restaurants',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			67 => 
=======
			67 =>
>>>>>>> local
=======
			67 =>
>>>>>>> staging
			array (
				'id_interest' => 67,
				'name' => 'Living Foods',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			68 => 
=======
			68 =>
>>>>>>> local
=======
			68 =>
>>>>>>> staging
			array (
				'id_interest' => 68,
				'name' => 'BBQ',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			69 => 
=======
			69 =>
>>>>>>> local
=======
			69 =>
>>>>>>> staging
			array (
				'id_interest' => 69,
				'name' => 'Healthy Eating',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			70 => 
=======
			70 =>
>>>>>>> local
=======
			70 =>
>>>>>>> staging
			array (
				'id_interest' => 70,
				'name' => 'Indian Food',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			71 => 
=======
			71 =>
>>>>>>> local
=======
			71 =>
>>>>>>> staging
			array (
				'id_interest' => 71,
				'name' => 'French Food',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			72 => 
=======
			72 =>
>>>>>>> local
=======
			72 =>
>>>>>>> staging
			array (
				'id_interest' => 72,
				'name' => 'Raw Food',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			73 => 
=======
			73 =>
>>>>>>> local
=======
			73 =>
>>>>>>> staging
			array (
				'id_interest' => 73,
				'name' => 'Law of Attraction',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			74 => 
=======
			74 =>
>>>>>>> local
=======
			74 =>
>>>>>>> staging
			array (
				'id_interest' => 74,
				'name' => 'Spirituality',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			75 => 
=======
			75 =>
>>>>>>> local
=======
			75 =>
>>>>>>> staging
			array (
				'id_interest' => 75,
				'name' => 'Bible Study',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			76 => 
=======
			76 =>
>>>>>>> local
=======
			76 =>
>>>>>>> staging
			array (
				'id_interest' => 76,
				'name' => 'Self Exploration',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			77 => 
=======
			77 =>
>>>>>>> local
=======
			77 =>
>>>>>>> staging
			array (
				'id_interest' => 77,
				'name' => 'NLP',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			78 => 
=======
			78 =>
>>>>>>> local
=======
			78 =>
>>>>>>> staging
			array (
				'id_interest' => 78,
				'name' => 'Catholic Social',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			79 => 
=======
			79 =>
>>>>>>> local
=======
			79 =>
>>>>>>> staging
			array (
				'id_interest' => 79,
				'name' => 'Freethinker',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			80 => 
=======
			80 =>
>>>>>>> local
=======
			80 =>
>>>>>>> staging
			array (
				'id_interest' => 80,
				'name' => 'Retreats',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			81 => 
=======
			81 =>
>>>>>>> local
=======
			81 =>
>>>>>>> staging
			array (
				'id_interest' => 81,
				'name' => 'A Course In Miracles',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			82 => 
=======
			82 =>
>>>>>>> local
=======
			82 =>
>>>>>>> staging
			array (
				'id_interest' => 82,
				'name' => 'Transformation',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			83 => 
=======
			83 =>
>>>>>>> local
=======
			83 =>
>>>>>>> staging
			array (
				'id_interest' => 83,
				'name' => 'Progressive Muslim',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			84 => 
=======
			84 =>
>>>>>>> local
=======
			84 =>
>>>>>>> staging
			array (
				'id_interest' => 84,
				'name' => 'Sensuality',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			85 => 
=======
			85 =>
>>>>>>> local
=======
			85 =>
>>>>>>> staging
			array (
				'id_interest' => 85,
				'name' => 'Fitness',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			86 => 
=======
			86 =>
>>>>>>> local
=======
			86 =>
>>>>>>> staging
			array (
				'id_interest' => 86,
				'name' => 'Exercise',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			87 => 
=======
			87 =>
>>>>>>> local
=======
			87 =>
>>>>>>> staging
			array (
				'id_interest' => 87,
				'name' => 'Walking',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			88 => 
=======
			88 =>
>>>>>>> local
=======
			88 =>
>>>>>>> staging
			array (
				'id_interest' => 88,
				'name' => 'NFL Football',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			89 => 
=======
			89 =>
>>>>>>> local
=======
			89 =>
>>>>>>> staging
			array (
				'id_interest' => 89,
				'name' => 'Golf',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			90 => 
=======
			90 =>
>>>>>>> local
=======
			90 =>
>>>>>>> staging
			array (
				'id_interest' => 90,
				'name' => 'Pick-up Tennis',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			91 => 
=======
			91 =>
>>>>>>> local
=======
			91 =>
>>>>>>> staging
			array (
				'id_interest' => 91,
				'name' => 'Volleyball',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			92 => 
=======
			92 =>
>>>>>>> local
=======
			92 =>
>>>>>>> staging
			array (
				'id_interest' => 92,
				'name' => 'Water Sports',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			93 => 
=======
			93 =>
>>>>>>> local
=======
			93 =>
>>>>>>> staging
			array (
				'id_interest' => 93,
				'name' => 'Cycling',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			94 => 
=======
			94 =>
>>>>>>> local
=======
			94 =>
>>>>>>> staging
			array (
				'id_interest' => 94,
				'name' => 'Roller Skating',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			95 => 
=======
			95 =>
>>>>>>> local
=======
			95 =>
>>>>>>> staging
			array (
				'id_interest' => 95,
				'name' => 'Recreational Sports',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			96 => 
=======
			96 =>
>>>>>>> local
=======
			96 =>
>>>>>>> staging
			array (
				'id_interest' => 96,
				'name' => 'Outdoor Fitness',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			97 => 
=======
			97 =>
>>>>>>> local
=======
			97 =>
>>>>>>> staging
			array (
				'id_interest' => 97,
				'name' => 'Science',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			98 => 
=======
			98 =>
>>>>>>> local
=======
			98 =>
>>>>>>> staging
			array (
				'id_interest' => 98,
				'name' => 'Education & Technology',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			99 => 
=======
			99 =>
>>>>>>> local
=======
			99 =>
>>>>>>> staging
			array (
				'id_interest' => 99,
				'name' => 'Intellectual Discussion',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			100 => 
=======
			100 =>
>>>>>>> local
=======
			100 =>
>>>>>>> staging
			array (
				'id_interest' => 100,
				'name' => 'Learning',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			101 => 
=======
			101 =>
>>>>>>> local
=======
			101 =>
>>>>>>> staging
			array (
				'id_interest' => 101,
				'name' => 'International Relations',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			102 => 
=======
			102 =>
>>>>>>> local
=======
			102 =>
>>>>>>> staging
			array (
				'id_interest' => 102,
				'name' => 'Sexual Education',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			103 => 
=======
			103 =>
>>>>>>> local
=======
			103 =>
>>>>>>> staging
			array (
				'id_interest' => 103,
				'name' => 'College Alumni',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			104 => 
=======
			104 =>
>>>>>>> local
=======
			104 =>
>>>>>>> staging
			array (
				'id_interest' => 104,
				'name' => 'Homeschool Support',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			105 => 
=======
			105 =>
>>>>>>> local
=======
			105 =>
>>>>>>> staging
			array (
				'id_interest' => 105,
				'name' => 'Evolution',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			106 => 
=======
			106 =>
>>>>>>> local
=======
			106 =>
>>>>>>> staging
			array (
				'id_interest' => 106,
				'name' => 'Communication Skills',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			107 => 
=======
			107 =>
>>>>>>> local
=======
			107 =>
>>>>>>> staging
			array (
				'id_interest' => 107,
				'name' => 'Public Speaking',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			108 => 
=======
			108 =>
>>>>>>> local
=======
			108 =>
>>>>>>> staging
			array (
				'id_interest' => 108,
				'name' => 'Philosophy',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			109 => 
=======
			109 =>
>>>>>>> local
=======
			109 =>
>>>>>>> staging
			array (
				'id_interest' => 109,
				'name' => 'Photography',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			110 => 
=======
			110 =>
>>>>>>> local
=======
			110 =>
>>>>>>> staging
			array (
				'id_interest' => 110,
				'name' => 'Watching Movies',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			111 => 
=======
			111 =>
>>>>>>> local
=======
			111 =>
>>>>>>> staging
			array (
				'id_interest' => 111,
				'name' => 'Fashion Photography',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			112 => 
=======
			112 =>
>>>>>>> local
=======
			112 =>
>>>>>>> staging
			array (
				'id_interest' => 112,
				'name' => 'Film and Video Production',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			113 => 
=======
			113 =>
>>>>>>> local
=======
			113 =>
>>>>>>> staging
			array (
				'id_interest' => 113,
				'name' => 'Digital Photography',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			114 => 
=======
			114 =>
>>>>>>> local
=======
			114 =>
>>>>>>> staging
			array (
				'id_interest' => 114,
				'name' => 'Film',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			115 => 
=======
			115 =>
>>>>>>> local
=======
			115 =>
>>>>>>> staging
			array (
				'id_interest' => 115,
				'name' => 'Photography Classes',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			116 => 
=======
			116 =>
>>>>>>> local
=======
			116 =>
>>>>>>> staging
			array (
				'id_interest' => 116,
				'name' => 'Movie Nights',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			117 => 
=======
			117 =>
>>>>>>> local
=======
			117 =>
>>>>>>> staging
			array (
				'id_interest' => 117,
				'name' => 'Portrait Photography',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			118 => 
=======
			118 =>
>>>>>>> local
=======
			118 =>
>>>>>>> staging
			array (
				'id_interest' => 118,
				'name' => 'Group Photo Shoots',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			119 => 
=======
			119 =>
>>>>>>> local
=======
			119 =>
>>>>>>> staging
			array (
				'id_interest' => 119,
				'name' => 'Model Photography',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			120 => 
=======
			120 =>
>>>>>>> local
=======
			120 =>
>>>>>>> staging
			array (
				'id_interest' => 120,
				'name' => 'Nature Photography',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			121 => 
=======
			121 =>
>>>>>>> local
=======
			121 =>
>>>>>>> staging
			array (
				'id_interest' => 121,
				'name' => 'African Americans',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			122 => 
=======
			122 =>
>>>>>>> local
=======
			122 =>
>>>>>>> staging
			array (
				'id_interest' => 122,
				'name' => 'French Language',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			123 => 
=======
			123 =>
>>>>>>> local
=======
			123 =>
>>>>>>> staging
			array (
				'id_interest' => 123,
				'name' => 'Language & Culture',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			124 => 
=======
			124 =>
>>>>>>> local
=======
			124 =>
>>>>>>> staging
			array (
				'id_interest' => 124,
				'name' => 'Asians',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			125 => 
=======
			125 =>
>>>>>>> local
=======
			125 =>
>>>>>>> staging
			array (
				'id_interest' => 125,
				'name' => 'Black Women',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			126 => 
=======
			126 =>
>>>>>>> local
=======
			126 =>
>>>>>>> staging
			array (
				'id_interest' => 126,
				'name' => 'Multicultural',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			127 => 
=======
			127 =>
>>>>>>> local
=======
			127 =>
>>>>>>> staging
			array (
				'id_interest' => 127,
				'name' => 'Indian Culture',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			128 => 
=======
			128 =>
>>>>>>> local
=======
			128 =>
>>>>>>> staging
			array (
				'id_interest' => 128,
				'name' => 'Cultural Diversity',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			129 => 
=======
			129 =>
>>>>>>> local
=======
			129 =>
>>>>>>> staging
			array (
				'id_interest' => 129,
				'name' => 'Black Identity',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			130 => 
=======
			130 =>
>>>>>>> local
=======
			130 =>
>>>>>>> staging
			array (
				'id_interest' => 130,
				'name' => 'Latino Culture',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			131 => 
=======
			131 =>
>>>>>>> local
=======
			131 =>
>>>>>>> staging
			array (
				'id_interest' => 131,
				'name' => 'Culture Exchange',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			132 => 
=======
			132 =>
>>>>>>> local
=======
			132 =>
>>>>>>> staging
			array (
				'id_interest' => 132,
				'name' => 'English Language',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			133 => 
=======
			133 =>
>>>>>>> local
=======
			133 =>
>>>>>>> staging
			array (
				'id_interest' => 133,
				'name' => 'Book Club',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			134 => 
=======
			134 =>
>>>>>>> local
=======
			134 =>
>>>>>>> staging
			array (
				'id_interest' => 134,
				'name' => 'Creative Writing',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			135 => 
=======
			135 =>
>>>>>>> local
=======
			135 =>
>>>>>>> staging
			array (
				'id_interest' => 135,
				'name' => 'Reading',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			136 => 
=======
			136 =>
>>>>>>> local
=======
			136 =>
>>>>>>> staging
			array (
				'id_interest' => 136,
				'name' => 'Poetry',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			137 => 
=======
			137 =>
>>>>>>> local
=======
			137 =>
>>>>>>> staging
			array (
				'id_interest' => 137,
				'name' => 'Writing',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			138 => 
=======
			138 =>
>>>>>>> local
=======
			138 =>
>>>>>>> staging
			array (
				'id_interest' => 138,
				'name' => 'Literature',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			139 => 
=======
			139 =>
>>>>>>> local
=======
			139 =>
>>>>>>> staging
			array (
				'id_interest' => 139,
				'name' => 'Fiction',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			140 => 
=======
			140 =>
>>>>>>> local
=======
			140 =>
>>>>>>> staging
			array (
				'id_interest' => 140,
				'name' => 'Readers',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			141 => 
=======
			141 =>
>>>>>>> local
=======
			141 =>
>>>>>>> staging
			array (
				'id_interest' => 141,
				'name' => 'Writing Workshops',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			142 => 
=======
			142 =>
>>>>>>> local
=======
			142 =>
>>>>>>> staging
			array (
				'id_interest' => 142,
				'name' => 'Novel Reading',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			143 => 
=======
			143 =>
>>>>>>> local
=======
			143 =>
>>>>>>> staging
			array (
				'id_interest' => 143,
				'name' => 'Screenwriting',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			144 => 
=======
			144 =>
>>>>>>> local
=======
			144 =>
>>>>>>> staging
			array (
				'id_interest' => 144,
				'name' => 'Novel Writing',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			145 => 
=======
			145 =>
>>>>>>> local
=======
			145 =>
>>>>>>> staging
			array (
				'id_interest' => 145,
				'name' => 'Live Music',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			146 => 
=======
			146 =>
>>>>>>> local
=======
			146 =>
>>>>>>> staging
			array (
				'id_interest' => 146,
				'name' => 'Musicians',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			147 => 
=======
			147 =>
>>>>>>> local
=======
			147 =>
>>>>>>> staging
			array (
				'id_interest' => 147,
				'name' => 'Singing',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			148 => 
=======
			148 =>
>>>>>>> local
=======
			148 =>
>>>>>>> staging
			array (
				'id_interest' => 148,
				'name' => 'Shamanic Drumming',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			149 => 
=======
			149 =>
>>>>>>> local
=======
			149 =>
>>>>>>> staging
			array (
				'id_interest' => 149,
				'name' => 'Christian Music',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			150 => 
=======
			150 =>
>>>>>>> local
=======
			150 =>
>>>>>>> staging
			array (
				'id_interest' => 150,
				'name' => 'Concerts',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			151 => 
=======
			151 =>
>>>>>>> local
=======
			151 =>
>>>>>>> staging
			array (
				'id_interest' => 151,
				'name' => 'Latin Music',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			152 => 
=======
			152 =>
>>>>>>> local
=======
			152 =>
>>>>>>> staging
			array (
				'id_interest' => 152,
				'name' => 'Music',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			153 => 
=======
			153 =>
>>>>>>> local
=======
			153 =>
>>>>>>> staging
			array (
				'id_interest' => 153,
				'name' => 'Songwriting',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			154 => 
=======
			154 =>
>>>>>>> local
=======
			154 =>
>>>>>>> staging
			array (
				'id_interest' => 154,
				'name' => 'Group Singing',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			155 => 
=======
			155 =>
>>>>>>> local
=======
			155 =>
>>>>>>> staging
			array (
				'id_interest' => 155,
				'name' => 'Drum Circle',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			156 => 
=======
			156 =>
>>>>>>> local
=======
			156 =>
>>>>>>> staging
			array (
				'id_interest' => 156,
				'name' => 'Choir',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			157 => 
=======
			157 =>
>>>>>>> local
=======
			157 =>
>>>>>>> staging
			array (
				'id_interest' => 157,
				'name' => 'Programming',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			158 => 
=======
			158 =>
>>>>>>> local
=======
			158 =>
>>>>>>> staging
			array (
				'id_interest' => 158,
				'name' => 'Blogging',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			159 => 
=======
			159 =>
>>>>>>> local
=======
			159 =>
>>>>>>> staging
			array (
				'id_interest' => 159,
				'name' => 'Web Technology',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			160 => 
=======
			160 =>
>>>>>>> local
=======
			160 =>
>>>>>>> staging
			array (
				'id_interest' => 160,
				'name' => 'Java',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			161 => 
=======
			161 =>
>>>>>>> local
=======
			161 =>
>>>>>>> staging
			array (
				'id_interest' => 161,
				'name' => 'Artificial Intelligence',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			162 => 
=======
			162 =>
>>>>>>> local
=======
			162 =>
>>>>>>> staging
			array (
				'id_interest' => 162,
				'name' => 'Software Development',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			163 => 
=======
			163 =>
>>>>>>> local
=======
			163 =>
>>>>>>> staging
			array (
				'id_interest' => 163,
				'name' => 'Web Development',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			164 => 
=======
			164 =>
>>>>>>> local
=======
			164 =>
>>>>>>> staging
			array (
				'id_interest' => 164,
				'name' => 'New Technology',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			165 => 
=======
			165 =>
>>>>>>> local
=======
			165 =>
>>>>>>> staging
			array (
				'id_interest' => 165,
				'name' => 'Open Source',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			166 => 
=======
			166 =>
>>>>>>> local
=======
			166 =>
>>>>>>> staging
			array (
				'id_interest' => 166,
				'name' => 'Web Design',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			167 => 
=======
			167 =>
>>>>>>> local
=======
			167 =>
>>>>>>> staging
			array (
				'id_interest' => 167,
				'name' => 'Mobile Development',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			168 => 
=======
			168 =>
>>>>>>> local
=======
			168 =>
>>>>>>> staging
			array (
				'id_interest' => 168,
				'name' => 'Technology Startups',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			169 => 
			array (
				'id_interest' => 169,
				'name' => 'Exteriores',
				'description' => 'Tutorials',
				'category_id' => 15,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			170 => 
			array (
				'id_interest' => 170,
				'name' => 'Excursionismo',
				'description' => 'Tutorials',
				'category_id' => 15,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			171 => 
			array (
				'id_interest' => 171,
				'name' => 'Navegacion',
				'description' => 'Tutorials',
				'category_id' => 15,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			172 => 
			array (
				'id_interest' => 172,
				'name' => 'Cruceros',
				'description' => 'Tutorials',
				'category_id' => 15,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			173 => 
			array (
				'id_interest' => 173,
				'name' => 'Buceo',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 15,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			174 => 
			array (
				'id_interest' => 174,
				'name' => 'Carreras por Montaña',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 15,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			175 => 
			array (
				'id_interest' => 175,
				'name' => 'Motociclismo',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 15,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			176 => 
			array (
				'id_interest' => 176,
				'name' => 'Aviacion',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 15,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			177 => 
			array (
				'id_interest' => 177,
				'name' => 'Aventura',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 15,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			178 => 
			array (
				'id_interest' => 178,
				'name' => 'Acampar',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 15,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			179 => 
			array (
				'id_interest' => 179,
				'name' => 'Aventuras en Exteriores',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 15,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			180 => 
			array (
				'id_interest' => 180,
				'name' => 'Aventuras de Fin de Semana',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 15,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			181 => 
			array (
				'id_interest' => 181,
				'name' => 'Musica en Vivo',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 16,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			182 => 
			array (
				'id_interest' => 182,
				'name' => 'Artes escénicas',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 16,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			183 => 
			array (
				'id_interest' => 183,
				'name' => 'Colaboracion',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 16,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			184 => 
			array (
				'id_interest' => 184,
				'name' => 'Artistas',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 16,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			185 => 
			array (
				'id_interest' => 185,
				'name' => 'Accion',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 16,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			186 => 
			array (
				'id_interest' => 186,
				'name' => 'Teatro',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 16,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			187 => 
			array (
				'id_interest' => 187,
				'name' => 'Creatividad',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 16,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			188 => 
			array (
				'id_interest' => 188,
				'name' => 'Pintura',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 16,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			189 => 
			array (
				'id_interest' => 189,
				'name' => 'Circulo Creativo',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 16,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			190 => 
			array (
				'id_interest' => 190,
				'name' => 'Arte & Entretenimiento',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 16,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			191 => 
			array (
				'id_interest' => 191,
				'name' => 'Diseño Grafico',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 16,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			192 => 
			array (
				'id_interest' => 192,
				'name' => 'Dibujo',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 16,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			193 => 
			array (
				'id_interest' => 193,
				'name' => 'Baile de Salon',
				'description' => 'Tutorials 1',
				'category_id' => 17,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			194 => 
			array (
				'id_interest' => 194,
				'name' => 'Lecciones de Baile',
				'description' => 'Tutorials 2',
				'category_id' => 17,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			195 => 
			array (
				'id_interest' => 195,
				'name' => 'Lecciones de Baile de Vientre',
				'description' => 'Tutorials',
				'category_id' => 17,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			196 => 
			array (
				'id_interest' => 196,
				'name' => 'Baile',
				'description' => 'Tutorials',
				'category_id' => 17,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			197 => 
			array (
				'id_interest' => 197,
				'name' => 'Baile Social',
				'description' => 'Tutorials',
				'category_id' => 17,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			198 => 
			array (
				'id_interest' => 198,
				'name' => 'Salsa',
				'description' => 'Tutorials',
				'category_id' => 17,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			199 => 
			array (
				'id_interest' => 199,
				'name' => 'Baile Latino',
				'description' => 'Tutorials',
				'category_id' => 17,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			200 => 
			array (
				'id_interest' => 200,
				'name' => 'Danza y Movimiento',
				'description' => 'Tutorials',
				'category_id' => 17,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			201 => 
			array (
				'id_interest' => 201,
				'name' => 'Danza de Oscilacion',
				'description' => 'Tutorials',
				'category_id' => 17,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			202 => 
			array (
				'id_interest' => 202,
				'name' => 'Lecciones de Salsa',
				'description' => 'Tutorials',
				'category_id' => 17,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			203 => 
			array (
				'id_interest' => 203,
				'name' => 'Bachata',
				'description' => 'Tutorials',
				'category_id' => 17,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			204 => 
			array (
				'id_interest' => 204,
				'name' => 'Tango',
				'description' => 'Tutorials',
				'category_id' => 17,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			205 => 
			array (
				'id_interest' => 205,
				'name' => 'PTSD',
				'description' => 'Tutorials',
				'category_id' => 18,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			206 => 
			array (
				'id_interest' => 206,
				'name' => 'Vida Sana',
				'description' => 'Tutorials',
				'category_id' => 18,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			207 => 
			array (
				'id_interest' => 207,
				'name' => 'Intimidad',
				'description' => 'Tutorials',
				'category_id' => 18,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			208 => 
			array (
				'id_interest' => 208,
				'name' => 'Meditacion',
				'description' => 'Tutorials',
				'category_id' => 18,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			209 => 
			array (
				'id_interest' => 209,
				'name' => 'Autoayuda',
				'description' => 'Tutorials',
				'category_id' => 18,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			210 => 
			array (
				'id_interest' => 210,
				'name' => 'Sobrevivientes del Cancer',
				'description' => 'Tutorials',
				'category_id' => 18,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			211 => 
			array (
				'id_interest' => 211,
				'name' => 'Marihuana Medica',
				'description' => 'Tutorials',
				'category_id' => 18,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			212 => 
			array (
				'id_interest' => 212,
				'name' => 'Familias Sanas',
				'description' => 'Tutorials',
				'category_id' => 18,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			213 => 
			array (
				'id_interest' => 213,
				'name' => 'Necesidades Especiales',
				'description' => 'Tutorials',
				'category_id' => 18,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			214 => 
			array (
				'id_interest' => 214,
				'name' => 'Ayuda de la Pena',
				'description' => 'Tutorials',
				'category_id' => 18,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			215 => 
			array (
				'id_interest' => 215,
				'name' => 'ADHD',
				'description' => 'Tutorials',
				'category_id' => 18,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			216 => 
			array (
				'id_interest' => 216,
				'name' => 'Construccion de Relaciones',
				'description' => 'Tutorials',
				'category_id' => 18,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			217 => 
			array (
				'id_interest' => 217,
				'name' => 'Finca Raiz',
				'description' => 'Tutorials',
				'category_id' => 19,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			218 => 
			array (
				'id_interest' => 218,
				'name' => 'Profesionales Asiaticos',
				'description' => 'Tutorials',
				'category_id' => 19,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			219 => 
			array (
				'id_interest' => 219,
				'name' => 'Estrategia de Negocios',
				'description' => 'Tutorials',
				'category_id' => 19,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			220 => 
			array (
				'id_interest' => 220,
				'name' => 'Desarrollo de Liderazgo',
				'description' => 'Tutorials',
				'category_id' => 19,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			221 => 
			array (
				'id_interest' => 221,
				'name' => 'Profesionales Indios',
				'description' => 'Tutorials',
				'category_id' => 19,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			222 => 
			array (
				'id_interest' => 222,
				'name' => 'Desarrollo Profesional',
				'description' => 'Tutorials',
				'category_id' => 19,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			223 => 
			array (
				'id_interest' => 223,
				'name' => 'Liderazgo',
				'description' => 'Tutorials',
				'category_id' => 19,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			224 => 
			array (
				'id_interest' => 224,
				'name' => 'Golf como Herramienta de Negocios',
				'description' => 'Tutorials',
				'category_id' => 19,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			225 => 
			array (
				'id_interest' => 225,
				'name' => 'Recaudación de Fondos',
				'description' => 'Tutorials',
				'category_id' => 19,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			226 => 
			array (
				'id_interest' => 226,
				'name' => 'Jovenes Profesionales',
				'description' => 'Tutorials',
				'category_id' => 19,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			227 => 
			array (
				'id_interest' => 227,
				'name' => 'Exito',
				'description' => 'Tutorials',
				'category_id' => 19,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			228 => 
			array (
				'id_interest' => 228,
				'name' => 'Profesionales Latinos',
				'description' => 'Tutorials',
				'category_id' => 19,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			229 => 
			array (
				'id_interest' => 229,
				'name' => 'Salir a Cenar',
				'description' => 'Tutorials',
				'category_id' => 20,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			230 => 
			array (
				'id_interest' => 230,
				'name' => 'Pubs y Bares',
				'description' => 'Tutorials',
				'category_id' => 20,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			231 => 
			array (
				'id_interest' => 231,
				'name' => 'Vino',
				'description' => 'Tutorials',
				'category_id' => 20,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			232 => 
			array (
				'id_interest' => 232,
				'name' => 'Veganos',
				'description' => 'Tutorials',
				'category_id' => 20,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			233 => 
			array (
				'id_interest' => 233,
				'name' => 'Cerveza',
				'description' => 'Tutorials',
				'category_id' => 20,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			234 => 
			array (
				'id_interest' => 234,
				'name' => 'Explorando Nuevos Restaurantes',
				'description' => 'Tutorials',
				'category_id' => 20,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			235 => 
			array (
				'id_interest' => 235,
				'name' => 'Comida Organica',
				'description' => 'Tutorials',
				'category_id' => 20,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			236 => 
			array (
				'id_interest' => 236,
				'name' => 'BBQ',
				'description' => 'Tutorials',
				'category_id' => 20,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			237 => 
			array (
				'id_interest' => 237,
				'name' => 'Comiendo Saludable',
				'description' => 'Tutorials',
				'category_id' => 20,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			238 => 
			array (
				'id_interest' => 238,
				'name' => 'Comida India',
				'description' => 'Tutorials',
				'category_id' => 20,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			239 => 
			array (
				'id_interest' => 239,
				'name' => 'Comida Francesa',
				'description' => 'Tutorials',
				'category_id' => 20,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			240 => 
			array (
				'id_interest' => 240,
				'name' => 'Alimentos Crudos',
				'description' => 'Tutorials',
				'category_id' => 20,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			241 => 
			array (
				'id_interest' => 241,
				'name' => 'Ley de la atraccion',
				'description' => 'Tutorials',
				'category_id' => 21,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			242 => 
			array (
				'id_interest' => 242,
				'name' => 'Espiritualidad',
				'description' => 'Tutorials',
				'category_id' => 21,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			243 => 
			array (
				'id_interest' => 243,
				'name' => 'Estudio de la Biblia',
				'description' => 'Tutorials',
				'category_id' => 21,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			244 => 
			array (
				'id_interest' => 244,
				'name' => 'Auto Exploracion',
				'description' => 'Tutorials',
				'category_id' => 21,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			245 => 
			array (
				'id_interest' => 245,
				'name' => 'PNL',
				'description' => 'Tutorials',
				'category_id' => 21,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			246 => 
			array (
				'id_interest' => 246,
				'name' => 'Catolicos',
				'description' => 'Tutorials',
				'category_id' => 21,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			247 => 
			array (
				'id_interest' => 247,
				'name' => 'Libre Pensadores',
				'description' => 'Tutorials',
				'category_id' => 21,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			248 => 
			array (
				'id_interest' => 248,
				'name' => 'Retiros',
				'description' => 'Tutorials',
				'category_id' => 21,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			249 => 
			array (
				'id_interest' => 249,
				'name' => 'Un Curso de Milagros',
				'description' => 'Tutorials',
				'category_id' => 21,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			250 => 
			array (
				'id_interest' => 250,
				'name' => 'Transformacion',
				'description' => 'Tutorials',
				'category_id' => 21,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			251 => 
			array (
				'id_interest' => 251,
				'name' => 'Musulmanes Progresivos',
				'description' => 'Tutorials',
				'category_id' => 21,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			252 => 
			array (
				'id_interest' => 252,
				'name' => 'Sensualidad',
				'description' => 'Tutorials',
				'category_id' => 21,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			253 => 
			array (
				'id_interest' => 253,
				'name' => 'Estado Fisico',
				'description' => 'Tutorials',
				'category_id' => 22,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			254 => 
			array (
				'id_interest' => 254,
				'name' => 'Ejercicio',
				'description' => 'Tutorials',
				'category_id' => 22,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			255 => 
			array (
				'id_interest' => 255,
				'name' => 'Caminatas',
				'description' => 'Tutorials',
				'category_id' => 22,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			256 => 
			array (
				'id_interest' => 256,
				'name' => 'NFL Football',
				'description' => 'Tutorials',
				'category_id' => 22,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			257 => 
			array (
				'id_interest' => 257,
				'name' => 'Golf',
				'description' => 'Tutorials',
				'category_id' => 22,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			258 => 
			array (
				'id_interest' => 258,
				'name' => 'Pick-up Tennis',
				'description' => 'Tutorials',
				'category_id' => 22,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			259 => 
			array (
				'id_interest' => 259,
				'name' => 'Voleibol',
				'description' => 'Tutorials',
				'category_id' => 22,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			260 => 
			array (
				'id_interest' => 260,
				'name' => 'Deportes Acuaticos',
				'description' => 'Tutorials',
				'category_id' => 22,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			261 => 
			array (
				'id_interest' => 261,
				'name' => 'Ciclismo',
				'description' => 'Tutorials',
				'category_id' => 22,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			262 => 
			array (
				'id_interest' => 262,
				'name' => 'Patinaje sobre Ruedas',
				'description' => 'Tutorials',
				'category_id' => 22,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			263 => 
			array (
				'id_interest' => 263,
				'name' => 'Deportes Recreacionales',
				'description' => 'Tutorials',
				'category_id' => 22,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			264 => 
			array (
				'id_interest' => 264,
				'name' => 'Ejercicio en Exteriores',
				'description' => 'Tutorials',
				'category_id' => 22,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			265 => 
			array (
				'id_interest' => 265,
				'name' => 'Ciencia',
				'description' => 'Tutorials',
				'category_id' => 23,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			266 => 
			array (
				'id_interest' => 266,
				'name' => 'Educacion y Tecnologia',
				'description' => 'Tutorials',
				'category_id' => 23,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			267 => 
			array (
				'id_interest' => 267,
				'name' => 'Discusiones Intelectuales',
				'description' => 'Tutorials',
				'category_id' => 23,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			268 => 
			array (
				'id_interest' => 268,
				'name' => 'Aprendizaje',
				'description' => 'Tutorials',
				'category_id' => 23,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			269 => 
			array (
				'id_interest' => 269,
				'name' => 'Relaciones Internacionales',
				'description' => 'Tutorials',
				'category_id' => 23,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			270 => 
			array (
				'id_interest' => 270,
				'name' => 'Educacion Sexual',
				'description' => 'Tutorials',
				'category_id' => 23,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			271 => 
			array (
				'id_interest' => 271,
				'name' => 'Alumnos de la Universidad',
				'description' => 'Tutorials',
				'category_id' => 23,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			272 => 
			array (
				'id_interest' => 272,
				'name' => 'Tutores',
				'description' => 'Tutorials',
				'category_id' => 23,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			273 => 
			array (
				'id_interest' => 273,
				'name' => 'Evolucion',
				'description' => 'Tutorials',
				'category_id' => 23,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			274 => 
			array (
				'id_interest' => 274,
				'name' => 'Habilidades en Comunicacion',
				'description' => 'Tutorials',
				'category_id' => 23,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			275 => 
			array (
				'id_interest' => 275,
				'name' => 'Hablar en Publica',
				'description' => 'Tutorials',
				'category_id' => 23,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			276 => 
			array (
				'id_interest' => 276,
				'name' => 'Filosofia',
				'description' => 'Tutorials',
				'category_id' => 23,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			277 => 
			array (
				'id_interest' => 277,
				'name' => 'Fotografia',
				'description' => 'Tutorials',
				'category_id' => 24,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			278 => 
			array (
				'id_interest' => 278,
				'name' => 'Ver Peliculas',
				'description' => 'Tutorials',
				'category_id' => 24,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			279 => 
			array (
				'id_interest' => 279,
				'name' => 'Fotografia de Moda',
				'description' => 'Tutorials',
				'category_id' => 24,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			280 => 
			array (
				'id_interest' => 280,
				'name' => 'Filmes y Video Produccion',
				'description' => 'Tutorials',
				'category_id' => 24,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			281 => 
			array (
				'id_interest' => 281,
				'name' => 'Fotografia Digital',
				'description' => 'Tutorials',
				'category_id' => 24,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			282 => 
			array (
				'id_interest' => 282,
				'name' => 'Filmes',
				'description' => 'Tutorials',
				'category_id' => 24,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			283 => 
			array (
				'id_interest' => 283,
				'name' => 'Clases de Fotografia',
				'description' => 'Tutorials',
				'category_id' => 24,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			284 => 
			array (
				'id_interest' => 284,
				'name' => 'Noches de Peliculas',
				'description' => 'Tutorials',
				'category_id' => 24,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			285 => 
			array (
				'id_interest' => 285,
				'name' => 'Fotografia de Retratos',
				'description' => 'Tutorials',
				'category_id' => 24,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			286 => 
			array (
				'id_interest' => 286,
				'name' => 'Sesiones de Fotografia Grupales',
				'description' => 'Tutorials',
				'category_id' => 24,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			287 => 
			array (
				'id_interest' => 287,
				'name' => 'Fotografia de Modelos',
				'description' => 'Tutorials',
				'category_id' => 24,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			288 => 
			array (
				'id_interest' => 288,
				'name' => 'Fotografia de Naturaleza',
				'description' => 'Tutorials',
				'category_id' => 24,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			289 => 
			array (
				'id_interest' => 289,
				'name' => 'Afroamericanos',
				'description' => 'Tutorials',
				'category_id' => 25,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			290 => 
			array (
				'id_interest' => 290,
				'name' => 'Lenguaje Frances',
				'description' => 'Tutorials',
				'category_id' => 25,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			291 => 
			array (
				'id_interest' => 291,
				'name' => 'Lenguaje y Cultura',
				'description' => 'Tutorials',
				'category_id' => 25,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			292 => 
			array (
				'id_interest' => 292,
				'name' => 'Asiaticos',
				'description' => 'Tutorials',
				'category_id' => 25,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			293 => 
			array (
				'id_interest' => 293,
				'name' => 'Mujeres Negras',
				'description' => 'Tutorials',
				'category_id' => 25,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			294 => 
			array (
				'id_interest' => 294,
				'name' => 'Multicultural',
				'description' => 'Tutorials',
				'category_id' => 25,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			295 => 
			array (
				'id_interest' => 295,
				'name' => 'Cultura India',
				'description' => 'Tutorials',
				'category_id' => 25,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			296 => 
			array (
				'id_interest' => 296,
				'name' => 'Diversidad Cultural',
				'description' => 'Tutorials',
				'category_id' => 25,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			297 => 
			array (
				'id_interest' => 297,
				'name' => 'Identidad Negra',
				'description' => 'Tutorials',
				'category_id' => 25,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			298 => 
			array (
				'id_interest' => 298,
				'name' => 'Cultura Latina',
				'description' => 'Tutorials',
				'category_id' => 25,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			299 => 
			array (
				'id_interest' => 299,
				'name' => 'Intercambio Cultural',
				'description' => 'Tutorials',
				'category_id' => 25,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			300 => 
			array (
				'id_interest' => 300,
				'name' => 'Lenguaje Ingles',
				'description' => 'Tutorials',
				'category_id' => 25,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			301 => 
			array (
				'id_interest' => 301,
				'name' => 'Club del Libro',
				'description' => 'Tutorials',
				'category_id' => 26,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			302 => 
			array (
				'id_interest' => 302,
				'name' => 'Escritura Creativa',
				'description' => 'Tutorials',
				'category_id' => 26,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			303 => 
			array (
				'id_interest' => 303,
				'name' => 'Lectura',
				'description' => 'Tutorials',
				'category_id' => 26,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			304 => 
			array (
				'id_interest' => 304,
				'name' => 'Poesia',
				'description' => 'Tutorials',
				'category_id' => 26,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			305 => 
			array (
				'id_interest' => 305,
				'name' => 'Escritura',
				'description' => 'Tutorials',
				'category_id' => 26,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			306 => 
			array (
				'id_interest' => 306,
				'name' => 'Literatura',
				'description' => 'Tutorials',
				'category_id' => 26,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			307 => 
			array (
				'id_interest' => 307,
				'name' => 'Ficcion',
				'description' => 'Tutorials',
				'category_id' => 26,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			308 => 
			array (
				'id_interest' => 308,
				'name' => 'Lectores',
				'description' => 'Tutorials',
				'category_id' => 26,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			309 => 
			array (
				'id_interest' => 309,
				'name' => 'Taller de Escritura',
				'description' => 'Tutorials',
				'category_id' => 26,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			310 => 
			array (
				'id_interest' => 310,
				'name' => 'Lectura de Novelas',
				'description' => 'Tutorials',
				'category_id' => 26,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			311 => 
			array (
				'id_interest' => 311,
				'name' => 'Escritura de Guiones',
				'description' => 'Tutorials',
				'category_id' => 26,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			312 => 
			array (
				'id_interest' => 312,
				'name' => 'Escritura de Novelas',
				'description' => 'Tutorials',
				'category_id' => 26,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			313 => 
			array (
				'id_interest' => 313,
				'name' => 'Musica en Vivo',
				'description' => 'Tutorials',
				'category_id' => 27,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			314 => 
			array (
				'id_interest' => 314,
				'name' => 'Musicos',
				'description' => 'Tutorials',
				'category_id' => 27,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			315 => 
			array (
				'id_interest' => 315,
				'name' => 'Cantantes',
				'description' => 'Tutorials',
				'category_id' => 27,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			316 => 
			array (
				'id_interest' => 316,
				'name' => 'Bateria Chamanica',
				'description' => 'Tutorials',
				'category_id' => 27,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			317 => 
			array (
				'id_interest' => 317,
				'name' => 'Musica Cristiana',
				'description' => 'Tutorials',
				'category_id' => 27,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			318 => 
			array (
				'id_interest' => 318,
				'name' => 'Conciertos',
				'description' => 'Tutorials',
				'category_id' => 27,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			319 => 
			array (
				'id_interest' => 319,
				'name' => 'Musica Latina',
				'description' => 'Tutorials',
				'category_id' => 27,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			320 => 
			array (
				'id_interest' => 320,
				'name' => 'Musica',
				'description' => 'Tutorials',
				'category_id' => 27,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			321 => 
			array (
				'id_interest' => 321,
				'name' => 'CantaAutores',
				'description' => 'Tutorials',
				'category_id' => 27,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			322 => 
			array (
				'id_interest' => 322,
				'name' => 'Cantar en Grupo',
				'description' => 'Tutorials',
				'category_id' => 27,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			323 => 
			array (
				'id_interest' => 323,
				'name' => 'Circulo de Tambores',
				'description' => 'Tutorials',
				'category_id' => 27,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			324 => 
			array (
				'id_interest' => 324,
				'name' => 'Coro',
				'description' => 'Tutorials',
				'category_id' => 27,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			325 => 
			array (
				'id_interest' => 325,
				'name' => 'Programacion',
				'description' => 'Tutorials',
				'category_id' => 28,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			326 => 
			array (
				'id_interest' => 326,
				'name' => 'Blogging',
				'description' => 'Tutorials',
				'category_id' => 28,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			327 => 
			array (
				'id_interest' => 327,
				'name' => 'Tecnologias WEB',
				'description' => 'Tutorials',
				'category_id' => 28,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			328 => 
			array (
				'id_interest' => 328,
				'name' => 'Java',
				'description' => 'Tutorials',
				'category_id' => 28,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			329 => 
			array (
				'id_interest' => 329,
				'name' => 'Inteligencia Artificial',
				'description' => 'Tutorials',
				'category_id' => 28,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			330 => 
			array (
				'id_interest' => 330,
				'name' => 'Desarrollo de Software',
				'description' => 'Tutorials',
				'category_id' => 28,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			331 => 
			array (
				'id_interest' => 331,
				'name' => 'Desarrollo WEB',
				'description' => 'Tutorials',
				'category_id' => 28,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			332 => 
			array (
				'id_interest' => 332,
				'name' => 'Nueva Tecnologia',
				'description' => 'Tutorials',
				'category_id' => 28,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			333 => 
			array (
				'id_interest' => 333,
				'name' => 'Codigo Abierto',
				'description' => 'Tutorials',
				'category_id' => 28,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			334 => 
			array (
				'id_interest' => 334,
				'name' => 'Diseño WEB',
				'description' => 'Tutorials',
				'category_id' => 28,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			335 => 
			array (
				'id_interest' => 335,
				'name' => 'Desarrollo Movil',
				'description' => 'Tutorials',
				'category_id' => 28,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			336 => 
			array (
				'id_interest' => 336,
				'name' => 'Tecnologia para Startups',
				'description' => 'Tutorials',
				'category_id' => 28,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			337 => 
			array (
				'id_interest' => 338,
				'name' => 'Outdoors',
				'description' => 'tutoriais',
				'category_id' => 29,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			338 => 
			array (
				'id_interest' => 339,
				'name' => 'caminhadas',
				'description' => 'tutoriais',
				'category_id' => 29,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			339 => 
			array (
				'id_interest' => 340,
				'name' => 'navegação',
				'description' => 'tutoriais',
				'category_id' => 29,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			340 => 
			array (
				'id_interest' => 341,
				'name' => 'Cruzeiros',
				'description' => 'tutoriais',
				'category_id' => 29,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			341 => 
			array (
				'id_interest' => 342,
				'name' => 'Mergulho',
				'description' => 'tutoriais',
				'category_id' => 29,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			342 => 
			array (
				'id_interest' => 343,
				'name' => 'Trilhas',
				'description' => 'tutoriais',
				'category_id' => 29,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			343 => 
			array (
				'id_interest' => 344,
				'name' => 'Bikes',
				'description' => 'tutoriais',
				'category_id' => 29,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			344 => 
			array (
				'id_interest' => 345,
				'name' => 'Aviação',
				'description' => 'tutoriais',
				'category_id' => 29,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			345 => 
			array (
				'id_interest' => 346,
				'name' => 'Aventura',
				'description' => 'tutoriais',
				'category_id' => 29,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			346 => 
			array (
				'id_interest' => 347,
				'name' => 'Camping',
				'description' => 'tutoriais',
				'category_id' => 29,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			347 => 
			array (
				'id_interest' => 348,
				'name' => 'Aventura ao ar livre',
				'description' => 'tutoriais',
				'category_id' => 29,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			348 => 
			array (
				'id_interest' => 349,
				'name' => 'Aventuras de final de semana',
				'description' => 'tutoriais',
				'category_id' => 29,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			349 => 
			array (
				'id_interest' => 350,
				'name' => 'Música ao vivo',
				'description' => 'tutoriais',
				'category_id' => 30,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			350 => 
			array (
				'id_interest' => 351,
				'name' => 'Artes Cênicas',
				'description' => 'tutoriais',
				'category_id' => 30,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			351 => 
			array (
				'id_interest' => 352,
				'name' => 'Claboração',
				'description' => 'tutoriais',
				'category_id' => 30,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			352 => 
			array (
				'id_interest' => 353,
				'name' => 'Artistas',
				'description' => 'tutoriais',
				'category_id' => 30,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			353 => 
			array (
				'id_interest' => 354,
				'name' => 'Atuando',
				'description' => 'tutoriais',
				'category_id' => 30,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			354 => 
			array (
				'id_interest' => 355,
				'name' => 'Teatro',
				'description' => 'tutoriais',
				'category_id' => 30,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			355 => 
			array (
				'id_interest' => 356,
				'name' => 'Criatividade',
				'description' => 'tutoriais',
				'category_id' => 30,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			356 => 
			array (
				'id_interest' => 357,
				'name' => 'Pintura',
				'description' => 'tutoriais',
				'category_id' => 30,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			357 => 
			array (
				'id_interest' => 358,
				'name' => 'Círculo criativo',
				'description' => 'tutoriais',
				'category_id' => 30,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			358 => 
			array (
				'id_interest' => 359,
				'name' => 'Arte e entretenimento',
				'description' => 'tutoriais',
				'category_id' => 30,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			359 => 
			array (
				'id_interest' => 360,
				'name' => 'Design Gráfico',
				'description' => 'tutoriais',
				'category_id' => 30,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			360 => 
			array (
				'id_interest' => 361,
				'name' => 'Desenho',
				'description' => 'tutoriais',
				'category_id' => 30,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			361 => 
			array (
				'id_interest' => 362,
				'name' => 'Dança de Salão',
				'description' => 'tutoriais',
				'category_id' => 31,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			362 => 
			array (
				'id_interest' => 363,
				'name' => 'Aulas de dança',
				'description' => 'tutoriais',
				'category_id' => 31,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			363 => 
			array (
				'id_interest' => 364,
				'name' => 'Aulas de dança do ventre',
				'description' => 'tutoriais',
				'category_id' => 31,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			364 => 
			array (
				'id_interest' => 365,
				'name' => 'Dança',
				'description' => 'tutoriais',
				'category_id' => 31,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			365 => 
			array (
				'id_interest' => 366,
				'name' => 'Dança social',
				'description' => 'tutoriais',
				'category_id' => 31,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			366 => 
			array (
				'id_interest' => 367,
				'name' => 'Salsa',
				'description' => 'tutoriais',
				'category_id' => 31,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			367 => 
			array (
				'id_interest' => 368,
				'name' => 'Dança latina',
				'description' => 'tutoriais',
				'category_id' => 31,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			368 => 
			array (
				'id_interest' => 369,
				'name' => 'Dança e movimento',
				'description' => 'tutoriais',
				'category_id' => 31,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			369 => 
			array (
				'id_interest' => 370,
				'name' => 'Swing ',
				'description' => 'tutoriais',
				'category_id' => 31,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			370 => 
			array (
				'id_interest' => 371,
				'name' => 'Aulas de salsa',
				'description' => 'tutoriais',
				'category_id' => 31,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			371 => 
			array (
				'id_interest' => 372,
				'name' => 'Bachata',
				'description' => 'tutoriais',
				'category_id' => 31,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			372 => 
			array (
				'id_interest' => 373,
				'name' => 'Tango',
				'description' => 'tutoriais',
				'category_id' => 31,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			373 => 
			array (
				'id_interest' => 374,
				'name' => 'TEPT',
				'description' => 'tutoriais',
				'category_id' => 32,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			374 => 
			array (
				'id_interest' => 375,
				'name' => 'Vida saudável',
				'description' => 'tutoriais',
				'category_id' => 32,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			375 => 
			array (
				'id_interest' => 376,
				'name' => 'Intimidade',
				'description' => 'tutoriais',
				'category_id' => 32,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			376 => 
			array (
				'id_interest' => 377,
				'name' => 'Meditação',
				'description' => 'tutoriais',
				'category_id' => 32,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			377 => 
			array (
				'id_interest' => 378,
				'name' => 'Auto-ajuda',
				'description' => 'tutoriais',
				'category_id' => 32,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			378 => 
			array (
				'id_interest' => 379,
				'name' => 'Os sobrevientes do Cancêr',
				'description' => 'tutoriais',
				'category_id' => 32,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			379 => 
			array (
				'id_interest' => 380,
				'name' => 'Maconha medicinal',
				'description' => 'tutoriais',
				'category_id' => 32,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			380 => 
			array (
				'id_interest' => 381,
				'name' => 'Família Saudável',
				'description' => 'tutoriais',
				'category_id' => 32,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			381 => 
			array (
				'id_interest' => 382,
				'name' => 'Necessidades especiais das famílias',
				'description' => 'tutoriais',
				'category_id' => 32,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			382 => 
			array (
				'id_interest' => 383,
				'name' => 'Apoio ao luto',
				'description' => 'tutoriais',
				'category_id' => 32,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			383 => 
			array (
				'id_interest' => 384,
				'name' => 'DDA',
				'description' => 'tutoriais',
				'category_id' => 32,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			384 => 
			array (
				'id_interest' => 385,
				'name' => 'Construindo relações',
				'description' => 'tutoriais',
				'category_id' => 32,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			385 => 
			array (
				'id_interest' => 386,
				'name' => 'Imobiliária',
				'description' => 'tutoriais',
				'category_id' => 33,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			386 => 
			array (
				'id_interest' => 387,
				'name' => 'Profissionais da Ásia',
				'description' => 'tutoriais',
				'category_id' => 33,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			387 => 
			array (
				'id_interest' => 388,
				'name' => 'Estratégias de Negócio',
				'description' => 'tutoriais',
				'category_id' => 33,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			388 => 
			array (
				'id_interest' => 389,
				'name' => 'Desenvolvimento de Liderança',
				'description' => 'tutoriais',
				'category_id' => 33,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			389 => 
			array (
				'id_interest' => 390,
				'name' => 'Profissionais da Índia',
				'description' => 'tutoriais',
				'category_id' => 33,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			390 => 
			array (
				'id_interest' => 391,
				'name' => 'Desenvolvimento Profissional',
				'description' => 'tutoriais',
				'category_id' => 33,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			391 => 
			array (
				'id_interest' => 392,
				'name' => 'Liderança',
				'description' => 'tutoriais',
				'category_id' => 33,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			392 => 
			array (
				'id_interest' => 393,
				'name' => 'Golfe como ferramenta de negócios',
				'description' => 'tutoriais',
				'category_id' => 33,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			393 => 
			array (
				'id_interest' => 394,
				'name' => 'Captação de recursos',
				'description' => 'tutoriais',
				'category_id' => 33,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			394 => 
			array (
				'id_interest' => 395,
				'name' => 'Jovens profissionais',
				'description' => 'tutoriais',
				'category_id' => 33,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			395 => 
			array (
				'id_interest' => 396,
				'name' => 'Sucesso',
				'description' => 'tutoriais',
				'category_id' => 33,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			396 => 
			array (
				'id_interest' => 397,
				'name' => 'Profissionais Latino/a',
				'description' => 'tutoriais',
				'category_id' => 33,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			397 => 
			array (
				'id_interest' => 398,
				'name' => 'Jantar fora',
				'description' => 'tutoriais',
				'category_id' => 34,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			398 => 
			array (
				'id_interest' => 399,
				'name' => 'Pubs e Bares',
				'description' => 'tutoriais',
				'category_id' => 34,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			399 => 
			array (
				'id_interest' => 400,
				'name' => 'Vinho',
				'description' => 'tutoriais',
				'category_id' => 34,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			400 => 
			array (
				'id_interest' => 401,
				'name' => 'Vegan',
				'description' => 'tutoriais',
				'category_id' => 34,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			401 => 
			array (
				'id_interest' => 402,
				'name' => 'Cerveja',
				'description' => 'tutoriais',
				'category_id' => 34,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			402 => 
			array (
				'id_interest' => 403,
				'name' => 'Explorando novos restaurantes',
				'description' => 'tutoriais',
				'category_id' => 34,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			403 => 
			array (
				'id_interest' => 404,
				'name' => 'Alimentos vivos',
				'description' => 'tutoriais',
				'category_id' => 34,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			404 => 
			array (
				'id_interest' => 405,
				'name' => 'BBQ',
				'description' => 'tutoriais',
				'category_id' => 34,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			405 => 
			array (
				'id_interest' => 406,
				'name' => 'Alimentação saudável',
				'description' => 'tutoriais',
				'category_id' => 34,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			406 => 
			array (
				'id_interest' => 407,
				'name' => 'Comida Indiana',
				'description' => 'tutoriais',
				'category_id' => 34,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			407 => 
			array (
				'id_interest' => 408,
				'name' => 'Comida Francesa',
				'description' => 'tutoriais',
				'category_id' => 34,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			408 => 
			array (
				'id_interest' => 409,
				'name' => 'Alimentos crus',
				'description' => 'tutoriais',
				'category_id' => 34,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			409 => 
			array (
				'id_interest' => 410,
				'name' => 'Lei da atração',
				'description' => 'tutoriais',
				'category_id' => 35,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			410 => 
			array (
				'id_interest' => 411,
				'name' => 'Espiritualidade',
				'description' => 'tutoriais',
				'category_id' => 35,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			411 => 
			array (
				'id_interest' => 412,
				'name' => 'Estudo da Bíblia',
				'description' => 'tutoriais',
				'category_id' => 35,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			412 => 
			array (
				'id_interest' => 413,
				'name' => 'Auto exploração',
				'description' => 'tutoriais',
				'category_id' => 35,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			413 => 
			array (
				'id_interest' => 414,
				'name' => 'NLP',
				'description' => 'tutoriais',
				'category_id' => 35,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			414 => 
			array (
				'id_interest' => 415,
				'name' => 'Doutrina Católica',
				'description' => 'tutoriais',
				'category_id' => 35,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			415 => 
			array (
				'id_interest' => 416,
				'name' => 'Livre pensador',
				'description' => 'tutoriais',
				'category_id' => 35,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			416 => 
			array (
				'id_interest' => 417,
				'name' => 'Retiros',
				'description' => 'tutoriais',
				'category_id' => 35,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			417 => 
			array (
				'id_interest' => 418,
				'name' => 'Um Curso em Milagres',
				'description' => 'tutoriais',
				'category_id' => 35,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			418 => 
			array (
				'id_interest' => 419,
				'name' => 'Transformação',
				'description' => 'tutoriais',
				'category_id' => 35,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			419 => 
			array (
				'id_interest' => 420,
				'name' => 'Muçulmanos Progressistas',
				'description' => 'tutoriais',
				'category_id' => 35,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			420 => 
			array (
				'id_interest' => 421,
				'name' => 'Sensualidade',
				'description' => 'tutoriais',
				'category_id' => 35,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			421 => 
			array (
				'id_interest' => 422,
				'name' => 'Fitness',
				'description' => 'tutoriais',
				'category_id' => 36,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			422 => 
			array (
				'id_interest' => 423,
				'name' => 'Exercício',
				'description' => 'tutoriais',
				'category_id' => 36,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			423 => 
			array (
				'id_interest' => 424,
				'name' => 'Caminhada',
				'description' => 'tutoriais',
				'category_id' => 36,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			424 => 
			array (
				'id_interest' => 425,
				'name' => 'NFL Futebol Americano',
				'description' => 'tutoriais',
				'category_id' => 36,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			425 => 
			array (
				'id_interest' => 426,
				'name' => 'Golfe',
				'description' => 'tutoriais',
				'category_id' => 36,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			426 => 
			array (
				'id_interest' => 427,
				'name' => 'Tênis',
				'description' => 'tutoriais',
				'category_id' => 36,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			427 => 
			array (
				'id_interest' => 428,
				'name' => 'Voleibol',
				'description' => 'tutoriais',
				'category_id' => 36,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			428 => 
			array (
				'id_interest' => 429,
				'name' => 'Esportes Aquáticos',
				'description' => 'tutoriais',
				'category_id' => 36,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			429 => 
			array (
				'id_interest' => 430,
				'name' => 'ciclismo',
				'description' => 'tutoriais',
				'category_id' => 36,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			430 => 
			array (
				'id_interest' => 431,
				'name' => 'Patinagem',
				'description' => 'tutoriais',
				'category_id' => 36,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			431 => 
			array (
				'id_interest' => 432,
				'name' => 'Desporto Recreativo',
				'description' => 'tutoriais',
				'category_id' => 36,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			432 => 
			array (
				'id_interest' => 433,
				'name' => 'ginástica ao ar livre',
				'description' => 'tutoriais',
				'category_id' => 36,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			433 => 
			array (
				'id_interest' => 434,
				'name' => 'ciência',
				'description' => 'tutoriais',
				'category_id' => 37,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			434 => 
			array (
				'id_interest' => 435,
				'name' => 'Educação e Tecnologia',
				'description' => 'tutoriais',
				'category_id' => 37,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			435 => 
			array (
				'id_interest' => 436,
				'name' => 'Discussão intelectual',
				'description' => 'tutoriais',
				'category_id' => 37,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			436 => 
			array (
				'id_interest' => 437,
				'name' => 'aprendizagem',
				'description' => 'tutoriais',
				'category_id' => 37,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			437 => 
			array (
				'id_interest' => 438,
				'name' => 'Relações Internacionais',
				'description' => 'tutoriais',
				'category_id' => 37,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			438 => 
			array (
				'id_interest' => 439,
				'name' => 'Educação sexual',
				'description' => 'tutoriais',
				'category_id' => 37,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			439 => 
			array (
				'id_interest' => 440,
				'name' => 'Acadêmicos',
				'description' => 'tutoriais',
				'category_id' => 37,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			440 => 
			array (
				'id_interest' => 441,
				'name' => 'Apoio da escola para casa',
				'description' => 'tutoriais',
				'category_id' => 37,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			441 => 
			array (
				'id_interest' => 442,
				'name' => 'evolução',
				'description' => 'tutoriais',
				'category_id' => 37,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			442 => 
			array (
				'id_interest' => 443,
				'name' => 'Habilidades de Comunicação',
				'description' => 'tutoriais',
				'category_id' => 37,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			443 => 
			array (
				'id_interest' => 444,
				'name' => 'Falar em Público',
				'description' => 'tutoriais',
				'category_id' => 37,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			444 => 
			array (
				'id_interest' => 445,
				'name' => 'filosofia',
				'description' => 'tutoriais',
				'category_id' => 37,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			445 => 
			array (
				'id_interest' => 446,
				'name' => 'fotografia',
				'description' => 'tutoriais',
				'category_id' => 38,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			446 => 
			array (
				'id_interest' => 447,
				'name' => 'Filmes para assistir',
				'description' => 'tutoriais',
				'category_id' => 38,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			447 => 
			array (
				'id_interest' => 448,
				'name' => 'Fotografia de Moda',
				'description' => 'tutoriais',
				'category_id' => 38,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			448 => 
			array (
				'id_interest' => 449,
				'name' => 'Cinema e Produção de Vídeo',
				'description' => 'tutoriais',
				'category_id' => 38,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			449 => 
			array (
				'id_interest' => 450,
				'name' => 'Fotografia digital',
				'description' => 'tutoriais',
				'category_id' => 38,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			450 => 
			array (
				'id_interest' => 451,
				'name' => 'filme',
				'description' => 'tutoriais',
				'category_id' => 38,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			451 => 
			array (
				'id_interest' => 452,
				'name' => 'Aula de fotografia ',
				'description' => 'tutoriais',
				'category_id' => 38,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			452 => 
			array (
				'id_interest' => 453,
				'name' => 'Noites de cinema',
				'description' => 'tutoriais',
				'category_id' => 38,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			453 => 
			array (
				'id_interest' => 454,
				'name' => 'Fotografia de Retrato',
				'description' => 'tutoriais',
				'category_id' => 38,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			454 => 
			array (
				'id_interest' => 455,
				'name' => 'Grupo sessões de fotos',
				'description' => 'tutoriais',
				'category_id' => 38,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			455 => 
			array (
				'id_interest' => 456,
				'name' => 'Modelo de Fotografia ',
				'description' => 'tutoriais',
				'category_id' => 38,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			456 => 
			array (
				'id_interest' => 457,
				'name' => 'Fotografia Natual',
				'description' => 'tutoriais',
				'category_id' => 38,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			457 => 
			array (
				'id_interest' => 458,
				'name' => 'afro-americanos',
				'description' => 'tutoriais',
				'category_id' => 39,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			458 => 
			array (
				'id_interest' => 459,
				'name' => 'Língua Francesa',
				'description' => 'tutoriais',
				'category_id' => 39,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			459 => 
			array (
				'id_interest' => 460,
				'name' => 'Língua e cultura',
				'description' => 'tutoriais',
				'category_id' => 39,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			460 => 
			array (
				'id_interest' => 461,
				'name' => 'Asiáticos',
				'description' => 'tutoriais',
				'category_id' => 39,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			461 => 
			array (
				'id_interest' => 462,
				'name' => 'Mulheres Negras',
				'description' => 'tutoriais',
				'category_id' => 39,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			462 => 
			array (
				'id_interest' => 463,
				'name' => 'multicultural',
				'description' => 'tutoriais',
				'category_id' => 39,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			463 => 
			array (
				'id_interest' => 464,
				'name' => 'Cultura Indiana',
				'description' => 'tutoriais',
				'category_id' => 39,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			464 => 
			array (
				'id_interest' => 465,
				'name' => 'Diversidade cultural',
				'description' => 'tutoriais',
				'category_id' => 39,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			465 => 
			array (
				'id_interest' => 466,
				'name' => 'Identidade negra',
				'description' => 'tutoriais',
				'category_id' => 39,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			466 => 
			array (
				'id_interest' => 467,
				'name' => 'Cultura Latina',
				'description' => 'tutoriais',
				'category_id' => 39,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			467 => 
			array (
				'id_interest' => 468,
				'name' => 'Intercambio cultural',
				'description' => 'tutoriais',
				'category_id' => 39,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			468 => 
			array (
				'id_interest' => 469,
				'name' => 'Língua inglesa',
				'description' => 'tutoriais',
				'category_id' => 39,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			469 => 
			array (
				'id_interest' => 470,
				'name' => 'Book Club',
				'description' => 'tutoriais',
				'category_id' => 40,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			470 => 
			array (
				'id_interest' => 471,
				'name' => 'Escrita Criativa',
				'description' => 'tutoriais',
				'category_id' => 40,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			471 => 
			array (
				'id_interest' => 472,
				'name' => 'leitura',
				'description' => 'tutoriais',
				'category_id' => 40,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			472 => 
			array (
				'id_interest' => 473,
				'name' => 'poesia',
				'description' => 'tutoriais',
				'category_id' => 40,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			473 => 
			array (
				'id_interest' => 474,
				'name' => 'escrita',
				'description' => 'tutoriais',
				'category_id' => 40,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			474 => 
			array (
				'id_interest' => 475,
				'name' => 'literatura',
				'description' => 'tutoriais',
				'category_id' => 40,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			475 => 
			array (
				'id_interest' => 476,
				'name' => 'ficção',
				'description' => 'tutoriais',
				'category_id' => 40,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			476 => 
			array (
				'id_interest' => 477,
				'name' => 'leitores',
				'description' => 'tutoriais',
				'category_id' => 40,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			477 => 
			array (
				'id_interest' => 478,
				'name' => 'oficinas de escrita',
				'description' => 'tutoriais',
				'category_id' => 40,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			478 => 
			array (
				'id_interest' => 479,
				'name' => 'Leituras de novela',
				'description' => 'tutoriais',
				'category_id' => 40,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			479 => 
			array (
				'id_interest' => 480,
				'name' => 'Roteiros',
				'description' => 'tutoriais',
				'category_id' => 40,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			480 => 
			array (
				'id_interest' => 481,
				'name' => 'Escrita de novela',
				'description' => 'tutoriais',
				'category_id' => 40,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			481 => 
			array (
				'id_interest' => 482,
				'name' => 'Música ao vivo',
				'description' => 'tutoriais',
				'category_id' => 41,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			482 => 
			array (
				'id_interest' => 483,
				'name' => 'músicos',
				'description' => 'tutoriais',
				'category_id' => 41,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			483 => 
			array (
				'id_interest' => 484,
				'name' => 'Canto',
				'description' => 'tutoriais',
				'category_id' => 41,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			484 => 
			array (
				'id_interest' => 485,
				'name' => 'tambores xamânicos',
				'description' => 'tutoriais',
				'category_id' => 41,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			485 => 
			array (
				'id_interest' => 486,
				'name' => 'Música Cristã',
				'description' => 'tutoriais',
				'category_id' => 41,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			486 => 
			array (
				'id_interest' => 487,
				'name' => 'concertos',
				'description' => 'tutoriais',
				'category_id' => 41,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			487 => 
			array (
				'id_interest' => 488,
				'name' => 'Música Latina',
				'description' => 'tutoriais',
				'category_id' => 41,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			488 => 
			array (
				'id_interest' => 489,
				'name' => 'música',
				'description' => 'tutoriais',
				'category_id' => 41,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			489 => 
			array (
				'id_interest' => 490,
				'name' => 'Composições',
				'description' => 'tutoriais',
				'category_id' => 41,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			490 => 
			array (
				'id_interest' => 491,
				'name' => 'Cantos de grupos',
				'description' => 'tutoriais',
				'category_id' => 41,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			491 => 
			array (
				'id_interest' => 492,
				'name' => 'tambor ',
				'description' => 'tutoriais',
				'category_id' => 41,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			492 => 
			array (
				'id_interest' => 493,
				'name' => 'coro',
				'description' => 'tutoriais',
				'category_id' => 41,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			493 => 
			array (
				'id_interest' => 494,
				'name' => 'programação',
				'description' => 'tutoriais',
				'category_id' => 42,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			494 => 
			array (
				'id_interest' => 495,
				'name' => 'Blogar',
				'description' => 'tutoriais',
				'category_id' => 42,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			495 => 
			array (
				'id_interest' => 496,
				'name' => 'Tecnologia web',
				'description' => 'tutoriais',
				'category_id' => 42,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			496 => 
			array (
				'id_interest' => 497,
				'name' => 'Java',
				'description' => 'tutoriais',
				'category_id' => 42,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			497 => 
			array (
				'id_interest' => 498,
				'name' => 'inteligência Artificial',
				'description' => 'tutoriais',
				'category_id' => 42,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			498 => 
			array (
				'id_interest' => 499,
				'name' => 'Desenvolvimento de Software',
				'description' => 'tutoriais',
				'category_id' => 42,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			499 => 
			array (
				'id_interest' => 500,
				'name' => 'Desenvolvimento de web',
				'description' => 'tutoriais',
				'category_id' => 42,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
		));
		\DB::table('interests_categories')->insert(array (
			0 => 
			array (
				'id_interest' => 501,
				'name' => 'novas Tecnologias',
				'description' => 'tutoriais',
				'category_id' => 42,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			1 => 
			array (
				'id_interest' => 502,
				'name' => 'Open Source',
				'description' => 'tutoriais',
				'category_id' => 42,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			2 => 
			array (
				'id_interest' => 503,
				'name' => 'web Design',
				'description' => 'tutoriais',
				'category_id' => 42,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			3 => 
			array (
				'id_interest' => 504,
				'name' => 'mobile Development',
				'description' => 'tutoriais',
				'category_id' => 42,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			4 => 
			array (
				'id_interest' => 505,
				'name' => 'Tecnologia Startups ',
				'description' => 'tutoriais',
				'category_id' => 42,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
=======
>>>>>>> local
=======
>>>>>>> staging
		));
	}

}
