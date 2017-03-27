	<? include "header.php" ?>


<!-- Sidenav/menu -->
<? include "menu.php" ?>

<!-- !PAGE CONTENT! -->
<div class="abc-main" style="margin-left:300px;margin-top:43px;">
  <!-- Header -->
  <header class="abc-container" style="padding-top:22px">
    <h5><b><i class="fa fa-home"></i> Blocos de Homepage </b></h5>
  </header>
    <div class="abc-container abc-padding">
        <? include "alerts.php" ?>
    </div>
<div class="abc-container">
<form action="/admin/homepage?>" method="post" enctype="multipart/form-data" onsubmit="doSave()">

    <p>
        Adicionar foto
        <input type="hidden" name="pictureList">
        <input id="fotoUpload" type='file'>
        <div id="listaImagens" class="abc-row">

        <?
        $pictureList = json_decode($hp['pictureList'],true);
        foreach($pictureList as $k => $v){
            ?>
            <span class="abc-quarter">
                <span class="imageDeleteButton">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </span>
                <img src="<?=$v?>" style="width: 100%;">
            </span>
            <?
        }
        ?>

        </div>
    </p>


    <p>
        Texto para 'A Sociedade'
        <textarea class="abc-input abc-padding-16 abc-border" id="item-sociedade" name="sociedade" type="text" placeholder="" maxlength="20000" value="">
		<?=utf8_decode($hp['sociedade'])?></textarea>
    </p>
    <p>
        Texto para 'A Sociedade' em inglês
        <textarea class="abc-input abc-padding-16 abc-border" id="item-sociedade_en" name="sociedade_en" type="text" placeholder="" maxlength="20000" value="">
		<?=utf8_decode($hp['sociedade_en'])?></textarea>
    </p>
    <p>
        Texto para 'A nossa filosofia'
        <textarea class="abc-input abc-padding-16 abc-border" id="item-filosofia" name="filosofia" type="text" placeholder="" maxlength="20000" value="">
		<?=utf8_decode($hp['filosofia'])?></textarea>
    </p>
    <p>
        Texto para 'A nossa filosofia' em inglês
        <textarea class="abc-input abc-padding-16 abc-border" id="item-filosofia_en" name="filosofia_en" type="text" placeholder="" maxlength="20000" value="">
		<?=utf8_decode($hp['filosofia_en'])?></textarea>
    </p>
    <p>
        Texto para 'Áreas de prática'
        <textarea class="abc-input abc-padding-16 abc-border" id="item-areas" name="areas" type="text" placeholder="" maxlength="20000" value="">
		<?=utf8_decode($hp['areas'])?></textarea>
    </p>
    <p>
        Texto para 'Áreas de prática' em inglês
        <textarea class="abc-input abc-padding-16 abc-border" id="item-areas_en" name="areas_en" type="text" placeholder="" maxlength="20000" value="">
		<?=utf8_decode($hp['areas_en'])?></textarea>
    </p>
    <p><button class="abc-btn abc-padding abc-teal abc-right abc-margin" type="submit"><i class="fa fa-floppy-o"></i> Gravar</button></p>

</form>
</div>

  <!-- End page content -->
</div>
<script>
	function doSave(){

        var imageArray=[];
        document.querySelector("#listaImagens").querySelectorAll("img").forEach(function(elm){imageArray.push(elm.src)})
        JSON.stringify(imageArray);
        document.querySelector("[name='pictureList']").value = JSON.stringify(imageArray);
		tinymce.triggerSave();
		return true;
	}
</script>
<? include "footer.php" ?>