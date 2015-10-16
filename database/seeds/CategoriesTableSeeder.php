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
<<<<<<< HEAD
<<<<<<< HEAD
        
		\DB::table('categories')->insert(array (
			0 => 
=======

		\DB::table('categories')->insert(array (
			0 =>
>>>>>>> local
=======

		\DB::table('categories')->insert(array (
			0 =>
>>>>>>> staging
			array (
				'id' => 1,
				'title' => 'Outdoor',
				'body' => 'All About the Bussines!',
				'created_at' => '2014-08-20 10:11:45',
				'updated_at' => '2014-08-20 10:11:45',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			1 => 
=======
			1 =>
>>>>>>> local
=======
			1 =>
>>>>>>> staging
			array (
				'id' => 2,
				'title' => 'Art & Culture',
				'body' => 'All About the Bussines!',
				'created_at' => '2014-08-20 10:11:45',
				'updated_at' => '2014-08-20 10:11:45',
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
				'id' => 3,
				'title' => 'Dancing',
				'body' => 'All About the Bussines!',
				'created_at' => '2014-08-20 10:11:45',
				'updated_at' => '2014-08-20 10:11:45',
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
				'id' => 4,
				'title' => 'Wellness',
				'body' => 'All About the Bussines!',
				'created_at' => '2014-08-20 10:11:45',
				'updated_at' => '2014-08-20 10:11:45',
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
				'id' => 5,
				'title' => 'Career & Business',
				'body' => 'All About the Bussines!',
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
				'id' => 6,
				'title' => 'Eat & Foods',
				'body' => 'All About the Bussines!',
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
				'id' => 7,
				'title' => 'Belief',
				'body' => 'All About the Bussines!',
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
				'id' => 8,
				'title' => 'Sports & Fitness',
				'body' => 'All About the Bussines!',
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
				'id' => 9,
				'title' => 'Education',
				'body' => 'All About the Bussines!',
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
				'id' => 10,
				'title' => 'Photography',
				'body' => 'All About the Bussines!',
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
				'id' => 11,
				'title' => 'Languages',
				'body' => 'All About the Bussines!',
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
				'id' => 12,
				'title' => 'Books',
				'body' => 'All About the Bussines!',
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
				'id' => 13,
				'title' => 'Music',
				'body' => 'All About the Bussines!',
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
				'id' => 14,
				'title' => 'Technology',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'en',
			),
<<<<<<< HEAD
<<<<<<< HEAD
			14 => 
			array (
				'id' => 15,
				'title' => 'Exteriores',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			15 => 
			array (
				'id' => 16,
				'title' => 'Arte y Cultura',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			16 => 
			array (
				'id' => 17,
				'title' => 'Baile',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			17 => 
			array (
				'id' => 18,
				'title' => 'Bienestar',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			18 => 
			array (
				'id' => 19,
				'title' => 'Carreras y Negocios',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			19 => 
			array (
				'id' => 20,
				'title' => 'Comida y Bebidas',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			20 => 
			array (
				'id' => 21,
				'title' => 'Creencias',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			21 => 
			array (
				'id' => 22,
				'title' => 'Deportes y Fisico',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			22 => 
			array (
				'id' => 23,
				'title' => 'Educacion',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			23 => 
			array (
				'id' => 24,
				'title' => 'Fotografia',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			24 => 
			array (
				'id' => 25,
				'title' => 'Lenguajes',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			25 => 
			array (
				'id' => 26,
				'title' => 'Libros',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			26 => 
			array (
				'id' => 27,
				'title' => 'Musica',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			27 => 
			array (
				'id' => 28,
				'title' => 'Tecnologia',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'es',
			),
			28 => 
			array (
				'id' => 29,
				'title' => ' Outdoor',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			29 => 
			array (
				'id' => 30,
				'title' => ' Arte e Cultura',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			30 => 
			array (
				'id' => 31,
				'title' => ' Dança',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			31 => 
			array (
				'id' => 32,
				'title' => ' Bem estar',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			32 => 
			array (
				'id' => 33,
				'title' => ' Carreira e Negócios',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			33 => 
			array (
				'id' => 34,
				'title' => ' Comer e alimentos',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			34 => 
			array (
				'id' => 35,
				'title' => ' Crenças',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			35 => 
			array (
				'id' => 36,
				'title' => ' Esportes e Fitness',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			36 => 
			array (
				'id' => 37,
				'title' => ' Educação',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			37 => 
			array (
				'id' => 38,
				'title' => ' Fotografia',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			38 => 
			array (
				'id' => 39,
				'title' => ' Línguas',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			39 => 
			array (
				'id' => 40,
				'title' => ' Livros',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			40 => 
			array (
				'id' => 41,
				'title' => ' Músicas',
				'body' => 'All About the Bussines!',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
				'lang' => 'pt',
			),
			41 => 
			array (
				'id' => 42,
				'title' => ' Tecnologia',
				'body' => 'All About the Bussines!',
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
