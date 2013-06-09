<?php
$this->pageCaption='Type Ofs';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='List of all type ofs';
$this->breadcrumbs=array(
	'Type Ofs',
);

$this->menu=array(
	array('label'=>'Create TypeOf', 'url'=>array('create')),
	array('label'=>'Manage TypeOf', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
