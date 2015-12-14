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
Route::get('perk_tasks_sponzorship/{sponzorshipId}','TaskSponzorController@showBySponzorship');
Route::get('sponzorships_organizer/{organizerId}','SponzorshipController@showByOrganizer');
Route::get('perk_tasks_organizer/{organizerId}','PerkTaskController@byOrganizer');
Route::get('sponzorships_sponzor/{sponzorId}','SponzorshipController@showBySponzor');
Route::post('auth','Auth\AuthController@authenticate');
Route::post('send_activation','UserController@sendActivationLink');
Route::get('accept/eventbrite','UserController@acceptEventbrite');
Route::get('accept/meetup','UserController@acceptMeetup');
Route::get('token/eventbrite/{code}','UserController@getEventbriteToken');
Route::get('verify_activation/{activationCode}','UserController@verifyActivationLink');
Route::post('send_reset_password','Auth\PasswordController@sendResetPasswordToken');
Route::post('update_password/{token}','Auth\PasswordController@updatePassword');
Route::post('change_password','Auth\PasswordController@changePassword');
Route::post('invite_friend','UserController@inviteFriend');
Route::post('sponzorship_email','SponzorshipController@sendSponzorshipEmail');
Route::post('sponzorship_email_organizer','SponzorshipController@sendSponzorshipEmailOrganizer');
Route::post('ipn','SponzorshipController@paypalIpn');
Route::pattern('route_not_found','.*');
Route::any('/{route_not_found}', function(){
	return response()->json(
		["message"=>"Route not available",
		], 404
	);
});
