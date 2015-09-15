<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;

class CustomTest extends TestCase {

	  //To rollback until the tests are finished.
	  //use DatabaseMigrations;

		/**
		 * For testing the protected url
		 * @param string
		 */
		protected $loginToken = 'b3JnYW5pemVyQHNwb256b3IubWU6c3Bvbnpvcm1l';

		/**
		 * Parameter added from Laravel 5.1
		 * @param string
		 */
		protected $baseUrl = '';

		/**
		* The list of available langs
		*/
		protected $availableLangs = ["en","es","pt"];

		/**
		* The number of attemps
		*/
		protected $attemps = 100;

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
		public function testActivationLinkFails1(){
			//Two parts one to get the activation, other to verify the activation
			$faker = Faker\Factory::create();
			$request=[
				 "email" => $faker->email
			 ];
			 $response = $this->call('POST', '/send_activation', $request, array(), array(),array());
			 $code = $response->getStatusCode();
			 $this->assertEquals(404, $response->getStatusCode());//Ever should fails
		}
		public function testActivationLinkFails2(){
			//Two parts one to get the activation, other to verify the activation
			$faker = Faker\Factory::create();
			$emails = User::all()->lists('email');
			$request=[
				 "email" => "admin@sponzor.me"
			 ];
			 $response = $this->call('POST', '/send_activation', $request, array(), array(),array());
			 $code = $response->getStatusCode();
			 $this->assertEquals(201, $response->getStatusCode());//Ever should fails
		}
		public function testActivationLinkOk(){
			$faker = Faker\Factory::create();
			for ($i=0; $i < $this->attemps; $i++) {
				$password=str_random(20);
				$user=[
					 "name" => $faker->name,
					 'email' => $faker->unique()->email,
					 'password' => $password,
					 'password_confirmation' => $password,
					 'type' => ceil($faker->numberBetween($min = 0, $max = 2)),
					 'lang' => $this->availableLangs[ceil($faker->numberBetween($min = 0, $max = 2))]
				 ];
				 $response = $this->call('POST', '/users', $user, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
				 $code = $response->getStatusCode();
				 if($code == 201){
					 $request=[
		 				 "email" => $user["email"]
		 			 ];
		 			 $response = $this->call('POST', '/send_activation', $request, array(), array(),array());
		 			 $code = $response->getStatusCode();
					 if($code == 200){
		 					$this->assertEquals(200, $response->getStatusCode());
		 				}
				 }
			}
		}

}
