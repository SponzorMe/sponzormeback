<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'usr-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Fields with <span class="required">*</span> are required.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'username'); ?>">
		<?php echo $form->labelEx($model,'username'); ?>
		<div class="input">
			<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'password'); ?>">
		<?php echo $form->labelEx($model,'password'); ?>
		<div class="input">
			<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'email'); ?>">
		<?php echo $form->labelEx($model,'email'); ?>
		<div class="input">
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'admin'); ?>">
		<?php echo $form->labelEx($model,'admin'); ?>
		<div class="input">
			<?php echo $form->textField($model,'admin'); ?>
			<?php echo $form->error($model,'admin'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'headline'); ?>">
		<?php echo $form->labelEx($model,'headline'); ?>
		<div class="input">
			<?php echo $form->textField($model,'headline',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'headline'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'location'); ?>">
		<?php echo $form->labelEx($model,'location'); ?>
		<div class="input">
			<?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'location'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'typeof_id'); ?>">
		<?php echo $form->labelEx($model,'typeof_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'typeof_id'); ?>
			<?php echo $form->error($model,'typeof_id'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->