<? include "header.php" ?>


<?= utf8_decode($blocos['sociedade']) ?>

    <div id="areasOuterContainer">
        <div id="areasInnerContainer" style="display: none">
            <?
            $counter = 0;
            foreach ($areas as $area) {
                ?>

                <div class="areaSquare"
                     style="background-size: cover;background-image: url('/assets/images/areas/<?= $area['id'] ?>.jpg')">
                    <div class="areaSquareContent">
                        <span class="areaSquareTitle"><?= $lang == 'pt' ? (utf8_decode($area['titulo'])) : (utf8_decode($area['titulo_en'])) ?></span>
                        <div class="areaSquareBody">
                            <?= $lang == 'pt' ? (utf8_decode($area['short_desc'])) : (utf8_decode($area['short_desc_en'])) ?>
                        </div>
                        <span class="areaSquareLink"><a
                                    href="/areas?id=<?= $area['id'] ?><?= $lang == 'pt' ? ('') : ('&lang=en') ?>">
                                <?= $lang == 'pt' ? ('Saiba mais') : ('Know more') ?> <i class="fa fa-chevron-right" aria-hidden="true"></i></a></span>
                    </div>
                </div>


                <?
            }
            ?>
        </div>
    </div>
<?= utf8_decode($blocos['areas']) ?>

<?= utf8_decode($blocos['filosofia']) ?>


    <div id="blogOuterContainer" style="overflow-x: hidden">
        <div id="blogInnerContainer">
            <?
            $counter = 0;
            foreach ($blog as $entry) {
                ?>

                <div class="blogSquare">
                    <div class="blogSquareContent">
                    <span class="blogSquareTitle"><?= substr((utf8_decode($entry['title'])), 0, 50) ?><? if (strlen((utf8_decode($entry['title']))) > 50) { ?> ...<?
                        } ?></span>
                        <span class="blogSquareDate"><p><?= substr($entry['date'], 0, 10) ?></p></span>
                        <div class="blogSquareBody">
                            <?= (utf8_decode($entry['text'])) ?>
                        </div>
                        <span class="blogSquareDots"> . . . </span>
                        <span class="blogSquareLink"><a
                                    href="/areas?id=<?= $entry['id'] ?><?= $lang == 'pt' ? ('') : ('&lang=en') ?>">
                                <?= $lang == 'pt' ? ('Saiba mais') : ('Know more') ?> <i class="fa fa-chevron-right" aria-hidden="true"></i></a></span>
                    </div>
                </div>


                <?
            }
            ?>
        </div>
    </div>

    <div id="reuniao" class="section">
        <span class="sectionTitle"><?= $lang == 'pt' ? 'Agendamento de Reunião' : 'Schedule a Meeting' ?></span>
        <div class="sectionBody">


            <form action="/reuniao" method="POST" onsubmit="return sendMessage()" id="abcReuniao">
                <input type="text" placeholder="<?= $lang == 'pt' ? 'Nome' : 'Name' ?>" required name="name">
                <input type="text" placeholder="Email" required name="email">
                <textarea rows=10 style="resize:vertical" required name="body"></textarea>
                <a onclick="sendMessage()"><?= $lang == 'pt' ? 'Enviar Mensagem' : 'Send Message' ?> <i class="fa fa-paper-plane"></i></a>
            </form>


        </div>

    </div>

    <script language="JavaScript">
        function sendMessage() {
            var email = $("#abcReuniao [name=email]").val(),
                name = $("#abcReuniao [name=name]").val(),
                body = $("#abcReuniao [name=body]").val(),
                emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

            if(email.length > 0 && emailReg.test(email) && name.length > 0 && body.length > 0) {
                $.ajax({
                    url: "/reuniao",
                    method: "POST",
                    data: {
                        email: $("#abcReuniao [name=email]").val(),
                        name : $("#abcReuniao [name=name]").val(),
                        body : $("#abcReuniao [name=body]").val()
                    },
                    success: function (data, status, hdr) {
                        $(".message").remove();
                        document.querySelector("#abcReuniao").parentElement.insertAdjacentHTML('beforebegin',
                            '<div class="message green">' +
                            '<span onclick="this.parentElement.style.display=\'none\'">' +
                            '<i class="fa fa-remove"></i>' +
                            '</span>' +
                            '<h4><?=$lang == 'pt' ? 'Mensagem enviada com sucesso' : 'Message sent'?></h4>' +
                            '</div>');
                    },
                    error: function (data, status, hdr) {
                        $(".message").remove();
                        document.querySelector("#abcReuniao").parentElement.insertAdjacentHTML('beforebegin',
                            '<div class="message red">' +
                            '<span onclick="this.parentElement.style.display=\'none\'">' +
                            '<i class="fa fa-remove"></i>' +
                            '</span>' +
                            '<h4><?=$lang == 'pt' ? 'Erro ao enviar a sua mensagem. Por favor tente novamente' : 'Error sending message. Please try again'?></h4>' +
                            '</div>');
                    }
                });
            }
            else{
                $(".message").remove();
                document.querySelector("#abcReuniao").parentElement.insertAdjacentHTML('beforebegin',
                    '<div class="message red">' +
                    '<span onclick="this.parentElement.style.display=\'none\'">' +
                    '<i class="fa fa-remove"></i>' +
                    '</span>' +
                    '<h4><?=$lang == 'pt' ? 'Todos os campos são obrigatórios' : 'All fields are mandatory'?></h4>' +
                    '</div>');
            }
            return false;

        }
    </script>

<? include "footer.php" ?>