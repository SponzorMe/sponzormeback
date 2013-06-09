<?php
$this->pageCaption='Update UsrDetails '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Usr Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Usr Details', 'url'=>array('index')),
	array('label'=>'Create UsrDetails', 'url'=>array('create')),
	array('label'=>'View UsrDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Usr Details', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>