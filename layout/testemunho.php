<? include "header.php" ?>


<div class="testimonial">
    <img src="/image/testemunhos/<?= $testemunho['id'] ?>" alt="<?= utf8_decode($testemunho['name']) ?>">

    <div id="testemunho" class="section">
        <span class="sectionTitle"><?= utf8_decode($testemunho['name']) ?></span>
        <div class="sectionBody">
            <h3><?= utf8_decode($testemunho['caption']) ?></h3>
            <p>&nbsp;</p>
            <?= utf8_decode($testemunho['description']) ?>
        </div>
    </div>

</div>


<? include "footer.php" ?>