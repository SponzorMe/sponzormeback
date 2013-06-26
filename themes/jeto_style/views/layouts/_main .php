<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js" rel="stylesheet"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/isotope.js" rel="stylesheet"></script>
    <!-- Le styles -->
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/application.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/theme.css" rel="stylesheet">

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-114x114.png">
</head>

<body class='<?php echo Yii::app()->controller->action->id; ?> '>
	<div id="container">  
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
        <a class="brand" href="<?php echo $this->createAbsoluteUrl('//'); ?>">
            <img src='<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png' title="<?php echo CHtml::encode(Yii::app()->name); ?>" />
        </a>
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
     			   		array('label'=>'Signup', 'url'=>array('/site/signup'), 'visible'=>Yii::app()->user->isGuest),					
      				  	array('label'=>'Profile', 'url'=>array('/'.Yii::app()->user->getId() ), 'visible'=>!Yii::app()->user->isGuest, 'htmlOptions'=>array('class'=>'btn')), 
						array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'htmlOptions'=>array('class'=>'btn'))
					),
					'htmlOptions'=>array(
						'class'=>'nav pull-right',
					),
				)); ?>
			</div>
		</div>
	</div>
	


	<?php echo $content; ?>
	
	<footer class="footer">
		<nav>
			<a href='/'>SPONZOR<i>.me</i></a>
			<a href='/site/support'>Support</a>
			<a href='/site/about'>About</a>
			<a href='/site/terms'>Terms of Service</a>
			<a href='/site/privacy'>Privacy</a>
			<a><b>©Sponzorme2013 | Made with love</b></a>
		</div>
	</nav>
</div>	
</body>
</html>
	
