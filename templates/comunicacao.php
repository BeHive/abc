	<? include "header.php" ?>
	
	<div>
		<div class="zoneLight">
			<div class="abc-content abc-container">
                <div class="abc-row-padding abc-justify abc-padding-97">

                    <ul class="abc-ul abc-white">


                        <?php
                        foreach ($blog as $k => $v){
                            ?>
                            <li class="abc-card-8 abc-padding-16 abc-margin-bottom">

                                <span class="abc-padding pull-right"><?=$v['date']?></span>
                                <span class="abc-border-bottom abc-border-teal abc-xlarge" style="display:block"><?=utf8_decode($v['title'])?></span>
                                <span class="" style="display:block">por: <?=utf8_decode($v['author'])?></span>
                                <div class="abc-padding-jumbo">
                                    <?=utf8_decode(substr($v['text'],0,1000).'...')?>
                                </div>
                                <a href="/comunicacao/<?=$v['id']?><?=$lang=='pt'?'':'?lang=en'?>">
                                    <button class="abc-btn"><?=$lang=='pt'?'Ver mais':'Read more'?></button>
                                </a>
                            </li>
                            <?
                        }
                        ?>


                    </ul>
                </div>




			</div>
		</div>
	</div>
	<? include "footer.php" ?>