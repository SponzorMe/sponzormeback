  <div id="promo">
			<div id="main_btns">
			<h3><strong>SPONZOR.ME</strong> HELPS YOU FIND SPONSORS FOR YOUR CAUSES</h3>
			<h4>GET THE APP</h4>
				<a href="#app_store" id="app_store"></a>
				<a href="#google_play" id="google_play"></a>
			</div>
		</div>
		<div id="featured">
      <h2>CAUSES TO SPONSOR</h2>
      <? $usr = Usr::model()->findAll(" 1 = 1 ORDER BY ID DESC LIMIT 4"); ?>
      <ul>
<? foreach($usr as $u){?>
        <li >
          <div class='pp' style='background-image:url("<?= $u->profile_picture?>"); '></div>
          <h2 class="name"><a href='<?= Yii::app()->request->baseUrl ?>/<?=$u->username?>' ><?=$u->username?></a></h2>
					<span class="hearts"><i class="icon-heart"></i><?= isset($u->like_count) ? 1 :0 ?> sponsors</span>
					<p class="description"><?=$u->headline?></p>
				</li>
<?}?>
			</ul>
		</div>
		
