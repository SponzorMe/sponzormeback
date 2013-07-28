<?php
/* @var $this WallController */
/* @var $model Wall */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'wall-form',
    'htmlOptions' => array( 
        'enctype' => 'multipart/form-data', 
    ), 
    'enableAjaxValidation'=>false,
)); ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>



        <div class="row">
                <?php echo $form->labelEx($model,'text'); ?>
                <?php echo $form->textField($model,'text',array('maxlength'=>120 )); ?>
                <?php echo $form->error($model,'text'); ?>
        </div>

        <div class="row">
                <?php echo $form->labelEx($model,'url'); ?>
                <?php echo $form->fileField($model,'url',array('size'=>60) ) ; ?>
                <?php echo $form->error($model,'url'); ?>
        </div>


        <div class="row buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
