	<? include "header.php" ?>


<!-- Sidenav/menu -->
<? include "menu.php" ?>

<!-- !PAGE CONTENT! -->
<div class="abc-main" style="margin-left:300px;margin-top:43px;">
  <!-- Header -->
  <header class="abc-container" style="padding-top:22px">
    <h5><b><i class="fa fa-users"></i> Adicionar novo membro</b></h5>
  </header>

<div class="abc-container">
<form action="/admin/team/edit/<?=$member['id']?>" method="post" enctype="multipart/form-data" onsubmit="doSave()">
    
	<p><input class="abc-input abc-padding-16 abc-border" type="text" placeholder="Nome" required="" value="<?=utf8_decode($member['name'])?>" name="name"></p>
	<p class="abc-col m6">
		<select class="abc-input abc-padding-16 abc-border" style="background-color: #fff;height:56px" type="file" name="position" required>
		<option value="" selected="">Escolha um cargo</option>
		<?foreach($positions as $pos){?>
			<option value="<?=$pos['id'] ?>" <? if($member['position'] == $pos['id']){?>selected<?}?>><?=$pos['name']?></option>
		<?}?>
		</select>
	</p>
	<p class="abc-col m6">
		<input class="abc-input abc-padding-16 abc-border" style="background-color: #fff;" type="file" name="fileToUpload">
	</p>
	
	<p style="padding-top: 85px;">
		<textarea class="abc-input abc-padding-16 abc-border" id="item-description" name="description" type="text" placeholder="" maxlength="20000" value="">
		<?=utf8_decode($member['description'])?></textarea>
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