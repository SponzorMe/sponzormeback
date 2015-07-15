<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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
	 * Test insert some users
	 *
	 * @return void
	 */
	public function testPostUsers()
  {

	}

}
