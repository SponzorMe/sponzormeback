<?php
/*
	|--------------------------------------------------------------------------
	| Application contants
	|--------------------------------------------------------------------------
	|
	| this constants are used for some features in the app
	| i.e the activation URL could not depends of the API, this coul be replace 
	| by any frontend framework
	|
	*/
return array(
	//Used in UserController
	'activation_url' => "http://api.sponzor.me/verify_activation/", //Activation account URL
	//Used in password controller
	'reset_password_url' => "http://api.sponzor.me/reset_password_token/" //Reset password URL
);