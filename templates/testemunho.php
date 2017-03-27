	<? include "header.php" ?>
	
	<div style="margin-top: 4em;">
		<div class="abc-row-padding abc-light-grey abc-padding-64 abc-container">
			<div class="abc-content">
				<div class="abc-third abc-center" style="padding-top:5em">
					<img class="abc-card-8" src="/image/testemunhos/<?=$testemunho['id']?>" alt="<?=utf8_decode($testemunho['name'])?>" style="width:80%">
				</div>
				
				<div class="abc-twothird">
					<h1><?=utf8_decode($testemunho['name'])?></h1>
					<h3><?=utf8_decode($testemunho['caption'])?></h3>
					<p><?=utf8_decode($testemunho['description'])?></p>
				</div>
			</div>
		</div>
		
        
	</div>
	<? include "footer.php" ?>