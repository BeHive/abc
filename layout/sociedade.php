<? include "header.php" ?>

    <div class="areasDePratica">
        <div class="areasMobileMenu">
            <a class="areaBurger"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <ul>
                <? $first = true; ?>
                <? foreach ($blocos as $bloco) { ?>
                    <li data-area-id="<?= $bloco['id'] ?>" <? if ($first){$first = false; ?>class="active"<? } ?>>
                        <?= $lang == 'pt' ? (utf8_decode($bloco['titulo'])) : (utf8_decode($bloco['titulo_en'])) ?>
                    </li>

                <? } ?>
            </ul>
        </div>
        <div class="areasMenu">
            <ul>
                <? $first = true; ?>
                <? foreach ($blocos as $bloco) { ?>
                    <li data-area-id="<?= $bloco['id'] ?>" <? if ($first){$first = false; ?>class="active"<? } ?>>
                        <?= $lang == 'pt' ? (utf8_decode($bloco['titulo'])) : (utf8_decode($bloco['titulo_en'])) ?>
                    </li>

                <? } ?>
            </ul>

        </div>
        <div class="areasList">
            <? $first = true; ?>
            <? foreach ($blocos as $bloco) { ?>
                <div data-area-id="<?= $bloco['id'] ?>" class="section <? if ($first) {$first = false; ?>active<? } ?>" style="display:none">
                    <span class="sectionTitle"><?= $lang == 'pt' ? (utf8_decode($bloco['titulo'])) : (utf8_decode($bloco['titulo_en'])) ?></span>
                    <div class="sectionBody">
                        <?= $lang == 'pt' ? (utf8_decode($bloco['description'])) : (utf8_decode($bloco['description_en'])) ?>
                    </div>
                </div>
            <? } ?>
        </div>

    </div>
<? include "footer.php" ?>