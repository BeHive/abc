	<? include "header.php" ?>


<!-- Sidenav/menu -->
<? include "menu.php" ?>

<!-- !PAGE CONTENT! -->
<div class="abc-main" style="margin-left:300px;margin-top:43px;">

	<!-- Header -->
	<header class="abc-container" style="padding-top:22px">
		<h5><b><i class="fa fa-envelope"></i> Mensagens</b></h5>
	</header>
	
	<div class="abc-container abc-padding">
		<? include "alerts.php" ?>
	</div>
	
	<div class="abc-container">

		<ul class="abc-ul abc-card-4 abc-white">
			
			<? foreach($messages as $message){?>
					<li class="abc-padding-16" data-id="<?=$message['id']?>">
						<a href="/admin/messages/view/<?=$message['id']?>" style="text-decoration: none;">
    					    <span class="abc-closebtn abc-padding abc-medium"><?=$message['date']?></span>
							<span class="abc-xlarge" style="display:block"><i class="fa <?if($message['read']==0){echo("fa-envelope");}else{echo("fa-envelope-open-o");}?>"></i> <?=utf8_decode($message['name'])?></span>
						</a>
					</li>
			<?}?>
			
		</ul>

	</div>
	<hr>


  <!-- End page content -->
</div>
<? include "footer.php" ?>