

		<script>
	        function openMenu(evt, menuName) {
				var i, x, tablinks;
				x = document.getElementsByClassName("menu");
				for (i = 0; i < x.length; i++) {
					x[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablink");
				for (i = 0; i < x.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" abc-dark-grey", "");
				}
				document.getElementById(menuName).style.display = "block";
				evt.currentTarget.firstElementChild.className += " abc-dark-grey";
			}
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-87277362-1', 'auto');
		  ga('send', 'pageview');
		
		</script>





        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="assets/js/jquery.slides.js"></script>
        <script src="assets/js/abc-fe.js"></script>


        </body>
        </html>