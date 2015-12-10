<?php
/*
	|--------------------------------------------------------------------------
	| Application constants
	|--------------------------------------------------------------------------
	|
	| this constants are used for some features in the app
	| i.e the activation URL could not depends of the API, this coul be replace
	| by any frontend framework
	|
	*/
return array(
	//Used in UserController
	'activation_url' => "http://app.sponzor.me/#/activation/", //Activation account URL
	//Used in password controller
	//'reset_password_url' => "http://localhost:9000/#/reset/", //Reset password URL
	'reset_password_url' => "http://app.sponzor.me/#/reset/" //Reset password URL
	'redirect_evenbrite_front' => "http://localhost:9000/#/eventbrite/" //Reset password URL
);
