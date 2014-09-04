<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


// Session Routes
Route::get('login',  array('as' => 'login', 'uses' => 'SessionController@create'));
Route::get('logout', array('as' => 'logout', 'uses' => 'SessionController@destroy'));
Route::resource('sessions', 'SessionController', array('only' => array('create', 'store', 'destroy')));

// User Routes
Route::get('register', 'UserController@create');
Route::get('users/{id}/activate/{code}', 'UserController@activate')->where('id', '[0-9]+');
Route::get('resend', array('as' => 'resendActivationForm', function()
{
	return View::make('users.resend');
}));
Route::post('resend', 'UserController@resend');
Route::get('forgot', array('as' => 'forgotPasswordForm', function()
{
	return View::make('users.forgot');
}));
Route::post('forgot', 'UserController@forgot');
Route::post('users/{id}/change', 'UserController@change');
Route::get('users/{id}/reset/{code}', 'UserController@reset')->where('id', '[0-9]+');
Route::get('users/{id}/suspend', array('as' => 'suspendUserForm', function($id)
{
	return View::make('users.suspend')->with('id', $id);
}));
Route::post('users/{id}/suspend', 'UserController@suspend')->where('id', '[0-9]+');
Route::get('users/{id}/unsuspend', 'UserController@unsuspend')->where('id', '[0-9]+');
Route::get('users/{id}/ban', 'UserController@ban')->where('id', '[0-9]+');
Route::get('users/{id}/unban', 'UserController@unban')->where('id', '[0-9]+');
Route::resource('users', 'UserController');
Route::resource('sponsors', 'SponsorController');

// Group Routes
Route::resource('groups', 'GroupController');

Route::get('/', array('as' => 'home', function()
{
	return View::make('home');
}));

//Customization Routes.
Route::resource('categories', 'CategoriesController');
Route::get('customization', array('as' => 'customization',function()
{ return View::make('customization/customization');}));
Route::get('user/customization', function()
{ return View::make('customization/customization');});
Route::group(array('prefix' => 'api'), function() {
	Route::get('categories', 'CustomizationController@getCategories');
	Route::get('interests', 'CustomizationController@getInterests');
	Route::get('interests/categories/{id}', 'CustomizationController@getInterestsByCategories');
	Route::post('update/{id}', 'CustomizationController@update');
	Route::post('save/interests/{id}', 'CustomizationController@saveInterests');
});
Route::group(array('prefix' => 'api/v1'), function() {

	Route::post('authentication', 'ApiController@authentication'); //Login Explicit

	Route::get('check/{key}', 'ApiController@check_authentication'); //Check login Status
	
	Route::post('user/{key}', 'ApiController@getUserData'); //Get a User

	Route::get('users/{key}', 'ApiController@getAllUsers'); //Get all Users

	Route::post('remove/user/{key}', 'ApiController@removeUser'); //Remove one User

	Route::post('edit/user/{key}', 'ApiController@editUser'); //Remove one User

	Route::post('create/user', 'ApiController@createUser'); //Remove one User

	Route::resource('/', 'ApiController');
});
Route::get('testimonials', 'HomeController@testimonials'); //testimonials
Route::get('language/{lang}', 'HomeController@setLanguage'); //testimonials
App::missing(function($exception)
{
	return View::make('index');
});