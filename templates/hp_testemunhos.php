
	<!-- Testemunhos -->
	<div style="margin:0 -16px">
		<div class="abc-center abc-padding-64">
			<span class="abc-xlarge abc-bottombar abc-border-dark-grey abc-padding-16"><?=$lang=='pt'?'Testemunhos':'Testimonials'?></span>
		</div>
        
        <?
        $db = $data['db'];
        $sth = $db->prepare('SELECT id,name,description,caption FROM testemunhos');
    	$sth->execute(array());
    	$testemunhos = $sth->fetchAll();
        
        $count = 0;
        $first = true;
        foreach($testemunhos as $value){
            $count+=1;
            if($count == 1){?>
                <div class = 'abc-row-padding abc-justify '>
            <?}?>
            
        	<div class="abc-third abc-margin-bottom">
    			<div class="abc-card-4" style="overflow: hidden;background-color: #fff">
    				<img src="/image/testemunhos/<?=$value['id']?>" alt="<?=utf8_decode($value['name'])?>" style="width:100%">
    				<div class="abc-container" style="width:100%">
    					<h3 style="color:#171717"><?=utf8_decode($value['name'])?></h3>
    					<div class="abc-testemunho-corpo"><?=utf8_decode($value['description'])?></div>
    					<div class="abc-testemunho-botao">
	    					<p>
	    						<a href="/testemunhos/<?=$value['id']?>">
		    						<button class="abc-btn"><?=$lang=='pt'?'Ver mais':'Read more'?></button>
	    						</a>
							</p>
						</div>
    				</div>
    			</div>
    		</div>
            
            <?if($count == 3){
                $count = 0;
            ?>
            </div>
            <?}
        }?>
	</div>
	<!-- Testemunhos -->
