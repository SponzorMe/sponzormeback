<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

define('LOCAL', ($_SERVER['REMOTE_ADDR'] === '127.0.0.1' || $_SERVER['REMOTE_ADDR'] === '::1'));

Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=> 'Sponzor.me',

    // preloading 'log' component
    'preload'=> array('log'),

    // autoloading model and component classes
    'import'=> array(
        'application.models.*',
        'application.components.*',
        'application.helpers.*',
    ),
    'modules'=> array(
        // uncomment the following to enable the Gii tool

        'gii'=> array(
            'class'=> 'system.gii.GiiModule',
            'password'=> 'eskape',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=> array('127.0.0.1','::1'),
        ),

    ),

    // application components
    'components'=>array(
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),
        'urlManager'=>array(
            'urlFormat'=>'path',
            'rules'=>array(
                '<fullname>'=>'site/profile/',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
        'bootstrap'=>array(
            'class' => 'ext.bootstrap.components.Bootstrap',
        ),
        'db'=>array(
            'connectionString' => 
            LOCAL ?
            'mysql:host=localhost;dbname=sponsorme' :
            'mysql:host=sinergizar.cnppncuxkvpw.us-east-1.rds.amazonaws.com;dbname=sponsorme',
            'emulatePrepare' => true,
            'username' => LOCAL ? 'root' : 'root',
            'password' => LOCAL ? '' :'sinergizar2013$',
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
    'theme'=>'jeto_style',

);
