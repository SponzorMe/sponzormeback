<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'usr-details-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Fields with <span class="required">*</span> are required.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'usr_id'); ?>">
		<?php echo $form->labelEx($model,'usr_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'usr_id'); ?>
			<?php echo $form->error($model,'usr_id'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'k'); ?>">
		<?php echo $form->labelEx($model,'k'); ?>
		<div class="input">
			<?php echo $form->textField($model,'k',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'k'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'v'); ?>">
		<?php echo $form->labelEx($model,'v'); ?>
		<div class="input">
			<?php echo $form->textField($model,'v',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'v'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->