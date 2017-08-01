<? include "header.php" ?>

    <div class="comMenu">
        <a class="<?= $subtype == 'blog' ? 'comActive' : '' ?>" href="/comunicacao<?= $lang == 'pt' ? '' : '?lang=en' ?>">Blog</a>
        <a class="<?= $subtype == 'news' ? 'comActive' : '' ?>" href="/noticias<?= $lang == 'pt' ? '' : '?lang=en' ?>">Notícias</a>
    </div>

    <div class="comunicacao">

        <?
        $limit = 5;
        $currentPage = 1;
        if(isset($_GET['p']) && is_numeric(intval($_GET['p']))) {
            $currentPage = intval($_GET['p']);
        }

        $startPos = ($currentPage * $limit) - $limit;
        $articleNr = count($blog);
        $totalPages = $articleNr / $limit;

        if($articleNr % $limit > 0) {
            $totalPages += 1;
        }

        $blog = array_slice($blog, $startPos, $limit);

        ?>
        <?php

        if(count($blog) > 0){

        foreach($blog as $k => $v) {
            ?>

            <div class="section">
                <div class="date"><?= substr($v['date'], 0, 10) ?></div>
                <div class="sectionTitle"><?= utf8_decode($v['title']) ?></div>
                <div class="sectionBody">

                    <?= utf8_decode($v['text']) ?>

                </div>
                <div class="sectionLink">
                    <a href="/<?= $subtype == 'blog' ? 'comunicacao' : 'noticias' ?>/<?= $v['id'] ?><?= $lang == 'pt' ? '' : '?lang=en' ?>">
                        <?= $lang == 'pt' ? 'Ler mais' : 'Read more' ?>
                    </a>
                </div>
            </div>


            <?
        }
        ?>

        <? if($totalPages > 1) { ?>
            <div class="section">
                <ul class="pagination">
                    <?
                    for($i = 1; $i <= $totalPages; $i++) {
                        ?>



                        <li <? if($currentPage == $i){?>class="currentPage"<?}?>  ><a href="/<?= $subtype == 'blog' ? 'comunicacao' : 'noticias' ?>?p=<?=$i?><?= $lang == 'pt' ? '' : '&lang=en' ?>"><?=$i?></a></li>
                        <?
                    }
                    ?>
                </ul>
            </div>
        <? } ?>
            <? }
            else{?>

                <div class="section">
                    <?if($lang == 'pt'){?>
                        <div class="sectionTitle">Pedimos desculpa mas não existem conteúdos a apresentar.</div>
                    <?}else{?>
                        <div class="sectionTitle">We are sorry, but currently there are no contents to show you.</div>
                    <?}?>
                </div>

            <?}?>
    </div>
<? include "footer.php" ?>