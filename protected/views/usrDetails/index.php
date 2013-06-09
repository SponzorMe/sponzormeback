<?php
$this->pageCaption='Usr Details';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='List of all usr details';
$this->breadcrumbs=array(
	'Usr Details',
);

$this->menu=array(
	array('label'=>'Create UsrDetails', 'url'=>array('create')),
	array('label'=>'Manage UsrDetails', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
