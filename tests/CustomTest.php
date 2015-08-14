<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomTest extends TestCase {

	  //To rollback until the tests are finished.
	  //use DatabaseMigrations;

		/**
		 * Parameter added from Laravel 5.1
		 * @param string
		 */
		protected $baseUrl = '';

		/**
		 * For testing the protected url
		 * @param string
		 */

		/**
		 * Test insert some users
		 *
		 * @return void
		 */
		public function testLoginFails()
	  {
				$faker = Faker\Factory::create();
				$password=str_random(20);
				$request=[
					 "email" => $faker->email,
					 'password' => $password
				 ];
				 $response = $this->call('POST', '/auth', $request, array(), array(),array());
				 $code = $response->getStatusCode();
				 $this->assertEquals(404, $response->getStatusCode());//Ever should fails
		}
		public function testLoginOk()
	  {
				$faker = Faker\Factory::create();
				$password=str_random(20);
				$request=[
					 "email" => "admin@sponzor.me",
					 'password' => "sponzorme"
				 ];
				 $response = $this->call('POST', '/auth', $request, array(), array(),array());
				 $code = $response->getStatusCode();
				 $this->assertEquals(200, $response->getStatusCode());//Ever should works
    }

}
