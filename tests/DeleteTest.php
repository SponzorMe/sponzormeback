<?php

use App\Models\Category;
use App\Models\UserCategory;
use App\Models\UserInterest;
use App\Models\User;
use App\Models\EventType;
use App\Models\Event;
use App\Models\Perk;
use App\Models\PerkTask;
use App\Models\TaskSponzor;
use App\Models\Sponzorship;
use App\Models\InterestCategory;

class DeleteTest extends TestCase {

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
	protected $maxDeletions = 1;

	/**
	* The list of available langs
	*/
	protected $availableLangs = ["en","es","pt"];

	/**
	 * Test insert some users
	 *
	 * @return void
	 */
	public function testDeleteUsers()
  {
       $faker = Faker\Factory::create();
       for ($i=0; $i < $this->maxDeletions ; $i++) {
				$users = User::all()->lists('id');
    	  $response = $this->call('DELETE', '/users/'.$faker->randomElement($users->toArray()), array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
    		$code = $response->getStatusCode();
				if($code==200 || $code==409 || $code==404){
					$this->assertNotFalse(TRUE);
				}
				else{
					$this->assertFalse(TRUE);
				}
      }
	}
	public function testDeleteCategories()
  {
       $faker = Faker\Factory::create();
       for ($i=0; $i < $this->maxDeletions ; $i++) {
				$categories = Category::all()->lists('id');
				$response = $this->call('DELETE', '/categories/'.$faker->randomElement($categories->toArray()), array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
				$code = $response->getStatusCode();
				if($code==200 || $code==409 || $code==404){
					$this->assertNotFalse(TRUE);
				}
				else{
					$this->assertFalse(TRUE);
				}
      }
	}
	public function testDeleteInterests()
  {
       $faker = Faker\Factory::create();
       for ($i=0; $i < $this->maxDeletions ; $i++) {
				$interestCategory = InterestCategory::all()->lists('id');
    	  $response = $this->call('POST', '/interests_category/'.$faker->randomElement($interestCategory->toArray()), array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
				$code = $response->getStatusCode();
				if($code==200 || $code==409 || $code==404){
					$this->assertNotFalse(TRUE);
				}
				else{
					$this->assertFalse(TRUE);
				}
      }
	}

	public function testDeleteEventType()
  {
			$faker = Faker\Factory::create();
			for ($i=0; $i < $this->maxDeletions ; $i++) {
			 $eventTypes = EventType::all()->lists('id');
			 $response = $this->call('DELETE', '/event_types/'.$faker->randomElement($eventTypes->toArray()), array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
			 $code = $response->getStatusCode();
			 if($code==200 || $code==409 || $code==404){
				 $this->assertNotFalse(TRUE);
			 }
			 else{
				 $this->assertFalse(TRUE);
			 }
		 }
	}
	public function testDeleteEvents()
  {
			$faker = Faker\Factory::create();
			for ($i=0; $i < $this->maxDeletions ; $i++) {
				$events = Event::all()->lists('id');
				$response = $this->call('DELETE', '/events/'.$faker->randomElement($events->toArray()), array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
				$code = $response->getStatusCode();
				if($code==200 || $code==409 || $code==404){
					$this->assertNotFalse(TRUE);
				}
				else{
					$this->assertFalse(TRUE);
				}
			}
	}
	public function testDeletePerks()
  {
			$faker = Faker\Factory::create();
		 for ($i=0; $i < $this->maxDeletions ; $i++) {
			 $perks = Perk::all()->lists('id');
			 $response = $this->call('DELETE', '/perks/'.$faker->randomElement($perks->toArray()), array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
			 $code = $response->getStatusCode();
			 if($code==200 || $code==409 || $code==404){
				 $this->assertNotFalse(TRUE);
			 }
			 else{
				 $this->assertFalse(TRUE);
			 }
	 	}
	}
	public function testDeletePerkTasks()
  {
			$faker = Faker\Factory::create();
			for ($i=0; $i < $this->maxDeletions ; $i++) {
				$perkTasks = PerkTask::all()->lists('id');
				$response = $this->call('DELETE', '/perk_tasks/'.$faker->randomElement($perkTasks->toArray()), array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
				$code = $response->getStatusCode();
				if($code==200 || $code==409 || $code==404){
					$this->assertNotFalse(TRUE);
				}
				else{
					$this->assertFalse(TRUE);
				}
		 	}
	}
	public function testDeleteSponzorships()
  {
			$faker = Faker\Factory::create();
		 for ($i=0; $i < $this->maxDeletions ; $i++) {
			 $sponzorships = Sponzorship::all()->lists('id');
			 $response = $this->call('DELETE', '/sponzorships/'.$faker->randomElement($sponzorships->toArray()), array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
			 $code = $response->getStatusCode();
			 if($code==200 || $code==409 || $code==404){
				 $this->assertNotFalse(TRUE);
			 }
			 else{
				 $this->assertFalse(TRUE);
			 }
	 }
	}
	public function testDeleteTaskSponzor()
  {
			$faker = Faker\Factory::create();
			for ($i=0; $i < $this->maxDeletions ; $i++) {
			$tasksSponzor = TaskSponzor::all()->lists('id');
			$response = $this->call('DELETE', '/task_sponzor/'.$faker->randomElement($tasksSponzor->toArray()), array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
			$code = $response->getStatusCode();
			if($code==200 || $code==409 || $code==404){
				$this->assertNotFalse(TRUE);
			}
			else{
				$this->assertFalse(TRUE);
			}
			}
	}
	public function testDeleteUserCategory()
  {
		 $faker = Faker\Factory::create();
		 for ($i=0; $i < $this->maxDeletions ; $i++) {
			 $userCategories = UserCategory::all()->lists('id');
			 $response = $this->call('DELETE', '/users_categories/'.$faker->randomElement($userCategories->toArray()), array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
			 $code = $response->getStatusCode();
 			if($code==200 || $code==409 || $code==404){
 				$this->assertNotFalse(TRUE);
 			}
 			else{
 				$this->assertFalse(TRUE);
 			}
		 }
	}
	public function testUserInterests()
  {
			$faker = Faker\Factory::create();
			for ($i=0; $i < $this->maxDeletions ; $i++) {
				$userInterests = UserInterest::all()->lists('id');
				$response = $this->call('DELETE', '/users_interests/'.$faker->randomElement($userInterests->toArray()), array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
				$code = $response->getStatusCode();
				if($code==200 || $code==409 || $code==404){
					$this->assertNotFalse(TRUE);
				}
				else{
					$this->assertFalse(TRUE);
				}
			}
	}
}
