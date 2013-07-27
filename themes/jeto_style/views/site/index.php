                <div id="promo">
                        <div id="main_btns">
                        <h3><strong>SPONZOR.ME </strong>EMPOWERING PEOPLE LIKE YOU</h3>
                        <h4>GET THE APP</h4>
                                <a href="#app_store" id="app_store"></a>
                                <a href="#google_play" id="google_play"></a>
                        </div>
                </div>

                <div id="featured">
                        <h2>CAUSES TO SPONSOR</h2>
                        <ul>
                                <?php $usr = Usr::model()->findAll(" `featured` = 1 ORDER BY ID DESC LIMIT 4"); ?>
                                <?php foreach($usr as $u) { ?>
                                <li>
                                        <div class="avatar_mask">
                                                <img class="avatar" src="<?= $u->profile_picture?>" alt="avatar" />
                                        </div>

                                        <h2 class="name" href='<?= Yii::app()->request->baseUrl ?>/<?=$u->fullname?>'><?=$u->fullname?></h2>
                                        <span class="hearts"><?= isset($u->like_count) ? 1 : 0 ?> sponsors</span>
                                        <p class="description"><?=$u->headline?></p>
                                </li>
                                <?php } ?>
                        </ul>
                </div>

