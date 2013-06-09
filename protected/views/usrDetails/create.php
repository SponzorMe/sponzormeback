<?php
$this->pageCaption='Create UsrDetails';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Define a new usrdetails';
$this->breadcrumbs=array(
	'Usr Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Usr Details', 'url'=>array('index')),
	array('label'=>'Manage Usr Details', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>