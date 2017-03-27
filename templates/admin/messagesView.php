	<? include "header.php" ?>


<!-- Sidenav/menu -->
<? include "menu.php" ?>

<!-- !PAGE CONTENT! -->
<div class="abc-main" style="margin-left:300px;margin-top:43px;">
    
	<header class="abc-container" style="padding-top:22px">
		<h5><b><i class="fa fa-envelope"></i> Mensagem</b></h5>
	</header>
    
    <div class="abc-container">
 
    	<p><h2>Data:</h2><input class="abc-input abc-padding-16 abc-border" type="text" readonly value="<?=utf8_decode($message['date'])?>" name="date"></p>
    	<p><h2>Nome:</h2><input class="abc-input abc-padding-16 abc-border" type="text" readonly value="<?=utf8_decode($message['name'])?>" name="name"></p>
    	<p><h2>Email:</h2><input class="abc-input abc-padding-16 abc-border" type="text" readonly value="<?=utf8_decode($message['email'])?>" name="email"></p>
    	<p><h2>Mensagem:</h2><textarea class="abc-input abc-padding-16 abc-border" readonly name="body" style="resize: vertical;" rows="15"><?=utf8_decode($message['body'])?></textarea></p>
        <p><a href="mailto:<?=utf8_decode($message['email'])?>?subject=Resposta de contacto via site&body=<?=rawurlencode(utf8_decode($message['body']))?>" class="abc-btn abc-padding abc-teal abc-right abc-margin"><i class="fa fa-reply"></i> Responder</a></p>
        
    </div>

  <!-- End page content -->
</div>

<? include "footer.php" ?>