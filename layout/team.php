	<? include "header.php" ?>
	
		<div>
		<!-- Recrutamento -->
		<div class="zoneLight">
			<div class="abc-content abc-container abc-padding-64">
				
                <h1><?=$lang=='pt'?'EQUIPA':'TEAM'?></h1>
        		<p><?=$lang=='pt'?'Saiba quem somos':'Get to know us'?></p>
        		
        		
        		<?
                
                $closed = true;
                foreach($positions as $pos){
                    if(!$closed){
                        $closed = true;
                        ?></div><?
                    }
                ?>
            	
            	<h2 class="abc-center abc-border-bottom abc-border-teal">
                	<?=$lang=='pt'?$pos['name']:$pos['name_en']?>
            	</h2>
            		<?
                		$count = 0;
            		foreach($team as $member){
                		if($member['position'] == $pos['id']){
                    		if($count == 0){
                        		$closed = false;
                        		?><div class="abc-row"><br><?
                    		}
                    		$count++;
                		?>
                		
                		<div class="abc-quarter abc-padding-medium abc-left-align">
                    		<a href="/equipa/<?=$member['id']?><?=$lang=='pt'?'':'?lang=en'?>" style="text-decoration: none">
                            <div class="abc-hover-opacity abc-team-member" style="background:url('/image/team/<?=$member['id']?>')"></div>
                    		<h3><?=utf8_decode($member['name'])?></h3>
                    		</a>
                		</div>
                		<?
                		    if($count == 4){
                    		    $closed = true;
                    		    $count = 0;
                        		?></div><?
                    		}
                        }
            		}?>                
                
        		<?}?>
    
			</div>
		</div>
	</div>
	<? include "footer.php" ?>