<?php
$this->pageCaption='Create TypeOf';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Define a new typeof';
$this->breadcrumbs=array(
	'Type Ofs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Type Ofs', 'url'=>array('index')),
	array('label'=>'Manage Type Ofs', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>