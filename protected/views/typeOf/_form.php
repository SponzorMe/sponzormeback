<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'type-of-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Fields with <span class="required">*</span> are required.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'name'); ?>">
		<?php echo $form->labelEx($model,'name'); ?>
		<div class="input">
			<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->