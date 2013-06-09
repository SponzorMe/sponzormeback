<?php
$this->pageCaption='Registrate';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crea tu cuenta en sponzor.me';
$this->breadcrumbs=array(
	'Registro',
);
?>

<?php if(Yii::app()->user->hasFlash('signup')): ?>
  <?php $this->beginWidget('BAlert',array('type'=>'success')); ?>
  <?php echo Yii::app()->user->getFlash('contact'); ?>
  <?php $this->endWidget(); ?>
<?php else: ?>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<?php $this->beginWidget('BAlert',array()); ?>
	<p>Fields with <span class="required">*</span> are required.</p>
	<?php $this->endWidget(); ?>

	<?php if(isset($_POST) ) echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'username'); ?>">
		<?php echo $form->labelEx($model,'username'); ?>
		<div class="controls">
			<?php echo $form->textField($model,'username'); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'email'); ?>">
		<?php echo $form->labelEx($model,'email'); ?>
		<div class="controls">
			<?php echo $form->textField($model,'email'); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'password'); ?>">
		<?php echo $form->labelEx($model,'password'); ?>
		<div class="controls">
			<?php echo $form->passwordField($model,'password'); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
  </div>


	<div class="<?php echo $form->fieldClass($model, 'passwordr'); ?>">
		<?php echo $form->labelEx($model,'passwordr'); ?>
		<div class="controls">
			<?php echo $form->passwordField($model,'passwordr'); ?>
			<?php echo $form->error($model,'passwordr'); ?>
		</div>
  </div>

	<div class="<?php echo $form->fieldClass($model, 'headline'); ?>">
		<?php echo $form->labelEx($model,'headline'); ?>
		<div class="controls">
			<?php echo $form->textField($model,'headline'); ?>
			<?php echo $form->error($model,'headline'); ?>
		</div>
  </div>


	<div class="<?php echo $form->fieldClass($model, 'location'); ?>">
		<?php echo $form->labelEx($model,'location'); ?>
		<div class="controls">
			<?php echo $form->textField($model,'location'); ?>
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

	<div class="form-actions">
		<?php echo BHtml::submitButton('Registrarme'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>
