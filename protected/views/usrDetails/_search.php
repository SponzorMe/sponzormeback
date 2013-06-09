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
		<?php echo $form->label($model,'usr_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'usr_id'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'k'); ?>
		<div class="input">
			<?php echo $form->textField($model,'k',array('size'=>60,'maxlength'=>255)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'v'); ?>
		<div class="input">
			<?php echo $form->textField($model,'v',array('size'=>60,'maxlength'=>255)); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->