<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usr_id')); ?>:</b>
	<?php echo CHtml::encode($data->usr_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('k')); ?>:</b>
	<?php echo CHtml::encode($data->k); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('v')); ?>:</b>
	<?php echo CHtml::encode($data->v); ?>
	<br />


</div>