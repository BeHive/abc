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
        	<div class="abc-content abc-container">
                <? include 'hp_sociedade.php' ?>
			</div>
		<!-- sociedade -->

		<!-- filosofia -->
        	<div class="abc-content abc-container">
                <? include 'hp_filosofia.php' ?>
			</div>
		<!-- filosofia -->

        <!-- areas de pratica -->
        <div class="abc-container">
            <? include 'hp_areas_de_pratica.php' ?>
        </div>
        <!-- areas de pratica -->

        <!-- blog -->
        <div class="abc-container" style="background-color: #f2f2f2">
            <? include 'hp_comunicacao.php' ?>
        </div>
        <!-- blog -->

        <!-- agendamentos -->
        	<div class="abc-content abc-container">
                <? include 'hp_agendamentos.php' ?>
			</div>
		<!-- agendamentos -->
		        
	</div>
	<? include "footer.php" ?>