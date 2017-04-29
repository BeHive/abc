	<? include "header.php" ?>


<!-- Sidenav/menu -->
<? include "menu.php" ?>

<!-- !PAGE CONTENT! -->
<div class="abc-main" style="margin-left:300px;margin-top:43px;">
  <!-- Header -->

  <header class="abc-container" style="padding-top:22px">
    <h5><b><i class="fa fa-university"></i> Editar <?=utf8_decode($sociedade['titulo'])?></b></h5>
  </header>

<div class="abc-container">
<form action="/admin/sociedade/edit/<?=$sociedade['id']?>" method="post" enctype="multipart/form-data" onsubmit="doSave()">

    <p><input class="abc-input abc-padding-16 abc-border" type="text" placeholder="Título" required="" value="<?=utf8_decode($sociedade['titulo'])?>" name="title"></p>
    <p><input class="abc-input abc-padding-16 abc-border" type="text" placeholder="Título" required="" value="<?=utf8_decode($sociedade['titulo_en'])?>" name="title_en"></p>

    <p>
        Descrição completa
        <textarea class="abc-input abc-padding-16 abc-border" id="item-description" name="description" type="text" placeholder="" maxlength="20000" value="">
		<?=utf8_decode($sociedade['description'])?></textarea>
    </p>
    <p>
        Descrição completa em inglês
        <textarea class="abc-input abc-padding-16 abc-border" id="item-description_en" name="description_en" type="text" placeholder="" maxlength="20000" value="">
		<?=utf8_decode($sociedade['description_en'])?></textarea>
    </p>
	<p><button class="abc-btn abc-padding abc-teal abc-right abc-margin" type="submit"><i class="fa fa-floppy-o"></i> Gravar</button></p>

</form>
</div>

  <!-- End page content -->
</div>
<script>
	function doSave(){
		tinymce.triggerSave();
		return true;
	}
</script>
<? include "footer.php" ?>