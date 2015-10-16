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

		\DB::table('interests_categories')->insert(array (
			1 =>
			array (
				'id_interest' => 1,
				'name' => 'Outdoors',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at magna dolor. Sed commodo feugiat lobortis. Aliquam lacinia sollicitudin porta. Nulla mollis eu enim non feugiat. Mauris convallis purus ut porta elementum. Nunc elementum ligula vel tincidunt luctus. Quisque orci enim, tempus eu fringilla a, semper ac libero. Sed condimentum leo at ipsum fringilla, ut elementum tellus ultrices. Mauris quis tempor urna, sit amet blandit lorem. In ante ante, feugiat non leo ut, molestie commodo purus. Vivamus lacinia sollicitudin urna. Aliquam et sem sed est tincidunt molestie condimentum non ligula. Quisque sed ipsum eu libero dictum pellentesque at et lorem. Morbi cursus faucibus gravida.',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			2 =>
			array (
				'id_interest' => 2,
				'name' => 'Hiking',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at magna dolor. Sed commodo feugiat lobortis. Aliquam lacinia sollicitudin porta. Nulla mollis eu enim non feugiat. Mauris convallis purus ut porta elementum. Nunc elementum ligula vel tincidunt luctus. Quisque orci enim, tempus eu fringilla a, semper ac libero. Sed condimentum leo at ipsum fringilla, ut elementum tellus ultrices. Mauris quis tempor urna, sit amet blandit lorem. In ante ante, feugiat non leo ut, molestie commodo purus. Vivamus lacinia sollicitudin urna. Aliquam et sem sed est tincidunt molestie condimentum non ligula. Quisque sed ipsum eu libero dictum pellentesque at et lorem. Morbi cursus faucibus gravida.',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			3 =>
			array (
				'id_interest' => 3,
				'name' => 'Sailing',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at magna dolor. Sed commodo feugiat lobortis. Aliquam lacinia sollicitudin porta. Nulla mollis eu enim non feugiat. Mauris convallis purus ut porta elementum. Nunc elementum ligula vel tincidunt luctus. Quisque orci enim, tempus eu fringilla a, semper ac libero. Sed condimentum leo at ipsum fringilla, ut elementum tellus ultrices. Mauris quis tempor urna, sit amet blandit lorem. In ante ante, feugiat non leo ut, molestie commodo purus. Vivamus lacinia sollicitudin urna. Aliquam et sem sed est tincidunt molestie condimentum non ligula. Quisque sed ipsum eu libero dictum pellentesque at et lorem. Morbi cursus faucibus gravida.',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			4 =>
			array (
				'id_interest' => 4,
				'name' => 'Cruises',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at magna dolor. Sed commodo feugiat lobortis. Aliquam lacinia sollicitudin porta. Nulla mollis eu enim non feugiat. Mauris convallis purus ut porta elementum. Nunc elementum ligula vel tincidunt luctus. Quisque orci enim, tempus eu fringilla a, semper ac libero. Sed condimentum leo at ipsum fringilla, ut elementum tellus ultrices. Mauris quis tempor urna, sit amet blandit lorem. In ante ante, feugiat non leo ut, molestie commodo purus. Vivamus lacinia sollicitudin urna. Aliquam et sem sed est tincidunt molestie condimentum non ligula. Quisque sed ipsum eu libero dictum pellentesque at et lorem. Morbi cursus faucibus gravida.',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			5 =>
			array (
				'id_interest' => 5,
				'name' => 'Scuba Diving',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			6 =>
			array (
				'id_interest' => 6,
				'name' => 'Trail Running',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			7 =>
			array (
				'id_interest' => 7,
				'name' => 'Sport Bikes',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			8 =>
			array (
				'id_interest' => 8,
				'name' => 'Aviation',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			9 =>
			array (
				'id_interest' => 9,
				'name' => 'Adventure',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			10 =>
			array (
				'id_interest' => 10,
				'name' => 'Camping',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			11 =>
			array (
				'id_interest' => 11,
				'name' => 'Outdoor Adventures',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			12 =>
			array (
				'id_interest' => 12,
				'name' => 'Weekend Adventures',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 1,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			13 =>
			array (
				'id_interest' => 13,
				'name' => 'Live Music',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			14 =>
			array (
				'id_interest' => 14,
				'name' => 'Performing Arts',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			15 =>
			array (
				'id_interest' => 15,
				'name' => 'Collaboration',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			16 =>
			array (
				'id_interest' => 16,
				'name' => 'Artists',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			17 =>
			array (
				'id_interest' => 17,
				'name' => 'Acting',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			18 =>
			array (
				'id_interest' => 18,
				'name' => 'Theater',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			19 =>
			array (
				'id_interest' => 19,
				'name' => 'Creativity',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			20 =>
			array (
				'id_interest' => 20,
				'name' => 'Painting',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			21 =>
			array (
				'id_interest' => 21,
				'name' => 'Creative Circle',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			22 =>
			array (
				'id_interest' => 22,
				'name' => 'Arts & Entertainment',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			23 =>
			array (
				'id_interest' => 23,
				'name' => 'Graphic Design',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			24 =>
			array (
				'id_interest' => 24,
				'name' => 'Drawing',
				'description' => 'Tutorials About Photoshop',
				'category_id' => 2,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			25 =>
			array (
				'id_interest' => 25,
				'name' => 'Ballroom Dancing',
				'description' => 'Tutorials 1',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			26 =>
			array (
				'id_interest' => 26,
				'name' => 'Dance Lessons',
				'description' => 'Tutorials 2',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			27 =>
			array (
				'id_interest' => 27,
				'name' => 'Belly Dance Lessons',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			28 =>
			array (
				'id_interest' => 28,
				'name' => 'Dancing',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			29 =>
			array (
				'id_interest' => 29,
				'name' => 'Social Dancing',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			30 =>
			array (
				'id_interest' => 30,
				'name' => 'Salsa',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			31 =>
			array (
				'id_interest' => 31,
				'name' => 'Latin Dance',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			32 =>
			array (
				'id_interest' => 32,
				'name' => 'Dance and Movement',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			33 =>
			array (
				'id_interest' => 33,
				'name' => 'Swing Dancing',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			34 =>
			array (
				'id_interest' => 34,
				'name' => 'Salsa Dance Lessons',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			35 =>
			array (
				'id_interest' => 35,
				'name' => 'Bachata',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			36 =>
			array (
				'id_interest' => 36,
				'name' => 'Tango',
				'description' => 'Tutorials',
				'category_id' => 3,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			37 =>
			array (
				'id_interest' => 37,
				'name' => 'PTSD',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			38 =>
			array (
				'id_interest' => 38,
				'name' => 'Healthy Living',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			39 =>
			array (
				'id_interest' => 39,
				'name' => 'Intimacy',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			40 =>
			array (
				'id_interest' => 40,
				'name' => 'Meditation',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			41 =>
			array (
				'id_interest' => 41,
				'name' => 'Self-Improvement',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			42 =>
			array (
				'id_interest' => 42,
				'name' => 'Cancer Survivors',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			43 =>
			array (
				'id_interest' => 43,
				'name' => 'Medical Marijuana',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			44 =>
			array (
				'id_interest' => 44,
				'name' => 'Healthy Family',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			45 =>
			array (
				'id_interest' => 45,
				'name' => 'Special Needs Families',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			46 =>
			array (
				'id_interest' => 46,
				'name' => 'Grief Support',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			47 =>
			array (
				'id_interest' => 47,
				'name' => 'ADHD',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			48 =>
			array (
				'id_interest' => 48,
				'name' => 'Relationship Building',
				'description' => 'Tutorials',
				'category_id' => 4,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			49 =>
			array (
				'id_interest' => 49,
				'name' => 'Real Estate',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			50 =>
			array (
				'id_interest' => 50,
				'name' => 'Asian Professionals',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			51 =>
			array (
				'id_interest' => 51,
				'name' => 'Business Strategy',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			52 =>
			array (
				'id_interest' => 52,
				'name' => 'Leadership Development',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			53 =>
			array (
				'id_interest' => 53,
				'name' => 'Indian Professionals',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			54 =>
			array (
				'id_interest' => 54,
				'name' => 'Professional Development',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			55 =>
			array (
				'id_interest' => 55,
				'name' => 'Leadership',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			56 =>
			array (
				'id_interest' => 56,
				'name' => 'Golf as a Business Tool',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			57 =>
			array (
				'id_interest' => 57,
				'name' => 'Fundraising',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			58 =>
			array (
				'id_interest' => 58,
				'name' => 'Young Professionals',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			59 =>
			array (
				'id_interest' => 59,
				'name' => 'Success',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			60 =>
			array (
				'id_interest' => 60,
				'name' => 'Latino/a Professionals',
				'description' => 'Tutorials',
				'category_id' => 5,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			61 =>
			array (
				'id_interest' => 61,
				'name' => 'Dining Out',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			62 =>
			array (
				'id_interest' => 62,
				'name' => 'Pubs and Bars',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			63 =>
			array (
				'id_interest' => 63,
				'name' => 'Wine',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			64 =>
			array (
				'id_interest' => 64,
				'name' => 'Vegan',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			65 =>
			array (
				'id_interest' => 65,
				'name' => 'Beer',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			66 =>
			array (
				'id_interest' => 66,
				'name' => 'Exploring New Restaurants',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			67 =>
			array (
				'id_interest' => 67,
				'name' => 'Living Foods',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			68 =>
			array (
				'id_interest' => 68,
				'name' => 'BBQ',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			69 =>
			array (
				'id_interest' => 69,
				'name' => 'Healthy Eating',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			70 =>
			array (
				'id_interest' => 70,
				'name' => 'Indian Food',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			71 =>
			array (
				'id_interest' => 71,
				'name' => 'French Food',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			72 =>
			array (
				'id_interest' => 72,
				'name' => 'Raw Food',
				'description' => 'Tutorials',
				'category_id' => 6,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			73 =>
			array (
				'id_interest' => 73,
				'name' => 'Law of Attraction',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			74 =>
			array (
				'id_interest' => 74,
				'name' => 'Spirituality',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			75 =>
			array (
				'id_interest' => 75,
				'name' => 'Bible Study',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			76 =>
			array (
				'id_interest' => 76,
				'name' => 'Self Exploration',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			77 =>
			array (
				'id_interest' => 77,
				'name' => 'NLP',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			78 =>
			array (
				'id_interest' => 78,
				'name' => 'Catholic Social',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			79 =>
			array (
				'id_interest' => 79,
				'name' => 'Freethinker',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			80 =>
			array (
				'id_interest' => 80,
				'name' => 'Retreats',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			81 =>
			array (
				'id_interest' => 81,
				'name' => 'A Course In Miracles',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			82 =>
			array (
				'id_interest' => 82,
				'name' => 'Transformation',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			83 =>
			array (
				'id_interest' => 83,
				'name' => 'Progressive Muslim',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			84 =>
			array (
				'id_interest' => 84,
				'name' => 'Sensuality',
				'description' => 'Tutorials',
				'category_id' => 7,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			85 =>
			array (
				'id_interest' => 85,
				'name' => 'Fitness',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			86 =>
			array (
				'id_interest' => 86,
				'name' => 'Exercise',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			87 =>
			array (
				'id_interest' => 87,
				'name' => 'Walking',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			88 =>
			array (
				'id_interest' => 88,
				'name' => 'NFL Football',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			89 =>
			array (
				'id_interest' => 89,
				'name' => 'Golf',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			90 =>
			array (
				'id_interest' => 90,
				'name' => 'Pick-up Tennis',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			91 =>
			array (
				'id_interest' => 91,
				'name' => 'Volleyball',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			92 =>
			array (
				'id_interest' => 92,
				'name' => 'Water Sports',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			93 =>
			array (
				'id_interest' => 93,
				'name' => 'Cycling',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			94 =>
			array (
				'id_interest' => 94,
				'name' => 'Roller Skating',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			95 =>
			array (
				'id_interest' => 95,
				'name' => 'Recreational Sports',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			96 =>
			array (
				'id_interest' => 96,
				'name' => 'Outdoor Fitness',
				'description' => 'Tutorials',
				'category_id' => 8,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			97 =>
			array (
				'id_interest' => 97,
				'name' => 'Science',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			98 =>
			array (
				'id_interest' => 98,
				'name' => 'Education & Technology',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			99 =>
			array (
				'id_interest' => 99,
				'name' => 'Intellectual Discussion',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			100 =>
			array (
				'id_interest' => 100,
				'name' => 'Learning',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			101 =>
			array (
				'id_interest' => 101,
				'name' => 'International Relations',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			102 =>
			array (
				'id_interest' => 102,
				'name' => 'Sexual Education',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			103 =>
			array (
				'id_interest' => 103,
				'name' => 'College Alumni',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			104 =>
			array (
				'id_interest' => 104,
				'name' => 'Homeschool Support',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			105 =>
			array (
				'id_interest' => 105,
				'name' => 'Evolution',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			106 =>
			array (
				'id_interest' => 106,
				'name' => 'Communication Skills',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			107 =>
			array (
				'id_interest' => 107,
				'name' => 'Public Speaking',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			108 =>
			array (
				'id_interest' => 108,
				'name' => 'Philosophy',
				'description' => 'Tutorials',
				'category_id' => 9,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			109 =>
			array (
				'id_interest' => 109,
				'name' => 'Photography',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			110 =>
			array (
				'id_interest' => 110,
				'name' => 'Watching Movies',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			111 =>
			array (
				'id_interest' => 111,
				'name' => 'Fashion Photography',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			112 =>
			array (
				'id_interest' => 112,
				'name' => 'Film and Video Production',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			113 =>
			array (
				'id_interest' => 113,
				'name' => 'Digital Photography',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			114 =>
			array (
				'id_interest' => 114,
				'name' => 'Film',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			115 =>
			array (
				'id_interest' => 115,
				'name' => 'Photography Classes',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			116 =>
			array (
				'id_interest' => 116,
				'name' => 'Movie Nights',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			117 =>
			array (
				'id_interest' => 117,
				'name' => 'Portrait Photography',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			118 =>
			array (
				'id_interest' => 118,
				'name' => 'Group Photo Shoots',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			119 =>
			array (
				'id_interest' => 119,
				'name' => 'Model Photography',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			120 =>
			array (
				'id_interest' => 120,
				'name' => 'Nature Photography',
				'description' => 'Tutorials',
				'category_id' => 10,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			121 =>
			array (
				'id_interest' => 121,
				'name' => 'African Americans',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			122 =>
			array (
				'id_interest' => 122,
				'name' => 'French Language',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			123 =>
			array (
				'id_interest' => 123,
				'name' => 'Language & Culture',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			124 =>
			array (
				'id_interest' => 124,
				'name' => 'Asians',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			125 =>
			array (
				'id_interest' => 125,
				'name' => 'Black Women',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			126 =>
			array (
				'id_interest' => 126,
				'name' => 'Multicultural',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			127 =>
			array (
				'id_interest' => 127,
				'name' => 'Indian Culture',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			128 =>
			array (
				'id_interest' => 128,
				'name' => 'Cultural Diversity',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			129 =>
			array (
				'id_interest' => 129,
				'name' => 'Black Identity',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			130 =>
			array (
				'id_interest' => 130,
				'name' => 'Latino Culture',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			131 =>
			array (
				'id_interest' => 131,
				'name' => 'Culture Exchange',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			132 =>
			array (
				'id_interest' => 132,
				'name' => 'English Language',
				'description' => 'Tutorials',
				'category_id' => 11,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			133 =>
			array (
				'id_interest' => 133,
				'name' => 'Book Club',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			134 =>
			array (
				'id_interest' => 134,
				'name' => 'Creative Writing',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			135 =>
			array (
				'id_interest' => 135,
				'name' => 'Reading',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			136 =>
			array (
				'id_interest' => 136,
				'name' => 'Poetry',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			137 =>
			array (
				'id_interest' => 137,
				'name' => 'Writing',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			138 =>
			array (
				'id_interest' => 138,
				'name' => 'Literature',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			139 =>
			array (
				'id_interest' => 139,
				'name' => 'Fiction',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			140 =>
			array (
				'id_interest' => 140,
				'name' => 'Readers',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			141 =>
			array (
				'id_interest' => 141,
				'name' => 'Writing Workshops',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			142 =>
			array (
				'id_interest' => 142,
				'name' => 'Novel Reading',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			143 =>
			array (
				'id_interest' => 143,
				'name' => 'Screenwriting',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			144 =>
			array (
				'id_interest' => 144,
				'name' => 'Novel Writing',
				'description' => 'Tutorials',
				'category_id' => 12,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			145 =>
			array (
				'id_interest' => 145,
				'name' => 'Live Music',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			146 =>
			array (
				'id_interest' => 146,
				'name' => 'Musicians',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			147 =>
			array (
				'id_interest' => 147,
				'name' => 'Singing',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			148 =>
			array (
				'id_interest' => 148,
				'name' => 'Shamanic Drumming',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			149 =>
			array (
				'id_interest' => 149,
				'name' => 'Christian Music',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			150 =>
			array (
				'id_interest' => 150,
				'name' => 'Concerts',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			151 =>
			array (
				'id_interest' => 151,
				'name' => 'Latin Music',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			152 =>
			array (
				'id_interest' => 152,
				'name' => 'Music',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			153 =>
			array (
				'id_interest' => 153,
				'name' => 'Songwriting',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			154 =>
			array (
				'id_interest' => 154,
				'name' => 'Group Singing',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			155 =>
			array (
				'id_interest' => 155,
				'name' => 'Drum Circle',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			156 =>
			array (
				'id_interest' => 156,
				'name' => 'Choir',
				'description' => 'Tutorials',
				'category_id' => 13,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			157 =>
			array (
				'id_interest' => 157,
				'name' => 'Programming',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			158 =>
			array (
				'id_interest' => 158,
				'name' => 'Blogging',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			159 =>
			array (
				'id_interest' => 159,
				'name' => 'Web Technology',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			160 =>
			array (
				'id_interest' => 160,
				'name' => 'Java',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			161 =>
			array (
				'id_interest' => 161,
				'name' => 'Artificial Intelligence',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			162 =>
			array (
				'id_interest' => 162,
				'name' => 'Software Development',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			163 =>
			array (
				'id_interest' => 163,
				'name' => 'Web Development',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			164 =>
			array (
				'id_interest' => 164,
				'name' => 'New Technology',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			165 =>
			array (
				'id_interest' => 165,
				'name' => 'Open Source',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			166 =>
			array (
				'id_interest' => 166,
				'name' => 'Web Design',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			167 =>
			array (
				'id_interest' => 167,
				'name' => 'Mobile Development',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
			168 =>
			array (
				'id_interest' => 168,
				'name' => 'Technology Startups',
				'description' => 'Tutorials',
				'category_id' => 14,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
		));
	}

}
