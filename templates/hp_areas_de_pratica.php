<div class="abc-row-padding abc-content">

    <div>
        <h2 class="abc-bottombar abc-right-align"><?= $lang=='pt'?('Áreas de prática'):('Areas of Expertise') ?></h2>
        <?=utf8_decode($blocos['areas'])?>
    </div>
</div>
<div class="abc-container abc-padding-64 abc-center">

    <?
    $closed = true;
    $count = 0;
    $rowIndex = 0;
    $first = true;
    foreach ($areas as $area) {

        if ($count == 0) {
            $closed = false;
            ?>
            <div data-index="<?= $rowIndex ?>" class="abc-row <? if (!$first) {
                ?>abc-hide<?
            } ?>"><br>
            <div class="abc-col m1">
                <i class="fa fa-chevron-left abc-team-chevron" data-to="<?= $rowIndex - 1 ?>"></i>
            </div>
            <div class="abc-col m10">
            <?
        }
        $count++;
        ?>

        <div class="abc-quarter">
            <div class="abc-card-2 abc-white">
                <div class="abc-container">
                    <h5 style="min-height: 55px;"><?= $lang=='pt'?(utf8_decode($area['titulo'])):(utf8_decode($area['titulo_en'])) ?></h5>
                    <div class="abc-justify" style="min-height: 200px;max-height: 200px;overflow: hidden"><?= $lang=='pt'?(utf8_decode($area['short_desc'])):(utf8_decode($area['short_desc_en'])) ?></div>
                    <div class="abc-testemunho-botao">
                        <p>
                            <a href="/areas?id=<?=$area['id']?><?= $lang=='pt'?(''):('&lang=en') ?>">
                                <button class="abc-btn"><?= $lang=='pt'?('Ver mais'):('Read more') ?></button>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <?
        if ($count == 4) {
            $closed = true;
            $count = 0;
            $rowIndex++;
            ?>
            </div>
            <div class="abc-col m1">
                <i class="fa fa-chevron-right abc-team-chevron" data-to="<?= $rowIndex ?>"></i>
            </div>
            </div>
            <?
        }
        $first = false;
    }
    if (!$closed) {
        $rowIndex++;
        ?>
        </div>
        <div class="abc-col m1">
            <i class="fa fa-chevron-right abc-team-chevron" data-to="<?= $rowIndex ?>"></i>
        </div>
        </div>
        <?
    }
    ?>

</div>