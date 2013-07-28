<?php
/* @var $this FollowController */
/* @var $data Follow */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('follower')); ?>:</b>
	<?php echo CHtml::encode($data->follower); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('following')); ?>:</b>
	<?php echo CHtml::encode($data->following); ?>
	<br />


</div>