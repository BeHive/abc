	<? include "header.php" ?>
	
	<div style="margin-top: 4em;">
		<div class="abc-row-padding abc-light-grey abc-padding-64 abc-container">
			<div class="abc-content">
				<div class="abc-third abc-center" style="padding-top:5em">
					<img class="abc-card-8" src="/image/team/<?=$member['id']?>" alt="<?=utf8_decode($member['name'])?>" style="width:80%">
				</div>
				
				<div class="abc-twothird">
					<h1><?=utf8_decode($member['name'])?></h1>
					<h3><?=$member['position']?></h3>
					<p><?=utf8_decode($member['description'])?></p>
				</div>
			</div>
		</div>
		
        
	</div>
	<? include "footer.php" ?>