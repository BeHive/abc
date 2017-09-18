<footer class="footer">


    <div class="contacts">
        <div>
            <div class="big"><?= $lang == 'pt' ? 'Contactos' : 'Contacts' ?></div>
            <div class="" style="font-size: 10px;">
                <p>
                    ABC Legal – Sociedade de Advogados, RL<br>
                <address>Avenida Conselheiro Fernando de Sousa 19 B-C<br>
                    1070-072 Lisboa - Portugal
                </address>
            </div>
        </div>
        <div>
            <div class="big">
                <span class="">&nbsp;</span>
            </div>
            <div class="" style="font-size: 10px">
                <p>
                    Tel. <a href="tel:+351213584480">+351 21 358 44 80</a><br>
                    Fax.<a href="tel:+351213584489">+351 21 358 44 89</a>
                    <a href="mailto:abclegal@abclegal.com.pt">abclegal@abclegal.com.pt</a>
            </div>
        </div>
    </div>
    <div class="map">
        <!-- Google Maps -->
        <div id="googleMap" style="width:100%;height:160px;"></div>
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA0jsnxAwcFb9lRN6NOMnskdxpWdkFCQqc"></script>
        <script>
            var myCenter = new google.maps.LatLng(38.7259378, -9.1610237);

            function initialize() {
                var mapProp = {
                    center: myCenter,
                    zoom: 17,
                    scrollwheel: false,
                    draggable: false,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                var marker = new google.maps.Marker({
                    position: myCenter,
                });
                marker.setMap(map);
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </div>
    <div class="social">
        <div class="">
            <h4><?= $lang == 'pt' ? 'Siga-nos nas redes sociais' : 'Follow us on Social Media' ?></h4>
            <? if(isset($data['social']['facebook']) && $data['social']['facebook'] != "") { ?>
                <a class="socialIcon" rel="nofollow" target=_blank
                   href="http://www.facebook.com/<?= $data['social']['facebook'] ?>" title="Facebook"><i
                            class="fa fa-facebook"></i></a>
            <? } ?>
            <? if(isset($data['social']['twitter']) && $data['social']['twitter'] != "") { ?>
                <a class="socialIcon" rel="nofollow" href="http://www.twitter.com/<?= $data['social']['twitter'] ?>"
                   title="Twitter"><i class="fa fa-twitter"></i></a>
            <? } ?>
            <? if(isset($data['social']['google']) && $data['social']['google'] != "") { ?>
                <a class="socialIcon" rel="nofollow" href="https://plus.google.com/<?= $data['social']['google'] ?>"
                   title="Google +"><i class="fa fa-google-plus"></i></a>
            <? } ?>
            <? if(isset($data['social']['linkedin']) && $data['social']['linkedin'] != "") { ?>
                <a class="socialIcon" rel="nofollow" target=_blank
                   href="https://www.linkedin.com/company/<?= $data['social']['linkedin'] ?>" title="Linkedin"><i
                            class="fa fa-linkedin"></i></a>
            <? } ?>
        </div>
        <div class="">
            <a class="disclaimer" href="/disclaimer<?= $lang == 'pt' ? '' : '?lang=en' ?>">disclaimer</a>
        </div>
    </div>
</footer>

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

    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-100335380-1', 'auto');
    ga('send', 'pageview');

</script>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="/assets/js/jquery.slides.js"></script>
<script src="/assets/js/abc-fe.js"></script>

<div id="bolachas"
     style="display:none;width: 100%;height: 5em;background-color: #4ebead;position: fixed;bottom: 0;z-index: 99999;line-height: 1em;">
    <div style="width: 100%;text-align: center;position: absolute;top: 0.5em;padding-top: 0.5em;padding-bottom: 0.5em;">
        <strong>ATENÇÃO:</strong> Este site utiliza cookies.
        <p>Ao navegar no site estará a consentir a sua utilização.</p>
        <p><a href="/politica-de-cookies">Saiba mais sobre o uso de cookies.</a></p>
    </div>

    <div style="position: absolute;right: 0.5em;top: 0.5em;">
        <i class="fa fa-times" aria-hidden="true"
           onclick='document.querySelector("#bolachas").outerHTML = "";localStorage.setItem("ABCCookie",true);'></i>
    </div>
</div>

<script>
    if (!localStorage.getItem("ABCCookie")) {
        document.querySelector("#bolachas").style.display = "block";
    }
</script>

</body>
</html>