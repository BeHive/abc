	<? include "header.php" ?>


<!-- Sidenav/menu -->
<? include "menu.php" ?>

<!-- !PAGE CONTENT! -->
<div class="abc-main" style="margin-left:300px;margin-top:43px;">
  <!-- Header -->
  <header class="abc-container" style="padding-top:22px">
    <h5><b><i class="fa fa-handshake-o"></i> Recrutamento </b></h5>
  </header>
    <div class="abc-container abc-padding">
        <? include "alerts.php" ?>
    </div>
<div class="abc-container">
<form action="/admin/recrutamento?>" method="post" enctype="multipart/form-data" onsubmit="doSave()">

    <p>
        Texto para 'Procuramos Valor'
        <textarea class="abc-input abc-padding-16 abc-border" id="item-valor" name="valor" type="text" placeholder="" maxlength="20000" value="">
		<?=utf8_decode($data['valor'])?></textarea>
    </p>
    <p>
        Texto para 'Procuramos Valor' em inglês
        <textarea class="abc-input abc-padding-16 abc-border" id="item-valor_en" name="valor_en" type="text" placeholder="" maxlength="20000" value="">
		<?=utf8_decode($data['valor_en'])?></textarea>
    </p>
    <p>
        Texto para 'Porquê escolher a ABC LEGAL'
        <textarea class="abc-input abc-padding-16 abc-border" id="item-razoes" name="razoes" type="text" placeholder="" maxlength="20000" value="">
		<?=utf8_decode($data['razoes'])?></textarea>
    </p>
    <p>
        Texto para 'Porquê escolher a ABC LEGAL' em inglês
        <textarea class="abc-input abc-padding-16 abc-border" id="item-razoes_en" name="razoes_en" type="text" placeholder="" maxlength="20000" value="">
		<?=utf8_decode($data['razoes_en'])?></textarea>
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