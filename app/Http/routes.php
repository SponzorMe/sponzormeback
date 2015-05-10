<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'WelcomeController@index');

Route::resource('users','UserController');
Route::resource('events','EventController');
Route::resource('categories','CategoryController');
Route::resource('event_types','EventTypeController');
Route::resource('interests_category','InterestCategoryController');
Route::resource('perks','PerkController');