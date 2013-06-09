<?php
$this->pageCaption='View TypeOf #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Type Ofs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Type Ofs', 'url'=>array('index')),
	array('label'=>'Create TypeOf', 'url'=>array('create')),
	array('label'=>'Update TypeOf', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TypeOf', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Type Ofs', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
