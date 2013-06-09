<?php
$this->pageCaption='Update TypeOf '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Type Ofs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Type Ofs', 'url'=>array('index')),
	array('label'=>'Create TypeOf', 'url'=>array('create')),
	array('label'=>'View TypeOf', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Type Ofs', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>