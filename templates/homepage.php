	<? include "header.php" ?>
<script>
    var imageList = [];
    <?
    $pictureList = json_decode($blocos["pictureList"]);
    foreach($pictureList as $k => $v){
        ?>
        imageList.push("<?=$v?>");
        <?
    }
    ?>
</script>

	<div id="photoslide"></div>
	
	<div>
		<!--
		1º Secção -  A Sociedade:
		Dizer quando foi constituída, a nossa visão, missão e valores, etc, etc..
		
		2º Secção - Áreas de Prática:
		Adoro! Dá para fazermos uma pequena introdução e depois escrever algo em cada Área de Prática. Boa! São bastantes áreas de prática. Temos de ver como ficam visualmente.
		
		3º Secção- Equipa
		Gosto da forma como fizeste.  
		
		4º Secção - Agendamento de Reunião (?) Formulário
		Um pequeno formulário (Nome: Email: Mensagem). 
		
		5º Secção - Contactos
		Contactos e Mapa Google. Check!
		-->
		<!-- sociedade -->
        <div class="zoneLight">
			<div class="abc-content abc-container">
                <? include 'hp_sociedade.php' ?>
			</div>
		</div>
		<!-- sociedade -->
		
		<div class="zoneSplitter toDark">
            <div class="left"></div>
            <div class="right"></div>
        </div>
        
		<!-- sociedade -->
        <div class="zoneDark">
			<div class="abc-content abc-container">
                <? include 'hp_filosofia.php' ?>
			</div>
		</div>
		<!-- sociedade -->
		
		<div class="zoneSplitter fromDark">
            <div class="left"></div>
            <div class="right"></div>
        </div>
        
		<!-- sociedade -->
        <div class="zoneLight">
			<div class="abc-content abc-container">
                <? include 'hp_beliefs.php' ?>
			</div>
		</div>
		<!-- sociedade -->
		
		<div class="zoneSplitter toDark">
            <div class="left"></div>
            <div class="right"></div>
        </div>
        
		<!-- areas de pratica -->
        <div class="zoneDark">
			<div class="abc-container">
				<? include 'hp_areas_de_pratica.php' ?>
			</div>
		</div>
		<!-- areas de pratica -->


		<div class="zoneSplitter fromDark">
            <div class="left"></div>
            <div class="right"></div>
        </div>

		<!-- agendamentos -->
        <div class="zoneLight">
			<div class="abc-content abc-container">
                <? include 'hp_agendamentos.php' ?>
			</div>
		</div>
		<!-- agendamentos -->
		        
	</div>
	<? include "footer.php" ?>