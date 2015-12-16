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
	'activation_url' => "http://app.sponzor.me/#/activation/", //Activation account URL
	'reset_password_url' => "http://app.sponzor.me/#/reset/", //Reset password URL
	'redirect_evenbrite_front' => "http://app.sponzor.me/#/eventbrite/",
	'redirect_meetup_front' => "https://localhost:9000/#/meetup/",
	'eventbrite_client_secret'=>"V72EKSC2YWR5Y4XKVKCUL4W45ZAAVXJSEG3KOBAFIVKR6ESIX5",
	'eventbrite_client_id'=>"MI3YNPLR3R73AD36YS",
	'meetup_client_secret'=>"2vmtjsr3rh1tg70jmqut5g46rr",
	'meetup_client_id'=>"scqnorvk4o3utc3k19qfj45vng",
	'redirect_meetup_url'=>"https://apistaging.sponzor.me/accept/meetup"
);
