	<? include "header.php" ?>


<!-- Sidenav/menu -->
<? include "menu.php" ?>

<!-- !PAGE CONTENT! -->
<div class="abc-main" style="margin-left:300px;margin-top:43px;">
  <!-- Header -->
  <header class="abc-container" style="padding-top:22px">
    <h5><b><i class="fa fa-users"></i> Adicionar nova Área de prática</b></h5>
  </header>

<div class="abc-container">
<form action="/admin/areas/add" method="post" enctype="multipart/form-data" onsubmit="doSave()">

    <p><input class="abc-input abc-padding-16 abc-border" type="text" placeholder="Nome" required="" name="title"></p>
    <p><input class="abc-input abc-padding-16 abc-border" type="text" placeholder="Nome em Inglês" required="" name="title_en"></p>

    <p>
        Descrição para homepage
        <textarea class="abc-input abc-padding-16 abc-border" id="item-short_desc" name="short_desc" type="text" placeholder="" maxlength="250" value=""></textarea>
    </p>

    <p>
        Descrição para homepage em inglês
        <textarea class="abc-input abc-padding-16 abc-border" id="item-short_desc_en" name="short_desc_en" type="text" placeholder="" maxlength="250" value=""></textarea>
    </p>

    <p>
        Descrição completa
        <textarea class="abc-input abc-padding-16 abc-border" id="item-description" name="description" type="text" placeholder="" maxlength="20000" value=""></textarea>
    </p>

    <p>
        Descrição completa em inglês
        <textarea class="abc-input abc-padding-16 abc-border" id="item-description_en" name="description_en" type="text" placeholder="" maxlength="20000" value=""></textarea>
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