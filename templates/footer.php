		<!-- Footer -->
		
		<footer class="abc-theme-d1 abc-center">
			<div class="abc-row">
				<div class="abc-col abc-padding-bottom abc-small m4">
                    <div class="abc-left-align abc-margin-left abc-padding-16">
                        <span class="abc-xlarge abc-border-teal abc-bottombar"><?=$lang=='pt'?'Contactos':'Contacts'?></span>
                    </div>
                    <div class="abc-left-align abc-margin-left">
                        <span class="abc-text-teal"><?=$lang=='pt'?'Lisboa':'Lisbon'?>:</span>
                        <address>Avenida Conselheiro Fernando de Sousa 19 B-C<br>
                            1070-072 Lisboa - Portugal</address>Tel. <a href="tel:+351213584480">+351 21 358 44 80</a><br>Fax.<a href="tel:+351213584489">+351 21 358 44 89</a><p></p>

                        <span class="abc-text-teal">Torres Vedras:</span>
                        <address>Largo Irmã Benedita Vale Jordão Nº 1 Loja A<br>
                            2560-526 – Torres Vedras- Silveira</address>Tel. <a href="tel:+351261936016">+351 261 936 016</a><br>Fax.<a href="tel:+351261936018">+351 261 936 018</a><p></p>
                        <a href="mailto:abclegal@abclegal.com.pt">abclegal@abclegal.com.pt</a>
                    </div>
                    <div class="abc-row abc-left-align abc-margin-left">
                        <h4><?=$lang=='pt'?'Siga-nos nas redes sociais':'Follow us on Social Media'?></h4>
                        <?if(isset($data['social']['facebook']) && $data['social']['facebook'] != ""){?>
                            <a class="abc-btn-floating abc-teal" rel="nofollow" target=_blank href="http://www.facebook.com/<?=$data['social']['facebook']?>" title="Facebook"><i class="fa fa-facebook"></i></a>
                        <?}?>
                        <?if(isset($data['social']['twitter']) && $data['social']['twitter'] != ""){?>
                            <a class="abc-btn-floating abc-teal" rel="nofollow" href="http://www.twitter.com/<?=$data['social']['twitter']?>" title="Twitter"><i class="fa fa-twitter"></i></a>
                        <?}?>
                        <?if(isset($data['social']['google']) && $data['social']['google'] != ""){?>
                            <a class="abc-btn-floating abc-teal" rel="nofollow" href="https://plus.google.com/<?=$data['social']['google']?>" title="Google +"><i class="fa fa-google-plus"></i></a>
                        <?}?>
                        <?if(isset($data['social']['linkedin']) && $data['social']['linkedin'] != ""){?>
                            <a class="abc-btn-floating abc-teal" rel="nofollow" target=_blank href="https://www.linkedin.com/company/<?=$data['social']['linkedin']?>" title="Linkedin"><i class="fa fa-linkedin"></i></a>
                        <?}?>
                    </div>
                    <div class="abc-left abc-margin-left">
                        <a href="/disclaimer<?=$lang=='pt'?'':'?lang=en'?>">disclaimer</a>
                    </div>
                </div>

				<div class="abc-col m8">
					<!-- Google Maps -->
					<div id="googleMap" style="width:100%;height:417px;"></div>
					<script src="http://maps.googleapis.com/maps/api/js"></script>
					<script>
						var myCenter = new google.maps.LatLng(38.7259378,-9.1610237);
						function initialize() {
							var mapProp = {
								center: myCenter,
								zoom: 17,
								scrollwheel: false,
								draggable: false,
								mapTypeId: google.maps.MapTypeId.ROADMAP
							};
							var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
							var marker = new google.maps.Marker({
								position: myCenter,
							});
							marker.setMap(map);
						}
						google.maps.event.addDomListener(window, 'load', initialize);
					</script>
				</div>
			</div>
		</footer>

		<!-- Script For Side Navigation -->
		<script>
			
			// Used to toggle the menu on smaller screens when clicking on the menu button
			function openNav() {
				var x = document.getElementById("navDemo");
				if (x.className.indexOf("abc-show") == -1) {
					x.className += " abc-show";
				}
				else { 
					x.className = x.className.replace(" abc-show", "");
				}
			}
		</script>
		
		<script type="text/javascript" src="/assets/js/InkRoute.js"></script>
		<script type="text/javascript" src="/assets/js/photoslide.js"></script>
		<script type="text/javascript" src="/assets/js/abc.js"></script>
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
	</body>
</html>