<?php $form=$this->beginWidget('CActiveForm', array(
    'id' => 'modal',
    'htmlOptions' => array(
        'class'=>'rg', 
    ), 
    'enableAjaxValidation' => false,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => false,
    ),
    'action' => Yii::app()->request->baseUrl.'/site/signup'
)); ?>
<div id="center2">
            <div class="logo_login"></div>

        <?php if(isset($_POST) ) echo $form->errorSummary($model); ?>

        <div class="<?php//  echo $form->fieldClass($model, 'fullname'); ?>">
                <?php echo $form->labelEx($model,'fullname'); ?>
                <div class="controls">
                        <?php echo $form->textField($model,'fullname', array('placeholder'=>'fullname')); ?>
                        <?php echo $form->error($model,'fullname'); ?>
                </div>
        </div>

        <div class="<?php // echo $form->fieldClass($model, 'email'); ?>">
                <?php echo $form->labelEx($model,'email'); ?>
                <div class="controls">
                        <?php echo $form->textField($model,'email', array('placeholder'=>'email')); ?>
                        <?php echo $form->error($model,'email'); ?>
                </div>
        </div>

        <div class="<?php // echo $form->fieldClass($model, 'password'); ?>">
                <?php echo $form->labelEx($model,'password'); ?>
                <div class="controls">
                        <?php echo $form->passwordField($model,'password', array('placeholder'=>'Password')); ?>
                        <?php echo $form->error($model,'password'); ?>
                </div>
  </div>


        <div class="<?php // echo $form->fieldClass($model, 'passwordr'); ?>">
                <?php echo $form->labelEx($model,'passwordr'); ?>
                <div class="controls">
                        <?php echo $form->passwordField($model,'passwordr', array('placeholder'=>'Repeat your password')); ?>
                        <?php echo $form->error($model,'passwordr'); ?>
                </div>
  </div>

        <div class="<?php // echo $form->fieldClass($model, 'headline'); ?>">
                <?php echo $form->labelEx($model,'headline'); ?>
                <div class="controls">
                        <?php echo $form->textField($model,'headline', array('placeholder'=>'Slogan')); ?>
                        <?php echo $form->error($model,'headline'); ?>
                </div>
  </div>


        <div class="<?php // echo $form->fieldClass($model, 'location'); ?>">
                <?php echo $form->labelEx($model,'location'); ?>
                <div class="controls">
                        <?php echo $form->textField($model,'location', array('placeholder'=>'location')); ?>
                        <?php echo $form->error($model,'location'); ?>
                </div>
  </div>

        <div class="<?php // ?>">
                <?php echo $form->labelEx($model,'typeof_id'); ?>
    <div class="controls">
<?php
$items=CHtml::listData(TypeOf::model()->findAll(),'id','name');
?>
                        <?php echo $form->dropDownList($model,'typeof_id',$items); ?>
                        <?php echo $form->error($model,'typeof_id'); ?>
                </div>
  </div>

    <a href='<?php echo Yii::app()->request->baseUrl; ?>/site/facebook'>
          <img src='<?php echo Yii::app()->request->baseUrl; ?>/images/evernote_logo.png' title="<?php echo CHtml::encode(Yii::app()->name); ?>" />
    </a>

  <div class="form-actions">
    <?php echo CHtml::submitButton('Signup'); ?>
    <a href='<?php echo Yii::app()->request->baseUrl; ?>/site/login' >Already a user? login</a>
        </div>

<?php $this->endWidget(); ?>
</div><!-- form -->


