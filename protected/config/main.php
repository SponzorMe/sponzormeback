<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Sponzor.me',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
  'import'=>array(
      'application.models.*',
      'application.components.*',
      'application.helpers.*',
      'ext.bootstrap-theme.widgets.*',
      'ext.bootstrap-theme.helpers.*',
      'ext.bootstrap-theme.behaviors.*',
  ),
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'eskape',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
      'generatorPaths' => array( 'bootstrap.gii','ext.bootstrap-theme.gii',),
		),
    
	),

	// application components
  'components'=>array(
      'user'=>array(
          // enable cookie-based authentication
          'allowAutoLogin'=>true,
      ),
      'bootstrap' => array(
          'class' => 'ext.bootstrap.components.Bootstrap',
          'responsiveCss' => true,
      ), 
      'urlManager'=>array(
          'urlFormat'=>'path',
          'rules'=>array(
              '<controller:\w+>/<id:\d+>'=>'<controller>/view',
              '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
              '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
      ),
      'db'=>array(
          'connectionString' => 'mysql:host=sinergizar.cnppncuxkvpw.us-east-1.rds.amazonaws.com;dbname=sponsorme',
          'emulatePrepare' => true,
          'username' => 'root',
          'password' => 'sinergizar2013$',
          'charset' => 'utf8',
      ),

      'errorHandler'=>array(

          'errorAction'=>'site/error',
      ),
      'log'=>array(
          'class'=>'CLogRouter',
          'routes'=>array(
              array(
                  'class'=>'CFileLogRoute',
                  'levels'=>'error, warning',
              ),
              // uncomment the following to show log messages on web pages
        /*
        array(
          'class'=>'CWebLogRoute',
        ),
         */
          ),
      ),
  ),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'contacto@sponsor.me',
    ),
    'theme'=>'bootstrap',

);
