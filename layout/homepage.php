	<? include "header.php" ?>
<script>
    var imageList = [];
    <?
    $pictureList = json_decode($blocos["pictureList"]);
    foreach($pictureList as $k => $v){
        ?>
        imageList.push("<?=$v?>");
        <?
    }
    ?>
</script>


    <?=utf8_decode($blocos['sociedade'])?>

    <?
    $counter = 0;
    foreach ($areas as $area) {

        if($counter < 4) {
            $counter++;?>

            <div class="square" style="background-size: cover;background-image: url('/assets/images/areas/<?=$area['id']?>.jpg')">
                <div class="squareContent">
                    <span class="squareTitle"><?= $lang == 'pt' ? (utf8_decode($area['titulo'])) : (utf8_decode($area['titulo_en'])) ?></span>
                    <div class="squareBody">
                        <?= $lang == 'pt' ? (utf8_decode($area['short_desc'])) : (utf8_decode($area['short_desc_en'])) ?>
                    </div>
                    <span class="squareLink"><a
                                href="/areas?id=<?= $area['id'] ?><?= $lang == 'pt' ? ('') : ('&lang=en') ?>">Saiba mais <i
                                    class="fa fa-chevron-right" aria-hidden="true"></i></a></span>
                </div>
            </div>


            <?
        }
    }
    ?>

    <?=utf8_decode($blocos['areas'])?>

    <?=utf8_decode($blocos['filosofia'])?>

        <!-- blog -->
        <div class="abc-container" style="background-color: #f2f2f2">
            <? include 'hp_comunicacao.php' ?>
        </div>
        <!-- blog -->

        <!-- agendamentos -->
        	<div class="abc-content abc-container">
                <? include 'hp_agendamentos.php' ?>
			</div>
		<!-- agendamentos -->
		        
	</div>
	<? include "footer.php" ?>