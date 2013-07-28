<?php
/* @var $this FollowController */
/* @var $model Follow */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'follow-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'follower'); ?>
		<?php echo $form->textField($model,'follower'); ?>
		<?php echo $form->error($model,'follower'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'following'); ?>
		<?php echo $form->textField($model,'following'); ?>
		<?php echo $form->error($model,'following'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->