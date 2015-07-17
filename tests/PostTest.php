<?php

use App\Models\Category;

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
	protected $maxInsertions = 1;

	/**
	* The list of available langs
	*/
	protected $availableLangs = ["en","es","pt"];

	/**
	 * Test insert some users
	 *
	 * @return void
	 */
	public function testPostUsers()
  {
       $faker = Faker\Factory::create();

       for ($i=0; $i < $this->maxInsertions ; $i++) {
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
    		$this->assertEquals(201, $response->getStatusCode());
        $this->seeInDatabase('users', ['email' => $user["email"]]);
      }
	}
	public function testPostCategories()
  {
       $faker = Faker\Factory::create();
       for ($i=0; $i < $this->maxInsertions ; $i++) {
         $category=[
            "title" => $faker->unique()->word,
            'body' => $faker->realText($faker->numberBetween(10,20)),
            'lang' => $this->availableLangs[ceil($faker->numberBetween($min = 0, $max = 2))]
          ];
    	  $response = $this->call('POST', '/categories', $category, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
    		$this->assertEquals(201, $response->getStatusCode());
        $this->seeInDatabase('categories', ['title' => $category["title"]]);
      }
	}
	public function testPostInterests()
  {
       $faker = Faker\Factory::create();
			 $categories = Category::all()->lists('id');
			 //var_dump($categories);
       for ($i=0; $i < $this->maxInsertions ; $i++) {
         $interest=[
            "name" 				=> $faker->unique()->word,
            'description' => $faker->realText($faker->numberBetween(10,20)),
            'lang' 				=> $this->availableLangs[ceil($faker->numberBetween($min = 0, $max = 2))],
						'category_id' => $faker->randomElement($categories->toArray())
          ];
    	  $response = $this->call('POST', '/interests_category', $interest, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
    		$this->assertEquals(201, $response->getStatusCode());
        $this->seeInDatabase('interests_categories', ['name' => $interest["name"]]);
      }
	}
	public function testPostEventType()
  {
       $faker = Faker\Factory::create();
			 //var_dump($categories);
       for ($i=0; $i < $this->maxInsertions ; $i++) {
         $eventType=[
            "name" 				=> $faker->unique()->word,
            'description' => $faker->realText($faker->numberBetween(10,20)),
            'lang' 				=> $this->availableLangs[ceil($faker->numberBetween($min = 0, $max = 2))]
          ];
    	  $response = $this->call('POST', '/event_types', $eventType, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
    		$this->assertEquals(201, $response->getStatusCode());
        $this->seeInDatabase('event_types', ['name' => $eventType["name"]]);
      }
	}

}
