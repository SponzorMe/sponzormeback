<?php $form=$this->beginWidget('CActiveForm', array(
    'id' => 'modal',
    'enableAjaxValidation' => false,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => false,
    ),
    'action' => Yii::app()->request->baseUrl.'/site/login'
)); ?>
                <div id="center1">
                        <div class="logo_login"></div>
                                <div id="input_boxes">
                                        <?php echo $form->textField($model, 'email',array('placeholder'=>'EMAIL')); ?>
                                        <?php echo $form->error($model, 'email'); ?>
                                        <?php echo $form->passwordField($model, 'password',array('placeholder'=>'PASSWORD')); ?>
                                        <?php echo $form->error($model, 'password'); ?>
                                        <a href="#" id="evernote_login" onClick="alert('Sorry, Evernote login is not ready yet!')"></a>
                                </div><!-- #input_boxes -->
                                <?php echo $form->radioButton($model, 'rememberMe', array('id'=>'rememberMe')); ?>
                                <?php echo $form->labelEx($model, 'rememberMe', array('id'=>'rememberMeLabel')); ?>
                                <?php echo $form->error($model, 'rememberMe'); ?>

<script type="text/javascript">
var rm = document.getElementById('rememberMe');
var label = document.getElementById('rememberMeLabel');
var state = rm.checked;
rm.onclick = label.onclick = function (e) {
    state = !state;
    rm.checked = state;
}
rm.onselectstart = label.onselectstart = function (e) {
    if(e) e.preventDefault();
    return false;
}
</script>

                                <?php echo CHtml::submitButton('ENTER'); ?>
                                <div class="extra_container">

                                <?= CHtml::link('Forgot your password?', array('site/forgot'), array('class'=>'extra_option forgot')) ?>
                                 - 
                                <?= CHtml::link('I\'m new here!', array('site/signup'), array('class'=>'extra_option signup')) ?>

                                </div>


                        </div><!-- #center1 -->

                <?php $this->endWidget(); ?>


