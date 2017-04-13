

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


        <script language="JavaScript">
            $(function() {

                function communistSquares() {
                    var squareHeight = 0,
                        currentSquareHeight = 0;
                    $(".square").each(function () {
                        currentSquareHeight = $(".squareTitle",$(this)).outerHeight(true);
                        currentSquareHeight += $(".squareBody",$(this)).outerHeight(true);
                        currentSquareHeight += $(".squareLink",$(this)).outerHeight(true);
                        currentSquareHeight += 40;
                        squareHeight = (currentSquareHeight > squareHeight ? currentSquareHeight : squareHeight);
                        //squareHeight = ($(this).height() > squareHeight ? $(this).height() : squareHeight);
                    });
                    $(".square").each(function () {
                        $(this).height(squareHeight);
                    });
                    $(".squareContent").each(function () {
                        $(this).height(squareHeight - 40);
                    });
                }


                $( window ).resize(function(){communistSquares()});

                communistSquares();

                $("#slider").slidesjs({
                    height: '30em',
                    navigation: {
                        active: false,
                        effect: "slide"
                    },
                    pagination: {
                        active: false
                    },
                    play: {
                        active: false,
                        // [boolean] Generate the play and stop buttons.
                        // You cannot use your own buttons. Sorry.
                        effect: "slide",
                        // [string] Can be either "slide" or "fade".
                        interval: 5000,
                        // [number] Time spent on each slide in milliseconds.
                        auto: true,
                        // [boolean] Start playing the slideshow on load.
                        swap: true,
                        // [boolean] show/hide stop and play buttons
                        pauseOnHover: false,
                        // [boolean] pause a playing slideshow on hover
                        restartDelay: 2500
                        // [number] restart delay on inactive slideshow
                    }
                });

            });
        </script>
        </body>
        </html>