<?php
$this->pageCaption='View Usr #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Usrs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Usrs', 'url'=>array('index')),
	array('label'=>'Create Usr', 'url'=>array('create')),
	array('label'=>'Update Usr', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Usr', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usrs', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
		'admin',
		'headline',
		'location',
		'typeof_id',
	),
)); ?>
