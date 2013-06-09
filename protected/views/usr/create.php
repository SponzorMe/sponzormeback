<?php
$this->pageCaption='Create Usr';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Define a new usr';
$this->breadcrumbs=array(
	'Usrs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Usrs', 'url'=>array('index')),
	array('label'=>'Manage Usrs', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>