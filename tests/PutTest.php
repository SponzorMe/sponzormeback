<?php

use App\Models\Category;
use App\Models\User;
use App\Models\EventType;
use App\Models\Event;
use App\Models\Perk;
use App\Models\Sponzorship;
use App\Models\InterestCategory;
use App\Models\PerkTask;
use App\Models\TaskSponzor;
use App\Models\UserCategory;
use App\Models\UserInterest;

class PutTest extends TestCase {

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
	public function testPUTUsers()
  {
       $faker = Faker\Factory::create();
			 $users = User::all()->lists('id');
       for ($i=0; $i < $this->maxInsertions ; $i++) {
				 $faker->randomElement($users->toArray());
         $password=str_random(20);
         $user=[
            "name" => $faker->name,
            'email' => $faker->unique()->email,
            'password' => $password,
            'password_confirmation' => $password,
            'type' => ceil($faker->numberBetween($min = 0, $max = 2)),
            'lang' => $this->availableLangs[ceil($faker->numberBetween($min = 0, $max = 2))]
          ];
    	  $response = $this->call('PUT', '/users/'.$faker->randomElement($users->toArray()), $user, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
    		$this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('users', ['email' => $user["email"]]);
      }
	}
	public function testPUTCategories()
  {
       $faker = Faker\Factory::create();
       for ($i=0; $i < $this->maxInsertions ; $i++) {
				 $categories = Category::all()->lists('id');
         $category=[
            "title" => $faker->unique()->word,
            'body' => $faker->realText($faker->numberBetween(10,20)),
            'lang' => $this->availableLangs[ceil($faker->numberBetween($min = 0, $max = 2))]
          ];
    	  $response = $this->call('PUT', '/categories/'.$faker->randomElement($categories->toArray()), $category, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
    		$this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('categories', ['title' => $category["title"]]);
      }
	}
	public function testPUTInterests()
  {
       $faker = Faker\Factory::create();
			 $categories = Category::all()->lists('id');
			 //var_dump($categories);
       for ($i=0; $i < $this->maxInsertions ; $i++) {
				 $interests = InterestCategory::all()->lists('id_interest');
         $interest=[
            "name" 				=> $faker->unique()->word,
            'description' => $faker->realText($faker->numberBetween(10,20)),
            'lang' 				=> $this->availableLangs[ceil($faker->numberBetween($min = 0, $max = 2))],
						'category_id' => $faker->randomElement($categories->toArray())
          ];
    	  $response = $this->call('PUT', '/interests_category/'.$faker->randomElement($interests->toArray()), $interest, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
    		$this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('interests_categories', ['name' => $interest["name"]]);
      }
	}
	public function testPUTEventType()
  {
       $faker = Faker\Factory::create();
       for ($i=0; $i < $this->maxInsertions ; $i++) {
				 $eventTypes = EventType::all()->lists('id');
         $eventType=[
            "name" 				=> $faker->unique()->word,
            'description' => $faker->realText($faker->numberBetween(10,20)),
            'lang' 				=> $this->availableLangs[ceil($faker->numberBetween($min = 0, $max = 2))]
          ];
    	  $response = $this->call('PUT', '/event_types/'.$faker->randomElement($eventTypes->toArray()), $eventType, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
    		$this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('event_types', ['name' => $eventType["name"]]);
      }
	}
	public function testPUTEvents()
  {
       $faker = Faker\Factory::create();
			 $users = User::all()->lists('id');
			 $categories = Category::all()->lists('id');
			 $eventTypes = EventType::all()->lists('id');
       for ($i=0; $i < $this->maxInsertions ; $i++) {
				 $events = Event::all()->lists('id');
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
    	  $response = $this->call('PUT', '/events/'.$faker->randomElement($events->toArray()), $event, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
    		$this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('events', ['title' => $event["title"]]);
      }
	}
	public function testPUTPerks()
  {
       $faker = Faker\Factory::create();
			 $events = Event::all()->lists('id');
       for ($i=0; $i < $this->maxInsertions ; $i++) {
				 $perks = Perk::all()->lists('id');
         $perk=[
            "kind" 						=> $faker->unique()->word,
						"usd" 						=> $faker->numberBetween($min = 100, $max = 999999),
						"id_event" 				=> $faker->randomElement($events->toArray()),
            'total_quantity' 	=> $faker->numberBetween($min = 0, $max = 9999)
          ];
    	  $response = $this->call('PUT', '/perks/'.$faker->randomElement($perks->toArray()), $perk, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
    		$this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('perks', ['kind' => $perk["kind"]]);
      }
	}
	public function testPUTPerkTasks()
  {
       $faker = Faker\Factory::create();
			 $events = Event::all()->lists('id');
			 $users = User::all()->lists('id');
			 $perks = Perk::all()->lists('id');
       for ($i=0; $i < $this->maxInsertions ; $i++) {
				 $perkTasks = PerkTask::all()->lists('id');
         $perkTaks=[
            "title" 						=> $faker->unique()->word,
						"description" 			=> $faker->realText($faker->numberBetween(10,20)),
						"type" 				=> $faker->numberBetween($min = 0, $max = 4),
            'status' 	=> $faker->numberBetween($min = 0, $max = 4),
						'user_id' 	=> $faker->randomElement($users->toArray()),
						'perk_id' 	=> $faker->randomElement($perks->toArray()),
						'event_id' 	=> $faker->randomElement($events->toArray()),
          ];
    	  $response = $this->call('PUT', '/perk_tasks/'.$faker->randomElement($perkTasks->toArray()), $perkTaks, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
    		$this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('perk_tasks', ['title' => $perkTaks["title"]]);
      }
	}
	public function testPUTSponzorships()
  {
       $faker = Faker\Factory::create();
			 $events = Event::all()->lists('id');
			 $users = User::all()->lists('id');
			 $perks = Perk::all()->lists('id');
       for ($i=0; $i < $this->maxInsertions ; $i++) {
				  $sponzorships 	= Sponzorship::all()->lists('id');
	         $sponzorship=[
	            'status' 	=> $faker->numberBetween($min = 0, $max = 4),
							'sponzor_id' 	=> $faker->randomElement($users->toArray()),
							'perk_id' 	=> $faker->randomElement($perks->toArray()),
							'event_id' 	=> $faker->randomElement($events->toArray())
	          ];
	    	  $response = $this->call('PUT', '/sponzorships/'.$faker->randomElement($sponzorships->toArray()), $sponzorship, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
	    		$this->assertEquals(200, $response->getStatusCode());
	        $this->seeInDatabase('sponzorships',
					['event_id' => $sponzorship["event_id"],
					'sponzor_id' => $sponzorship["sponzor_id"],
					'perk_id' => $sponzorship["perk_id"]]);
      }
	}
	public function testPUTTaskSponzor()
  {
       $faker 				= Faker\Factory::create();
			 $events 				= Event::all()->lists('id');
			 $users 				= User::all()->lists('id');
			 $perks 				= Perk::all()->lists('id');
			 $sponzorships 	= Sponzorship::all()->lists('id');
       for ($i=0; $i < $this->maxInsertions ; $i++) {
				   $taskSponzors 	= TaskSponzor::all()->lists('id');
	         $taskSponzor=[
	            'task_id' 	=> $faker->numberBetween($min = 0, $max = 4),
							'sponzor_id' 	=> $faker->randomElement($users->toArray()),
							'perk_id' 	=> $faker->randomElement($perks->toArray()),
							'organizer_id' 	=> $faker->randomElement($users->toArray()),
							'event_id' 	=> $faker->randomElement($events->toArray()),
							'sponzorship_id' 	=> $faker->randomElement($sponzorships->toArray()),
	          ];
	    	  $response = $this->call('PUT', '/task_sponzor/'.$faker->randomElement($taskSponzors->toArray()), $taskSponzor, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
	    		$this->assertEquals(200, $response->getStatusCode());
	        $this->seeInDatabase('task_sponzors',
					['event_id' => $taskSponzor["event_id"],
					'sponzor_id' => $taskSponzor["sponzor_id"],
					'organizer_id' => $taskSponzor["organizer_id"],
					'perk_id' => $taskSponzor["perk_id"]]);
      }
	}
	public function testPUTUserCategory()
  {
       $faker = Faker\Factory::create();
			 $categories = Category::all()->lists('id');
			 $users 				= User::all()->lists('id');
			 //var_dump($categories);
       for ($i=0; $i < $this->maxInsertions ; $i++) {
				 $usersCategory = UserCategory::all()->lists('id');
         $userCategory=[
            "user_id" 		=> $faker->randomElement($users->toArray()),
            'category_id' => $faker->randomElement($categories->toArray())
          ];
    	  $response = $this->call('PUT', '/user_categories/'.$faker->randomElement($usersCategory->toArray()), $userCategory, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
    		$this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('users_categories', ['user_id' => $userCategory["user_id"],'category_id' => $userCategory["category_id"]]);
      }
	}
	public function tesPUTtUserInterests()
  {
       $faker = Faker\Factory::create();
			 $interests = InterestCategory::all()->lists('id_interest');
			 $users 				= User::all()->lists('id');
       for ($i=0; $i < $this->maxInsertions ; $i++) {
				 $usersInterest = UserInterest::all()->lists('id');
         $userInterests=[
            "user_id" 		=> $faker->randomElement($users->toArray()),
            'interest_id' => $faker->randomElement($interests->toArray())
          ];
    	  $response = $this->call('PUT', '/user_interests/'.$faker->randomElement($usersInterest->toArray()), $userInterests, array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
    		$this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('users_interests', ['user_id' => $userInterests["user_id"],'interest_id' => $userInterests["interest_id"]]);
      }
	}

}
