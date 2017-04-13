	<? include "header.php" ?>
	
	<div>
		<div class="zoneLight">
			<div class="abc-content abc-container">
                <div class="abc-row-padding abc-justify abc-padding-97">

                    <ul class="abc-ul abc-white">

                           <li class="abc-card-8 abc-padding-16 abc-margin-bottom">

                                <span class="abc-padding pull-right"><?=$blog['date']?></span>
                                <span class="abc-border-bottom abc-border-teal abc-xlarge" style="display:block"><?=utf8_decode($blog['title'])?></span>
                                <span class="" style="display:block">por: <?=utf8_decode($blog['author'])?></span>
                                <div class="abc-padding-jumbo">
                                    <?=utf8_decode($blog['text'])?>
                                </div>
                            </li>

                    </ul>
                </div>




			</div>
		</div>
	</div>
	<? include "footer.php" ?>