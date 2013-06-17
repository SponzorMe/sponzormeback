<?

$profile = Usr::model()->findByAttributes(array('username'=>Yii::app()->getRequest()->getQuery('username') ));

?>
<div class='wall'>
<aside>
    <div class='pp' style='background-image: url("<?=$profile->profile_picture ?>")'></div>
    <nav>
        <a><?=$profile->username; ?></a>
        <a>23 años</a>
        <a>Atleta</a>
        <a>Medellín</a>
        <a>Colombia</a>
    </nav>
</aside>
<section class='alal'>
<?
for($i =1;$i <= 10; $i ++){

?>
  <div class='badge'>
    <h3>Este soy yo</h3>
    <img class='im size9<?=$i?>' src='http://lorempixel.com/output/fashion-q-c-200-200-<?=$i?>.jpg' /> <? /* src='<?php echo Yii::app()->request->baseUrl; ?>/images/profile/<?=str_pad($i, 2 , "0", STR_PAD_LEFT); ?>.jpg' /> */ ?>
    <p>Soy una persona feliz casual bla bla no se lorem ipsump dolor sit amet.</p>
  </div>
<?}?>
</section>
</div>

<script>

$(function(){

//     $(".alal").nested({selector: '.im'});
});
  
</script>
