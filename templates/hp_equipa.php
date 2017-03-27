	<div class="abc-container abc-padding-64 abc-center">
		<h2>EQUIPA</h2>
		<p>Saiba quem somos</p>
		
		    <?
                $closed = true;
                $count = 0;
                $rowIndex = 0;
                $first = true;
            	foreach($team as $member){
                	
                    if($count == 0){
                		$closed = false;
                		?>
                		<div data-index="<?=$rowIndex?>" class="abc-row <?if(!$first){?>abc-hide<?}?>"><br>
                    	<div class="abc-col m2">
                        	<i class="fa fa-chevron-left abc-team-chevron" data-to="<?=$rowIndex-1?>"></i>
                    	</div>	
                    		
                        <?
            		}
            		$count++;
            ?>
        		
            		<div class="abc-col m2">
                		<a href="/equipa/<?=$member['id']?>" style="text-decoration: none">
                        <div class="abc-hover-opacity abc-team-member" style="background:url('/image/team/<?=$member['id']?>')"></div>
                		<h3><?=utf8_decode($member['name'])?></h3>
                		</a>
            		</div>
            <?
        		    if($count == 4){
            		    $closed = true;
            		    $count = 0;
            		    $rowIndex++;
                		?>
                		<div class="abc-col m2">
                        	<i class="fa fa-chevron-right abc-team-chevron" data-to="<?=$rowIndex?>"></i>
                    	</div>
                    	</div>
                    	<?
            		}
            		$first=false;
                }
                if(!$closed){
        		$rowIndex++;
                for ($k = 0 ; $k < 4-$count; $k++){ 
                    ?>
                    <div class="abc-col m2">&nbsp;</div>
                    <?
                }
        		?>
        		<div class="abc-col m2">
                	<i class="fa fa-chevron-right abc-team-chevron" data-to="<?=$rowIndex?>"></i>
            	</div>
            	</div>
            	<?
    		}
    		?>                

	</div>