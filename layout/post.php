<? include "header.php" ?>

<div class="post">
    <div class="section">
        <div class="date"><?= substr($blog['date'], 0, 10) ?></div>
        <div class="sectionTitle"><?= utf8_decode($blog['title']) ?></div>
        <p>&nbsp;</p>
        <div class="author">por: <?= utf8_decode($blog['author']) ?></div>
        <div class="sectionBody">
            <?= utf8_decode($blog['text']) ?>
        </div>
    </div>

</div>

<? include "footer.php" ?>