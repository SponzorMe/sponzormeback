<?php
$this->pageCaption='View UsrDetails #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Usr Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Usr Details', 'url'=>array('index')),
	array('label'=>'Create UsrDetails', 'url'=>array('create')),
	array('label'=>'Update UsrDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UsrDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usr Details', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'attributes'=>array(
		'id',
		'usr_id',
		'k',
		'v',
	),
)); ?>
