<?php

use App\Models\Category;
use App\Models\User;
use App\Models\EventType;
use App\Models\Event;
use App\Models\Perk;
use App\Models\Sponzorship;
use App\Models\InterestCategory;

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
				$code = $response->getStatusCode();
				if($code == 201){
					$this->assertEquals(201, $response->getStatusCode());
	        $this->seeInDatabase('users', ['email' => $user["email"]]);
				}
				elseif($code == 422){
					$this->assertEquals(422, $response->getStatusCode());
				}
				else{
					$this->assertEquals(422, $response->getStatusCode());
				}
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
				$code = $response->getStatusCode();
				if($code == 201){
					$this->assertEquals(201, $response->getStatusCode());
	        $this->seeInDatabase('categories', ['title' => $category["title"]]);
				}
				elseif($code == 422){
					$this->assertEquals(422, $response->getStatusCode());
				}
				else{
					$this->assertEquals(422, $response->getStatusCode());
				}
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
				$code = $response->getStatusCode();
				if($code == 201){
					$this->assertEquals(201, $response->getStatusCode());
        	$this->seeInDatabase('interests_categories', ['name' => $interest["name"]]);
				}
				elseif($code == 422){
					$this->assertEquals(422, $response->getStatusCode());
				}
				else{
					$this->assertEquals(422, $response->getStatusCode());
				}
      }
	}
	public function testPostEventType()
  {
       $faker = Faker\Factory::create();
       for ($i=0; $i < $this->maxInsertions ; $i++) {
         $eventType=[
            "name" 				=> $faker->unique()->word,
            'description' => $faker->realText($faker->numberBetween(10,20)),
            'lang' 				=> $this->availableLangs[ceil($faker->numberBetween($min = 0, $max = 2))]
          ];
    	  $response = $this->call('POST', '/event_types', $eventType, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
				$code = $response->getStatusCode();
				if($code == 201){
					$this->assertEquals(201, $response->getStatusCode());
	        $this->seeInDatabase('event_types', ['name' => $eventType["name"]]);
				}
				elseif($code == 422){
					$this->assertEquals(422, $response->getStatusCode());
				}
				else{
					$this->assertEquals(422, $response->getStatusCode());
				}
      }
	}
	public function testEvents()
  {
       $faker = Faker\Factory::create();
			 $users = User::all()->lists('id');
			 $categories = Category::all()->lists('id');
			 $eventTypes = EventType::all()->lists('id');
       for ($i=0; $i < $this->maxInsertions ; $i++) {
         $event=[
            "title" 						=> $faker->unique()->word,
						"location" 					=> $faker->word,
						"starts" 						=> $faker->date($format = 'Y-m-d', $max = 'now'),
            'ends' 							=> $faker->date($format = 'Y-m-d', $max = 'now'),
						'image' 						=> $faker->word.".png",
						'description' 			=> $faker->realText($faker->numberBetween(10,20)),
						'privacy' 					=> $faker->numberBetween(0,1),
						'lang' 							=> $this->availableLangs[ceil($faker->numberBetween($min = 0, $max = 2))],
						'organizer' 				=> $faker->randomElement($users->toArray()),
						'category' 					=> $faker->randomElement($categories->toArray()),
						'type' 							=> $faker->randomElement($eventTypes->toArray()),
            'location_reference'=> $faker->word
          ];
    	  $response = $this->call('POST', '/events', $event, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
				$code = $response->getStatusCode();
				if($code == 201){
					$this->assertEquals(201, $response->getStatusCode());
	        $this->seeInDatabase('events', ['title' => $event["title"]]);
				}
				elseif($code == 422){
					$this->assertEquals(422, $response->getStatusCode());
				}
				else{
					$this->assertEquals(422, $response->getStatusCode());
				}
      }
	}
	public function testPerks()
  {
       $faker = Faker\Factory::create();
			 $events = Event::all()->lists('id');
       for ($i=0; $i < $this->maxInsertions ; $i++) {
         $perk=[
            "kind" 						=> $faker->unique()->word,
						"usd" 						=> $faker->numberBetween($min = 100, $max = 999999),
						"id_event" 				=> $faker->randomElement($events->toArray()),
            'total_quantity' 	=> $faker->numberBetween($min = 0, $max = 9999)
          ];
    	  $response = $this->call('POST', '/perks', $perk, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
				$code = $response->getStatusCode();
				if($code == 201){
					$this->assertEquals(201, $response->getStatusCode());
	        $this->seeInDatabase('perks', ['kind' => $perk["kind"]]);
				}
				elseif($code == 422){
					$this->assertEquals(422, $response->getStatusCode());
				}
				else{
					$this->assertEquals(422, $response->getStatusCode());
				}
      }
	}
	public function testPerkTasks()
  {
       $faker = Faker\Factory::create();
			 $events = Event::all()->lists('id');
			 $users = User::all()->lists('id');
			 $perks = Perk::all()->lists('id');
       for ($i=0; $i < $this->maxInsertions ; $i++) {
         $perkTaks=[
            "title" 						=> $faker->unique()->word,
						"description" 			=> $faker->realText($faker->numberBetween(10,20)),
						"type" 				=> $faker->numberBetween($min = 0, $max = 4),
            'status' 	=> $faker->numberBetween($min = 0, $max = 4),
						'user_id' 	=> $faker->randomElement($users->toArray()),
						'perk_id' 	=> $faker->randomElement($perks->toArray()),
						'event_id' 	=> $faker->randomElement($events->toArray()),
          ];
    	  $response = $this->call('POST', '/perk_tasks', $perkTaks, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
				$code = $response->getStatusCode();
				if($code == 201){
					$this->assertEquals(201, $response->getStatusCode());
	        $this->seeInDatabase('perk_tasks', ['title' => $perkTaks["title"]]);
				}
				elseif($code == 422){
					$this->assertEquals(422, $response->getStatusCode());
				}
				else{
					$this->assertEquals(422, $response->getStatusCode());
				}
      }
	}
	public function testSponzorships()
  {
       $faker = Faker\Factory::create();
			 $events = Event::all()->lists('id');
			 $users = User::all()->lists('id');
			 $perks = Perk::all()->lists('id');
       for ($i=0; $i < $this->maxInsertions ; $i++) {
	         $sponzorship=[
	            'status' 	=> $faker->numberBetween($min = 0, $max = 4),
							'sponzor_id' 	=> $faker->randomElement($users->toArray()),
							'perk_id' 	=> $faker->randomElement($perks->toArray()),
							'event_id' 	=> $faker->randomElement($events->toArray())
	          ];
	    	  $response = $this->call('POST', '/sponzorships', $sponzorship, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
					$code = $response->getStatusCode();
					if($code == 201){
						$this->assertEquals(201, $response->getStatusCode());
		        $this->seeInDatabase('sponzorships',
						['event_id' => $sponzorship["event_id"],
						'sponzor_id' => $sponzorship["sponzor_id"],
						'perk_id' => $sponzorship["perk_id"]]);
					}
					elseif($code == 422){
						$this->assertEquals(422, $response->getStatusCode());
					}
					else{
						$this->assertEquals(422, $response->getStatusCode());
					}
      }
	}
	public function testTaskSponzor()
  {
       $faker 				= Faker\Factory::create();
			 $events 				= Event::all()->lists('id');
			 $users 				= User::all()->lists('id');
			 $perks 				= Perk::all()->lists('id');
			 $sponzorships 	= Sponzorship::all()->lists('id');
       for ($i=0; $i < $this->maxInsertions ; $i++) {
	         $taskSponzor=[
	            'task_id' 	=> $faker->numberBetween($min = 0, $max = 4),
							'sponzor_id' 	=> $faker->randomElement($users->toArray()),
							'perk_id' 	=> $faker->randomElement($perks->toArray()),
							'organizer_id' 	=> $faker->randomElement($users->toArray()),
							'event_id' 	=> $faker->randomElement($events->toArray()),
							'sponzorship_id' 	=> $faker->randomElement($sponzorships->toArray()),
	          ];
	    	  $response = $this->call('POST', '/task_sponzor', $taskSponzor, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
	    		$code = $response->getStatusCode();
					if($code == 201){
						$this->assertEquals(201, $response->getStatusCode());
		        $this->seeInDatabase('task_sponzors',
						['event_id' => $taskSponzor["event_id"],
						'sponzor_id' => $taskSponzor["sponzor_id"],
						'organizer_id' => $taskSponzor["organizer_id"],
						'perk_id' => $taskSponzor["perk_id"]]);
					}
					elseif($code == 422){
						$this->assertEquals(422, $response->getStatusCode());
					}
					else{
						$this->assertEquals(422, $response->getStatusCode());
					}

      }
	}
	public function testUserCategory()
  {
       $faker = Faker\Factory::create();
			 $categories = Category::all()->lists('id');
			 $users 				= User::all()->lists('id');
			 //var_dump($categories);
       for ($i=0; $i < $this->maxInsertions ; $i++) {
         $userCategory=[
            "user_id" 		=> $faker->randomElement($users->toArray()),
            'category_id' => $faker->randomElement($categories->toArray())
          ];
    	  $response = $this->call('POST', '/user_categories', $userCategory, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
				$code = $response->getStatusCode();
				if($code == 201){
						$this->assertEquals(201, $response->getStatusCode());
						$this->seeInDatabase('users_categories', ['user_id' => $userCategory["user_id"],'category_id' => $userCategory["category_id"]]);
				}
				elseif($code == 422){
					$this->assertEquals(422, $response->getStatusCode());
				}
				else{
					$this->assertEquals(422, $response->getStatusCode());
				}
      }
	}
	public function testUserInterests()
  {
       $faker = Faker\Factory::create();
			 $interests = InterestCategory::all()->lists('id');
			 $users 				= User::all()->lists('id');
       for ($i=0; $i < $this->maxInsertions ; $i++) {
         $userInterests=[
            "user_id" 		=> $faker->randomElement($users->toArray()),
            'interest_id' => $faker->numberBetween($min = 1, $max = count($interests))
          ];
    	  $response = $this->call('POST', '/user_interests', $userInterests, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
				$code = $response->getStatusCode();
				if($code == 201){
					$this->assertEquals(201, $response->getStatusCode());
        	$this->seeInDatabase('users_interests', ['user_id' => $userInterests["user_id"],'interest_id' => $userInterests["interest_id"]]);
				}
				elseif($code == 422){
					$this->assertEquals(422, $response->getStatusCode());
				}
				else{
					$this->assertEquals(422, $response->getStatusCode());
				}
			}
	}

}
