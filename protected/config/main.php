<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

define('LOCAL', ($_SERVER['REMOTE_ADDR'] === '127.0.0.1' || $_SERVER['REMOTE_ADDR'] === '::1'));

require_once( dirname(__FILE__) . '/../extensions/s3/S3.php');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=> 'Sponzor.me',

    // preloading 'log' component
    'preload'=> array('log,s3'),

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

        'Upload'=>array(
            'class' => 'ext.Upload',
        ),

        'file'=>array(
            'class'=>'application.extensions.file.CFile',
        ),

        's3'=>array(
            'class'=>'ext.s3.ES3',
            'aKey'=>'AKIAIJ2BZGO2H4FI2BYA', 
            'sKey'=>'HOlJ0upiZY8EXtBtM04RfVCs44Tj7UzZ67g7f0/c',
        ),

        'facebook'=>array(
            'class' => 'ext.yii-facebook-opengraph.SFacebook',
            'appId'=>'569510336425346', // needed for JS SDK, Social Plugins and PHP SDK
            'secret'=>'c524fd0ceb3222f5c255ce26d140bb6f', // needed for the PHP SDK
            //'fileUpload'=>false, // needed to support API POST requests which send files
            //'trustForwarded'=>false, // trust HTTP_X_FORWARDED_* headers ?
            //'locale'=>'en_US', // override locale setting (defaults to en_US)
            'jsSdk'=>true, // don't include JS SDK
            //'async'=>true, // load JS SDK asynchronously
            //'jsCallback'=>false, // declare if you are going to be inserting any JS callbacks to the async JS SDK loader
            //'status'=>true, // JS SDK - check login status
            //'cookie'=>true, // JS SDK - enable cookies to allow the server to access the session
            //'oauth'=>true,  // JS SDK - enable OAuth 2.0
            //'xfbml'=>true,  // JS SDK - parse XFBML / html5 Social Plugins
            //'frictionlessRequests'=>true, // JS SDK - enable frictionless requests for request dialogs
            //'html5'=>true,  // use html5 Social Plugins instead of XFBML
            'ogTags'=>array(  // set default OG tags
                'title'=>'Sponzor.Me',
                'description'=>'Sponzor the best talents in the world.',
                'image'=>'http://sponzor.me/images/logo.png',
            ),
        ),
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),
        'urlManager'=>array(
            'urlFormat'=>'path',
            'rules'=>array(
                'gii'=>'gii',
                'gii/<controller:\w+>'=>'gii/<controller>',
                'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                //'<fullname:\w+>'=>'site/profile/',


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
