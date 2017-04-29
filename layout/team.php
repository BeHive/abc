<? include "header.php" ?>


    <div class="teamSearch">
        <div class="searchControls">
            <input type="search" id="teamSearch"><i class="fa fa-search" aria-hidden="true"></i>
        </div>
    </div>


<?= $teamDisclaimer['text'] ?>

    <div class="section">
        <span class="sectionTitle"><?= $lang == 'pt' ? 'EQUIPA' : 'TEAM' ?></span>
        <div class="sectionBody">
            <?= $lang == 'pt' ? 'Saiba quem somos' : 'Get to know us' ?>
        </div>
    </div>


    <div class="teamList">
    </div>

    <script>
        var members = [

            <?foreach ($team as $member) {?>
            {'id': '<?=$member['id']?>', 'name': '<?=$member['name']?>', 'position': '<?=$member['position']?>'},
            <?}?>
        ]

    </script>

<? include "footer.php" ?>