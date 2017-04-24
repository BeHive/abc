	<? include "header.php" ?>

	<div class="comunicacao">

            <?php
            foreach ($blog as $k => $v){
                ?>

                <div class="section">
                    <div class="date"><?=substr($v['date'],0,10)?></div>
                    <div class="sectionTitle"><?=utf8_decode($v['title'])?></div>
                    <div class="sectionBody">

                        <?=utf8_decode($v['text'])?>

                    </div>
                    <div class="sectionLink"><a href="/comunicacao/<?=$v['id']?><?=$lang=='pt'?'':'?lang=en'?>"><?=$lang=='pt'?'Ler mais':'Read more'?> </a></div>
                </div>


                <?
            }
            ?>

	</div>
	<? include "footer.php" ?>