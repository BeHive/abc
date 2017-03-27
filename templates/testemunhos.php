	<? include "header.php" ?>
	
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
        
		<!-- areas de pratica -->
        <div class="zoneDark">
			<div class="abc-content abc-container">
				<? include 'hp_areas_de_pratica.php' ?>
			</div>
		</div>
		<!-- areas de pratica -->
		
        <div class="zoneSplitter fromDark">
            <div class="left"></div>
            <div class="right"></div>
        </div>

		<!-- team -->
        <div class="zoneLight">
			<div class="abc-content abc-container">
                <? include 'hp_equipa.php' ?>
			</div>
		</div>
		<!-- team -->
		
		<div class="zoneSplitter toDark">
            <div class="left"></div>
            <div class="right"></div>
        </div>

		<!-- agendamentos -->
        <div class="zoneDark">
			<div class="abc-content abc-container">
                <? include 'hp_agendamentos.php' ?>
			</div>
		</div>
		<!-- agendamentos -->
		




		<!-- Recrutamento -->
		<div class="zoneDark">
			<div class="abc-content abc-container">
			<? include 'hp_recrutamento.php' ?>
			</div>
		</div>
        <!-- Recrutamento -->
        
        <div class="zoneSplitter fromDark">
            <div class="left"></div>
            <div class="right"></div>
        </div>
        
		<!-- Testemunhos -->
		<div class="zoneLight">
			<div class="abc-content abc-container">
			<? include 'hp_testemunhos.php' ?>
			</div>
		</div>
        <!-- Testemunhos -->
        
	</div>
	<? include "footer.php" ?>