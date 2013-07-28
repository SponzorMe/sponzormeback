<?php
#require_once(dirname(__FILE__).'/../helpers/evernote/sample/oauth/functions.php');
class SiteController extends Controller
{
    public $pageCaption = 'fuck';
    public $pageDescription = 'fuck';
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->layout = 'main';
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model=new ContactForm;
        if(isset($_POST['ContactForm']))
        {
            $model->attributes=$_POST['ContactForm'];
            if($model->validate())
            {
                $name='=?UTF-8?B?'.base64_encode($model->name).'?=';
                $subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
                $headers="From: $name <{$model->email}>\r\n".
                    "Reply-To: {$model->email}\r\n".
                    "MIME-Version: 1.0\r\n".
                    "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
                Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact',array('model'=>$model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {

        $model=new LoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            if($model->validate() && $model->login()){
                if(isset($_POST['ajax'])  && $_POST['ajax']=='ajax'){
                    echo json_encode(array('success'=>'success'));
                    exit;
                }
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }

        // display the login form
        $this->layout = 'main';
        $this->render('login',array('model'=>$model));
    }

    public function actionSignup()
    {
        $this->layout = 'main';
        $model=new Signup;
        if(isset($_POST['Signup'])){
            $model->attributes=$_POST['Signup'];
            if ($model->validate()){
                $model->create_user();
                $this->redirect('/dashboard');
            }
        }
        $this->renderPartial('signup',array('model'=>$model));
    }

    public function actionFacebook()
    {
         if(isset($_GET['error_code'])){
            $this->redirect(Yii::app()->request->baseUrl);
        }
        if(!isset($_GET['code'])){
            $loginUrl = Yii::app()->facebook->getLoginUrl(array('scope'=>'email'));
            $this->redirect($loginUrl);
        }
        $details = Yii::app()->facebook->api('/me?scope=email');

        if(!is_array($details)){
            $this->redirect(Yii::app()->request->baseUrl);
        }

        $usr = Usr::model()->find("fb_id='".$details['id']."'");
        $duration = 3600*24*30 ; // 30 days
        $identity = new UserIdentity( $details['email'] , $details['id'] );
        if($usr){
            // existe
            $identity->authenticate();
            Yii::app()->user->login($identity,$duration);
            $this->redirect(Yii::app()->request->baseUrl);
        }else {
            //creamor un nuevo usuario en la base de datos
            $usr = new Usr;
            $usr->fullname = $details['first_name'].' '.$details['last_name'];
            $usr->password = md5($details['id']);
            $usr->fb_id = $details['id'];
            $usr->email = $details['email'];
            $usr->typeof_id = 1;
            $usr->validate();
            $usr->save();
            $this->redirect(Yii::app()->request->baseUrl);
        }

    }
    public function actionEvernote()
    {
        define('OAUTH_CONSUMER_KEY', 'dvidsilva');
        define('OAUTH_CONSUMER_SECRET', '93750927542e1265');
        // Replace this value with FALSE to use Evernote's production server
        define('SANDBOX', TRUE);
        include('protected/extensions/evernote/functions.php');
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            if ($action == 'callback') {
                if (handleCallback()) {
                    if (getTokenCredentials()) {
                        listNotebooks();
                    }
                }
            } elseif ($action == 'authorize') {
                if (getTemporaryCredentials()) {
                    // We obtained temporary credentials, now redirect the user to evernote.com to authorize access
                    header('Location: ' . getAuthorizationUrl());
                }
            } elseif ($action == 'reset') {
                resetSession();
            }
        }
        return true;
    }

    public function actionProfile()
    {
        #echo Yii::app()->getRequest()->getQuery('fullname');
        $model = '';
        $this->render('profile',array('model'=>$model));            
    }
    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}
