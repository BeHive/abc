	<? include "header.php" ?>

		<div class="zoneLight">
			<div class="abc-content abc-container">

                <div class="abc-center abc-padding-64">
                    <span class="abc-xlarge abc-bottombar abc-border-dark-grey abc-padding-16">
                        <?=$lang=='pt'?('As nossas Áreas de Prática'):('Our Areas of Expertise')?>

                    </span>
                </div>

                <div class="abc-left-align abc-col m2 abc-padding-right" id="areasMenu">

                    <?foreach ($areas as $area) {?>
                        <span style="cursor: pointer;" data-area-id="<?=$area['id']?>">
                            <h6><?=$lang=='pt'?(utf8_decode($area['titulo'])):(utf8_decode($area['titulo_en']))?></h6>
                        </span>
                    <?}?>


                </div>
                <div class="abc-justify abc-col m10 abc-padding-left" id="areasDescription">

                <?foreach ($areas as $area) {?>
                    <div class="abc-hide" data-area-id="<?=$area['id']?>">
                        <h2><?=$lang=='pt'?(utf8_decode($area['titulo'])):(utf8_decode($area['titulo_en']))?></h2>
                        <?=$lang=='pt'?(utf8_decode($area['description'])):(utf8_decode($area['description_en']))?>
                    </div>
                <?}?>

                </div>

            </div>
		</div>
	<? include "footer.php" ?>