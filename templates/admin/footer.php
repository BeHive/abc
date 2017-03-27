		<!-- Footer -->

		
		<script>
		// Get the Sidenav
		var mySidenav = document.getElementById("mySidenav");
		
		// Get the DIV with overlay effect
		var overlayBg = document.getElementById("myOverlay");

		// Toggle between showing and hiding the sidenav, and add overlay effect
		function abc_open() {
		    if (mySidenav.style.display === 'block') {
		        mySidenav.style.display = 'none';
		        overlayBg.style.display = "none";
		    } else {
		        mySidenav.style.display = 'block';
		        overlayBg.style.display = "block";
		    }
		}
		
		// Close the sidenav with the close button
		function abc_close() {
		    mySidenav.style.display = "none";
		    overlayBg.style.display = "none";
		}
		
		function setMenu(menu){
			Ink.Dom.Css.removeClassName(Ink.s("nav .abc-blue"),"abc-blue");
			Ink.Dom.Css.addClassName(Ink.s("nav [data-menu='"+menu+"']"),"abc-blue");
		}
		</script>
		<script type="text/javascript" src="/assets/js/InkRoute.js"></script>
		<script type="text/javascript" src="/assets/js/abc.js"></script>
	</body>
</html>
