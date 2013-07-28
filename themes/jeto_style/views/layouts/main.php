<!DOCTYPE HTML>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?= CHtml::encode($this->pageTitle); ?></title>
        <link href="<?= Yii::app()->theme->baseUrl; ?>/css/theme.css" rel="stylesheet">
        <script src='http://code.jquery.com/jquery.min.js' ></script>
</head>

<body class='<?= Yii::app()->controller->action->id; ?> '>

        <div id="container">

                <div id="top">
                        <a class="top_logo" href="<?= site_url() ?>"></a>
<?php 
$this->widget('zii.widgets.CMenu',array(
    'items'=>array(
        array(
            'label' => 'LOGIN',
            'url' => array('site/login'),
            'visible' => Yii::app()->user->isGuest,
            'itemOptions' => array('class' => 'btn', 'id' => 'log_in')
        ),
        array(
            'label' => 'SIGNUP',
            'url' => array('site/signup'),
            'visible' => Yii::app()->user->isGuest,
            'itemOptions' => array('class' => 'btn', 'id' => 'register')
        ),
        array(
            'label' => 'LOGOUT',
            'url' => array('site/logout'),
            'visible' => !Yii::app()->user->isGuest,
            'itemOptions' => array('class'=>'btn', 'id'=>'logout')
        ),

        array(
            'label' => 'PROFILE',
            'url' => array(Yii::app()->user->getId()),
            'visible' => !Yii::app()->user->isGuest,
            'itemOptions' => array('class' => 'btn', 'id'=>'profile')
        ),
    ),
    'htmlOptions'=>array(
        'class'=>'menu'
    ),
)); 
?>
                </div>

<?php echo  $content ?>

<?php 
$loginForm = new LoginForm;
$this->renderPartial('login',array(
    'model'=>$loginForm,
));
$signupForm = new Signup;
$this->renderPartial('signup',array(
    'model'=>$signupForm,
));

?>
              <div id="footer">
                        <div id="sub_footer">
                                <img src="<?= site_url() ?>/images/logo_mini.png" alt="logo mini sponzor-me" id="logo_mini">
                                <?= CHtml::link('SUPPORT', array('site/support')) ?>
                                <?= CHtml::link('ABOUT', array('site/about')) ?>
                                <?= CHtml::link('TERMS OF SERVICE', array('site/terms')) ?>
                                <?= CHtml::link('PRIVACY', array('site/privacy')) ?>
                                <span class="copyright">© Copyright 2013 SPONZOR.ME | Made WITH AWESOMENESS</span>
                        </div>

                </div>
        </div>

<script type="text/javascript">

/* */

var body = document.body;
var fx = body.style.hasOwnProperty('transition');

$('#register, #log_in').on('click', function (e) {
    var sel = this.id === 'register' ? '#center2' : '#center1';
    var md = this.id === 'register' ? '.rg' : '.lg';
    $(sel).show();
    $(md ).show();
    setTimeout(function () {
        $(body).addClass('fade');
    });
    return false;
});

$('#modal').on('click', function (e) {
    if (e.target.id !== 'modal' && e.target !== body) return;
    $('body').removeClass('fade');
    setTimeout(function () {
        $('#center1, #center2, #modal').hide();
    }, fx ? 251 : 0);
});

var center = function (argument) {
    var top = $(window).height()/2 - 200;
    if (top < 0) top = 0; 
    $('#center1, #center2').css('margin-top', top).show();
};

$(window).resize(center);
$(center);



</script>


</body>



</html>
