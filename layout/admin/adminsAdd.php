	<? include "header.php" ?>


<!-- Sidenav/menu -->
<? include "menu.php" ?>

<!-- !PAGE CONTENT! -->
<div class="abc-main" style="margin-left:300px;margin-top:43px;">
  <!-- Header -->
  <header class="abc-container" style="padding-top:22px">
    <h5><b><i class="fa fa-cog"></i> Adicionar novo membro</b></h5>
  </header>

<div class="abc-container">
<form action="/admin/admins/add" method="post" enctype="multipart/form-data">
    
	<p><input class="abc-input abc-padding-16 abc-border" type="text" placeholder="Nome" required="" name="name"></p>
	<p><input class="abc-input abc-padding-16 abc-border" type="text" placeholder="Email" required="" name="email"></p>
	<p><input class="abc-input abc-padding-16 abc-border" type="password" placeholder="Password" required="" name="password"></p>
	
	<p><button class="abc-btn abc-padding abc-teal abc-right abc-margin" type="submit"><i class="fa fa-floppy-o"></i> Gravar</button></p>

</form>
</div>

  <!-- End page content -->
</div>

<? include "footer.php" ?>