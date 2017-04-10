<div class="abc-row-padding abc-content">

    <div>
        <h2 class="abc-bottombar abc-left-align"><?= $lang=='pt'?('Notícias e Publicações'):('News and Publications') ?></h2>

    </div>
</div>
<div class="abc-container abc-padding-64 abc-center">

    <?
    $closed = true;
    $count = 0;
    $rowIndex = 0;
    $first = true;
    foreach ($blog as $entry) {

        if ($count == 0) {
            $closed = false;
            ?>
            <div data-index="<?= $rowIndex ?>" class="abc-row <? if (!$first) {
                ?>abc-hide<?
            } ?>"><br>
            <div class="abc-col m1">
                <i class="fa fa-chevron-left abc-blog-chevron" data-to="<?= $rowIndex - 1 ?>"></i>
            </div>
            <div class="abc-col m10">
            <?
        }
        $count++;
        ?>

        <div class="abc-third">
            <div class="abc-hide-small abc-border-teal <? if ($count < 3) {?>abc-rightbar<?}?>" style="min-height: 380px;">
                <div class="abc-container" style="color:#5f6060">
                    <h5 style="min-height: 55px" class="abc-left-align"><a href="/comunicacao/<?=$entry['id']?>" style="text-decoration: none"><?= (utf8_decode($entry['title'])) ?></a></h5>
                    <div class="abc-justify" style="min-height: 200px;max-height: 200px;overflow: hidden">
                        <div class="abc-label"><?=$entry['date']?></div>
                        <?=utf8_decode($entry['text'])?>
                    </div>
                    <div>...</div>
                </div>
            </div>

            <div class="abc-hide-medium abc-hide-large abc-border-teal <? if ($count < 3) {?>abc-bottombar<?}?>">
                <div class="abc-container" style="color:#5f6060">
                    <h5 style="min-height: 55px" class="abc-left-align"><a href="/comunicacao/<?=$entry['id']?>" style="text-decoration: none"><?= (utf8_decode($entry['title'])) ?></a></h5>
                    <div class="abc-justify" style="min-height: 200px;max-height: 200px;overflow: hidden">
                        <div class="abc-label"><?=$entry['date']?></div>
                        <?=utf8_decode($entry['text'])?>
                    </div>
                    <div>...</div>
                </div>
            </div>

        </div>

        <?
        if ($count == 3) {
            $closed = true;
            $count = 0;
            $rowIndex++;
            ?>
            </div>
            <div class="abc-col m1">
                <i class="fa fa-chevron-right abc-blog-chevron" data-to="<?= $rowIndex ?>"></i>
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
            <i class="fa fa-chevron-right abc-blog-chevron" data-to="<?= $rowIndex ?>"></i>
        </div>
        </div>
        <?
    }
    ?>

</div>