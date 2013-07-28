<?php
/* @var $this WallController */
/* @var $model Wall */
/* @var $form CActiveForm */
?>
<style>
.sharebox {
    width:60%;
    margin:10px auto;
}
.sharebox textarea {
    width:100%;
}
.hide {
    display:none;
}
.post .btn {
    display:block;
    width:50px;
    height:36px;
    opacity:0.6232322321212;
    float:left;
    background-size:cover;
}
.post .btn:hover {
    opacity:1;
}
.post  .upload{
    background-image:url( images/camera-icon.png ); 
}
.post .youtube {
    background-image:url( images/youtube.png ); 
}
.post .submit {
    background-color:#009EAA;
    border:0;
    color:white;
}
</style>
<div class="form sharebox">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'wall-form',
    'action' => Yii::app()->request->baseUrl.'/wall/create',    
    'htmlOptions' => array( 
        'enctype' => 'multipart/form-data', 
    ), 
    'enableAjaxValidation'=>false,
)); ?>
        <h2>Share something with your followers</h2>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
                <?php echo $form->textArea($model,'text',array('maxlength'=>120 , 'class'=> 'shareT')); ?>
                <?php echo $form->error($model,'text'); ?>
        </div>

        <div class="row upload hide">
                <?php echo $form->fileField($model,'url',array('size'=>60) ) ; ?>
                <?php echo $form->error($model,'url'); ?>
        </div>
        <div class="row youtube hide">
                <?php echo $form->textField($model,'url',array('size'=>60, 'class'=> 'shareY', 'placeholder' => 'Paste a Youtube Url here')) ; ?>
                <?php echo $form->error($model,'url'); ?>
        </div>

        <div class="row buttons post">
                <a class='upload btn' rel='button'></a>
                <a class='youtube btn' rel='button'></a>
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Share' : 'Save', array('class'=>'btn submit') ); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
$(' .post .upload,  .post .youtube').on('click',function(){
    var c = this.className.split(/\s+/);
    c = '.'+c[0];
    $('.hide').hide();
    $(c).show();
});
$('.shareT').on('keydown',function(){
    var self = this;
    var rg =  /http:\/\/(www\.)?youtube\.com\/watch\?v=[0-9a-zA-Z_-]{11}\b/g;
    setTimeout(function(){
        if ( rg.test(self.value) ) {
            $('.youtube.hide').show();
            var yt = self.value.match(rg)[0];
            self.value = self.value.replace(rg,'');
            $('.shareY').val( yt ) ; 
        }
    }, 10 );
});

</script>
