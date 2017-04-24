
    <? include "header.php" ?>


    <div class="testimonial">
        <img src="/image/team/<?= $member['id'] ?>" alt="<?= utf8_decode($member['name']) ?>">

        <div id="testemunho" class="section">
            <span class="sectionTitle"><?=utf8_decode($member['name'])?></span>
            <div class="sectionBody">
                <h3><?=$member['position']?></h3>
                <p>&nbsp;</p>
                <?=utf8_decode($member['description'])?>
            </div>
        </div>

    </div>


    <? include "footer.php" ?>
