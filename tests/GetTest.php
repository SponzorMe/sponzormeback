<?php

class GetTest extends TestCase {

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
	 * Test get all users
	 *
	 * @return void
	 */
	public function testGetUsers()
  {
	   $response = $this->call('GET', '/users', array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
		 $this->assertEquals(200, $response->getStatusCode());
	}
	/**
	 * Test get all events
	 *
	 * @return void
	 */
	public function testGetEvents()
  {
	   $response = $this->call('GET', '/events', array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
		 $this->assertEquals(200, $response->getStatusCode());
	}
	/**
	 * Test get all categories
	 *
	 * @return void
	 */
	public function testGetCategories()
  {
	   $response = $this->call('GET', '/categories', array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
		 $this->assertEquals(200, $response->getStatusCode());
	}
	/**
	 * Test get all event_types
	 *
	 * @return void
	 */
	public function testGetEventTypes()
  {
	   $response = $this->call('GET', '/event_types', array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
		 $this->assertEquals(200, $response->getStatusCode());
	}
	/**
	 * Test get all interests_category
	 *
	 * @return void
	 */
	public function testGetEventInterestsCategories()
  {
	   $response = $this->call('GET', '/interests_category', array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
		 $this->assertEquals(200, $response->getStatusCode());
	}
	/**
	 * Test get all perks
	 *
	 * @return void
	 */
	public function testGetEventPerks()
  {
	   $response = $this->call('GET', '/perks', array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
		 $this->assertEquals(200, $response->getStatusCode());
	}
	/**
	 * Test get all perk_tasks
	 *
	 * @return void
	 */
	public function testGetEventPerkTasks()
  {
	   $response = $this->call('GET', '/perk_tasks', array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
		 $this->assertEquals(200, $response->getStatusCode());
	}
	/**
	 * Test get all perk_tasks
	 *
	 * @return void
	 */
	public function testGetEventSponzoships()
  {
	   $response = $this->call('GET', '/sponzorships', array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
		 $this->assertEquals(200, $response->getStatusCode());
	}
	/**
	 * Test get all task_sponzor
	 *
	 * @return void
	 */
	public function testGetEventTasksSponzors()
  {
	   $response = $this->call('GET', '/task_sponzor', array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
		 $this->assertEquals(200, $response->getStatusCode());
	}
	/**
	 * Test get all user_interests
	 *
	 * @return void
	 */
	public function testGetEventTasksUserInterests()
  {
	   $response = $this->call('GET', '/user_interests', array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
		 $this->assertEquals(200, $response->getStatusCode());
	}
	/**
	 * Test get all user_categories
	 *
	 * @return void
	 */
	public function testGetEventTasksUserCategories()
  {
	   $response = $this->call('GET', '/user_categories', array(), array(), array(),array("HTTP_AUTHORIZATION"=>"Basic $this->loginToken"));
		 $this->assertEquals(200, $response->getStatusCode());
	}

}
