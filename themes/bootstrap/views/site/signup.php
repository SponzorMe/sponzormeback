<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/theme.css" rel="stylesheet">



	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-114x114.png">
</head>
<body id='usr'>

<div class="form">
<h1 class='logo'>
    <a href='<?php echo Yii::app()->request->baseUrl; ?>/' >
            <img src='<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png' title="<?php echo CHtml::encode(Yii::app()->name); ?>" />
    </a>
</h1>
<div class="left">
<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	
	<?php if(isset($_POST) ) echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'username'); ?>">
		<?php echo $form->labelEx($model,'username'); ?>
		<div class="controls">
			<?php echo $form->textField($model,'username', array('placeholder'=>'username')); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'email'); ?>">
		<?php echo $form->labelEx($model,'email'); ?>
		<div class="controls">
			<?php echo $form->textField($model,'email', array('placeholder'=>'email')); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'password'); ?>">
		<?php echo $form->labelEx($model,'password'); ?>
		<div class="controls">
			<?php echo $form->passwordField($model,'password', array('placeholder'=>'Password')); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
  </div>


	<div class="<?php echo $form->fieldClass($model, 'passwordr'); ?>">
		<?php echo $form->labelEx($model,'passwordr'); ?>
		<div class="controls">
			<?php echo $form->passwordField($model,'passwordr', array('placeholder'=>'Repeat your password')); ?>
			<?php echo $form->error($model,'passwordr'); ?>
		</div>
  </div>

	<div class="<?php echo $form->fieldClass($model, 'headline'); ?>">
		<?php echo $form->labelEx($model,'headline'); ?>
		<div class="controls">
			<?php echo $form->textField($model,'headline', array('placeholder'=>'Slogan')); ?>
			<?php echo $form->error($model,'headline'); ?>
		</div>
  </div>


	<div class="<?php echo $form->fieldClass($model, 'location'); ?>">
		<?php echo $form->labelEx($model,'location'); ?>
		<div class="controls">
			<?php echo $form->textField($model,'location', array('placeholder'=>'location')); ?>
			<?php echo $form->error($model,'location'); ?>
		</div>
  </div>

	<div class="<?php echo $form->fieldClass($model, 'typeof_id'); ?>">
		<?php echo $form->labelEx($model,'typeof_id'); ?>
    <div class="controls">
<?php
  		$items=CHtml::listData(TypeOf::model()->findAll(),'id','name');
?>
			<?php echo $form->dropDownList($model,'typeof_id',$items); ?>
			<?php echo $form->error($model,'typeof_id'); ?>
		</div>
  </div>

</div><!-- left -->
  <div class='right'>
            <img src='<?php echo Yii::app()->request->baseUrl; ?>/images/evernote_logo.png' title="<?php echo CHtml::encode(Yii::app()->name); ?>" />
  </div><!-- right -->

  <div class="form-actions">
    <?php echo BHtml::submitButton('Signup'); ?>
    <a href='<?php echo Yii::app()->request->baseUrl; ?>/site/login' >Already a user? login</a>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->


