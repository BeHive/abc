<? include "header.php" ?>


    <div class="teamSearch">
        <div class="searchControls">
            <input type="search" id="teamSearch"><i class="fa fa-search" aria-hidden="true"></i>
        </div>
    </div>

    <div class="teamLetterList">
        <span data-letter="a">a</span>
        <span data-letter="b">b</span>
        <span data-letter="c">c</span>
        <span data-letter="d">d</span>
        <span data-letter="e">e</span>
        <span data-letter="f">f</span>
        <span data-letter="g">g</span>
        <span data-letter="h">h</span>
        <span data-letter="i">i</span>
        <span data-letter="j">j</span>
        <span data-letter="k">k</span>
        <span data-letter="l">l</span>
        <span data-letter="m">m</span>
        <span data-letter="n">n</span>
        <span data-letter="o">o</span>
        <span data-letter="p">p</span>
        <span data-letter="q">q</span>
        <span data-letter="r">r</span>
        <span data-letter="s">s</span>
        <span data-letter="t">t</span>
        <span data-letter="u">u</span>
        <span data-letter="v">v</span>
        <span data-letter="w">w</span>
        <span data-letter="x">x</span>
        <span data-letter="y">y</span>
        <span data-letter="z">z</span>
    </div>

    <div class="teamList">
    </div>

<?= $teamDisclaimer['text'] ?>

<!--
    <div class="section">
        <span class="sectionTitle"><?= $lang == 'pt' ? 'EQUIPA' : 'TEAM' ?></span>
        <div class="sectionBody">
            <?= $lang == 'pt' ? 'Saiba quem somos' : 'Get to know us' ?>
        </div>
    </div>

-->


    <script>
        var members = [

            <?foreach ($team as $member) {?>
            {'id': '<?=$member['id']?>', 'name': '<?=$member['name']?>', 'position': '<?=$member['position']?>'},
            <?}?>
        ]

    </script>

<? include "footer.php" ?>

<script>
    members.forEach(function(elm){
        var tokens = elm.name.split(" ");

        tokens.forEach(function(name){
            $("[data-letter='"+name.charAt(0).toLowerCase()+"']").addClass("hasPeople");
        });

    })
</script>
