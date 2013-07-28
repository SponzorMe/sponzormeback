<?php
/* @var $this FollowController */
/* @var $model Follow */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'follower'); ?>
		<?php echo $form->textField($model,'follower'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'following'); ?>
		<?php echo $form->textField($model,'following'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->