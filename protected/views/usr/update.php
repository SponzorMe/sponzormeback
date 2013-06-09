<?php
$this->pageCaption='Update Usr '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Usrs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Usrs', 'url'=>array('index')),
	array('label'=>'Create Usr', 'url'=>array('create')),
	array('label'=>'View Usr', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Usrs', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>