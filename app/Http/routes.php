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

Route::resource('users','UserController',['except'=>['edit','create']]);
Route::resource('events','EventController',['except'=>['edit','create']]);
Route::resource('categories','CategoryController',['except'=>['edit','create']]);
Route::resource('event_types','EventTypeController',['except'=>['edit','create']]);
Route::resource('interests_category','InterestCategoryController',['except'=>['edit','create']]);
Route::resource('perks','PerkController',['except'=>['edit','create']]);
Route::resource('perk_tasks','PerkTaskController',['except'=>['edit','create']]);
Route::resource('sponzorships','SponzorshipController',['except'=>['edit','create']]);
Route::resource('task_sponzor','TaskSponzorController',['except'=>['edit','create']]);
Route::resource('user_interests','UserInterestController',['except'=>['edit','create']]);
Route::resource('user_categories','UserCategoryController',['except'=>['edit','create']]);
<<<<<<< HEAD
Route::get('perk_tasks_sponzorship/{sponzorshipId}','TaskSponzorController@showBySponzorship');
Route::get('sponzorships_organizer/{organizerId}','SponzorshipController@showByOrganizer');
Route::get('sponzorships_sponzor/{sponzorId}','SponzorshipController@showBySponzor');
Route::post('auth','Auth\AuthController@authenticate');
Route::post('send_activation','UserController@sendActivationLink');
Route::get('verify_activation/{activationCode}','UserController@verifyActivationLink');
Route::post('send_reset_password','Auth\PasswordController@sendResetPasswordToken');
Route::post('update_password/{token}','Auth\PasswordController@updatePassword');
Route::post('invite_friend','UserController@inviteFriend');
=======
Route::post('auth','Auth\AuthController@authenticate');
>>>>>>> 886196f6324c74af87a64306a83398414c37e1b1
Route::pattern('route_not_found','.*');
Route::any('/{route_not_found}', function(){
	return response()->json(
		["message"=>"Route not available",
		], 404
	);
});
