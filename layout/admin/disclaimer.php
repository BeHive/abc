<? include "header.php" ?>


<!-- Sidenav/menu -->
<? include "menu.php" ?>

<!-- !PAGE CONTENT! -->
<div class="abc-main" style="margin-left:300px;margin-top:43px;">
    <!-- Header -->
    <header class="abc-container" style="padding-top:22px">
        <h5><b><i class="fa fa-info-circle"></i> Disclaimer </b></h5>
    </header>
    <div class="abc-container abc-padding">
        <? include "alerts.php" ?>
    </div>
    <div class="abc-container">
        <form action="/admin/disclaimer?>" method="post" enctype="multipart/form-data" onsubmit="doSave()">

            <p>
                Disclaimer
                <textarea class="abc-input abc-padding-16 abc-border" id="item-text" name="text" type="text"
                          placeholder="" maxlength="20000" value="">
		<?= utf8_decode($disclaimer['text']) ?></textarea>
            </p>
            <p>
                Disclaimer em inglês
                <textarea class="abc-input abc-padding-16 abc-border" id="item-text_en" name="text_en" type="text"
                          placeholder="" maxlength="20000" value="">
		<?= utf8_decode($disclaimer['text_en']) ?></textarea>
            </p>
            <p>
                <button class="abc-btn abc-padding abc-teal abc-right abc-margin" type="submit"><i
                            class="fa fa-floppy-o"></i> Gravar
                </button>
            </p>

        </form>
    </div>

    <!-- End page content -->
</div>
<script>
    function doSave() {
        tinymce.triggerSave();
        return true;
    }
</script>
<? include "footer.php" ?>