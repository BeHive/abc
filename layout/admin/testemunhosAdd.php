	<? include "header.php" ?>


<!-- Sidenav/menu -->
<? include "menu.php" ?>

<!-- !PAGE CONTENT! -->
<div class="abc-main" style="margin-left:300px;margin-top:43px;">
  <!-- Header -->
  <header class="abc-container" style="padding-top:22px">
    <h5><b><i class="fa fa-comments-o"></i> Adicionar novo membro</b></h5>
  </header>

<div class="abc-container">
<form action="/admin/testimonials/add" method="post" enctype="multipart/form-data" onsubmit="doSave()">
    
	<p><input class="abc-input abc-padding-16 abc-border" type="text" placeholder="Nome" required="" name="name"></p>
	<p><input class="abc-input abc-padding-16 abc-border" type="text" placeholder="Legenda" required="" name="caption"></p>
	<p>
		<input class="abc-input abc-padding-16 abc-border" style="background-color: #fff;" type="file" name="fileToUpload" required>
	</p>
	
	<p>
		<textarea class="abc-input abc-padding-16 abc-border" id="item-description" name="description" type="text" placeholder="" maxlength="20000" value=""></textarea>
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