	<? include "header.php" ?>
			
		<div id="id01" class="abc-modal" style="display:block;">
			<div class="abc-modal-content abc-card-8 abc-animate-top">
				<header class="abc-container abc-teal">
					<img src="/assets/images/ABCLEGAL.png">
				</header>
				<div class="abc-container abc-padding-48">
					
					<? include "alerts.php" ?>
												
					<div class="abc-third abc-container"></div>
					<div class="abc-third abc-container ">
						<form method="POST" action="/admin/login">
							<p>Email: </p>
							<p><input type="text" name="user"></p>
							<p>Password:</p>
							<p><input type="password" name="pwd"></p>
							<button type="submit" class="abc-btn abc-theme"><i class="fa fa-sign-in"></i> &nbsp;Login</button>
						</form>
					</div>
					<div class="abc-third abc--container"></div>
				</div>
				<footer class="abc-container abc-teal">
					<p><i class="fa fa-copyright" aria-hidden="true"></i>&nbsp;&nbsp;ABC Legal</p>
				</footer>
			</div>
		</div>
	<? include "footer.php" ?>