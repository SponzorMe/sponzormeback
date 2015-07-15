<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase {

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
	protected $loginToken = 'b3JnYW5pemVyQHNwb256b3IubWU6c3Bvbnpvcm1l';

  /**
	 * For testing the protected url
	 * @param string
	 */
	protected $maxInsertions = 30;

	/**
	 * Test insert some users
	 *
	 * @return void
	 */
	public function testPostUsers()
  {
       $faker = Faker\Factory::create();
       $availableLangs = ["en","es","pt"];
       for ($i=0; $i < $this->maxInsertions ; $i++) {
         $password=str_random(20);
         $user=[
            "name" => $faker->name,
            'email' => $faker->unique()->email,
            'password' => $password,
            'password_confirmation' => $password,
            'type' => ceil($faker->numberBetween($min = 0, $max = 2)),
            'lang' => $availableLangs[ceil($faker->numberBetween($min = 0, $max = 2))]
          ];
    	  $response = $this->call('POST', '/users', $user, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
    		$this->assertEquals(201, $response->getStatusCode());
        $this->seeInDatabase('users', ['email' => $user["email"]]);
      }
	}

}
