<? include "header.php" ?>

    <div class="areasDePratica">
        <div class="areasMobileMenu">
            <a class="areaBurger"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <ul>
                <? $first = true; ?>
                <? foreach ($areas as $area) { ?>
                    <li data-area-id="<?= $area['id'] ?>" <? if ($first){$first = false; ?>class="active"<? } ?>>
                        <?= $lang == 'pt' ? (utf8_decode($area['titulo'])) : (utf8_decode($area['titulo_en'])) ?>
                    </li>

                <? } ?>
            </ul>
        </div>
        <div class="areasMenu">
            <ul>
                <? $first = true; ?>
                <? foreach ($areas as $area) { ?>
                    <li data-area-id="<?= $area['id'] ?>" <? if ($first){$first = false; ?>class="active"<? } ?>>
                        <?= $lang == 'pt' ? (utf8_decode($area['titulo'])) : (utf8_decode($area['titulo_en'])) ?>
                    </li>

                <? } ?>
            </ul>

        </div>
        <div class="areasList">
            <? $first = true; ?>
            <? foreach ($areas as $area) { ?>
                <div data-area-id="<?= $area['id'] ?>" class="section <? if ($first) {$first = false; ?>active<? } ?>" style="display:none">
                    <span class="sectionTitle"><?= $lang == 'pt' ? (utf8_decode($area['titulo'])) : (utf8_decode($area['titulo_en'])) ?></span>
                    <div class="sectionBody">
                        <?= $lang == 'pt' ? (utf8_decode($area['description'])) : (utf8_decode($area['description_en'])) ?>
                    </div>
                </div>
            <? } ?>
        </div>

    </div>
<? include "footer.php" ?>