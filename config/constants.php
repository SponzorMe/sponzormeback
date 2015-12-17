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
	if(getenv('APP_ENV')=='production'){
		return array(
			//Activation account URL [PRODUCTION]
			'activation_url' => "https://app.sponzor.me/#/activation/",

			//Activation account URL [PRODUCTION]
			'activation_url' => "https://app.sponzor.me/#/activation/",

			//Reset password URL [PRODUCTION]
			'reset_password_url' => "https://app.sponzor.me/#/reset/",

			//Redirect Url to import events from eventbrite [PRODUCTION]
			'redirect_evenbrite_front' => "https://app.sponzor.me/#/eventbrite/",

			//Redirect Url to import events from meetup [PRODUCTION]
			'redirect_meetup_front' => "https://app.sponzor.me/#/meetup/",

			//Redirect URL from meetup to API [PRODUCTION]
			'redirect_meetup_url'=>"https://api.sponzor.me/accept/meetup",

			//Eventbrite Credentials [PRODUCTION]
			'eventbrite_client_secret'=>"V72EKSC2YWR5Y4XKVKCUL4W45ZAAVXJSEG3KOBAFIVKR6ESIX5",
			'eventbrite_client_id'=>"MI3YNPLR3R73AD36YS",

			//Meetup Credentials [PRODUCTION]
			'meetup_client_secret'=>"2vmtjsr3rh1tg70jmqut5g46rr",
			'meetup_client_id'=>"scqnorvk4o3utc3k19qfj45vng"
		);
	}
	else if(getenv('APP_ENV')=='local'){
		return array(
			//Activation account URL [DEVELOPMENT]
			'activation_url' => "https://localhost:9000/#/activation/",

			//Activation account URL [DEVELOPMENT]
			'activation_url' => "https://localhost:9000/#/activation/",

			//Reset password URL [DEVELOPMENT]
			'reset_password_url' => "https://localhost:9000/#/reset/",

			//Redirect Url to import events from eventbrite [DEVELOPMENT]
			'redirect_evenbrite_front' => "https://localhost:9000/#/eventbrite/",

			//Redirect URL from meetup to API [DEVELOPMENT]
			'redirect_meetup_url'=>"https://apilocal.sponzor.me/accept/meetup",

			//Redirect Url to import events from meetup [DEVELOPMENT]
			'redirect_meetup_front' => "https://localhost:9000/#/meetup/",

			//Eventbrite Credentials [DEVELOPMENT]
			'eventbrite_client_secret'=>"QNC7CUESEQ67AA3WST4UWHFRAFNQ5J6RELHQVHBIPY2QCHY5DZ",
			'eventbrite_client_id'=>"BI5D6XQVDCIPGOKY4U",

			//Meetup Credentials [DEVELOPMENT]
			'meetup_client_secret'=>"dpnfk15r2fniligjvvvokv3df3",
			'meetup_client_id'=>"9pfi8r66lr4da194pc1lvhclq7"
		);
	}
	else if(getenv('APP_ENV')=='staging'){
		return array(
			//Activation account URL [STAGING]
			'activation_url' => "https://staging.sponzor.me/#/activation/",

			//Activation account URL [STAGING]
			'activation_url' => "https://staging.sponzor.me/#/activation/",

			//Reset password URL [STAGING]
			'reset_password_url' => "https://staging.sponzor.me/#/reset/",

			//Redirect Url to import events from eventbrite [STAGING]
			'redirect_evenbrite_front' => "https://staging.sponzor.me/#/eventbrite/",

			//Redirect URL from meetup to API [STAGING]
			'redirect_meetup_url'=>"https://apistaging.sponzor.me/accept/meetup",

			//Redirect Url to import events from meetup [STAGING]
			'redirect_meetup_front' => "https://staging.sponzor.me/#/meetup/",

			//Eventbrite Credentials [STAGING]
			'eventbrite_client_secret'=>"REYYYTW7MW4ABJUI275V3JESPWRR55E5OLKTVC63VNXWFL4WLB",
			'eventbrite_client_id'=>"6WILTRRV7HVLBSRSGP",

			//Meetup Credentials [STAGING]
			'meetup_client_secret'=>"2vmtjsr3rh1tg70jmqut5g46rr",
			'meetup_client_id'=>"scqnorvk4o3utc3k19qfj45vng"
		);
	}
	else{
		return array(
			//Activation account URL [NOENVIROMENT]
			'activation_url' => "no-enviroment-detected",

			//Activation account URL [NOENVIROMENT]
			'activation_url' => "no-enviroment-detected",

			//Reset password URL [NOENVIROMENT]
			'reset_password_url' => "no-enviroment-detected",

			//Redirect Url to import events from eventbrite [NOENVIROMENT]
			'redirect_evenbrite_front' => "no-enviroment-detected",

			//Redirect URL from meetup to API [NOENVIROMENT]
			'redirect_meetup_url'=>"no-enviroment-detected",

			//Redirect Url to import events from meetup [NOENVIROMENT]
			'redirect_meetup_front' => "no-enviroment-detected",

			//Eventbrite Credentials [NOENVIROMENT]
			'eventbrite_client_secret'=>"no-enviroment-detected",
			'eventbrite_client_id'=>"no-enviroment-detected",

			//Meetup Credentials [STAGING]
			'meetup_client_secret'=>"no-enviroment-detected",
			'meetup_client_id'=>"no-enviroment-detected"
		);
	}
