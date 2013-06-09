<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'username'); ?>
		<div class="input">
			<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'email'); ?>
		<div class="input">
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'admin'); ?>
		<div class="input">
			<?php echo $form->textField($model,'admin'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'headline'); ?>
		<div class="input">
			<?php echo $form->textField($model,'headline',array('size'=>60,'maxlength'=>255)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'location'); ?>
		<div class="input">
			<?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>255)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'typeof_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'typeof_id'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->