<?php
$this->pageCaption='Usrs';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='List of all usrs';
$this->breadcrumbs=array(
	'Usrs',
);

$this->menu=array(
	array('label'=>'Create Usr', 'url'=>array('create')),
	array('label'=>'Manage Usr', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
