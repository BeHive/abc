

<? if(isset($_SESSION['flash']) && isset($_SESSION['flash']['type']) && isset($_SESSION['flash']['message'])){ ?>

	<div class="abc-padding abc-<?=$_SESSION['flash']['type']?>">
		<span onclick="this.parentElement.style.display='none'" class="abc-closebtn">
			<i class="fa fa-remove"></i>
		</span>
		<h4><?=$_SESSION['flash']['message']?></h4>
	</div>

<?
	unset($_SESSION['flash']);
	}?>