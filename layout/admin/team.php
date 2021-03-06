<? include "header.php" ?>


    <!-- Sidenav/menu -->
<? include "menu.php" ?>

    <!-- !PAGE CONTENT! -->
    <div class="abc-main" style="margin-left:300px;margin-top:43px;">

        <div id="id01" class="abc-modal">
            <div class="abc-modal-content abc-card-8 abc-animate-top">
                <header class="abc-container abc-teal" data-type="header">
                <span onclick="document.getElementById('id01').style.display='none'" class="abc-closebtn"><i
                            class="fa fa-remove"></i></span>
                    <h4>Apagar membro de equipa</h4>
                </header>
                <div class="abc-container" data-type="body">

                </div>
                <footer class="abc-container abc-teal" data-type="footer">
                    <button class="abc-btn abc-margin abc-red abc-right" onclick="deleteMember()"><i
                                class="fa fa-ban"></i>
                        Apagar
                    </button>
                    <button class="abc-btn abc-margin abc-right"
                            onclick="document.getElementById('id01').style.display='none'"><i class="fa fa-trash-o"></i>
                        Cancelar
                    </button>
                </footer>
            </div>
        </div>

        <!-- Header -->
        <header class="abc-container" style="padding-top:22px">
            <h5><b><i class="fa fa-users"></i> Equipa</b></h5>
        </header>

        <div class="abc-container abc-padding">
            <? include "alerts.php" ?>
        </div>


        <div class="abc-container">
            <form action="/admin/team?>" method="post" enctype="multipart/form-data" onsubmit="doSave()">

                <p>
                    Texto descritivo
                    <textarea class="abc-input abc-padding-16 abc-border" id="item-text" name="text" type="text"
                              placeholder="" maxlength="20000" value="">
		<? if(isset($teamDisclaimer['text'])){echo utf8_decode($teamDisclaimer['text']);} ?></textarea>
                </p>
                <p>
                    Texto descritivo em inglês
                    <textarea class="abc-input abc-padding-16 abc-border" id="item-text_en" name="text_en" type="text"
                              placeholder="" maxlength="20000" value="">
		<? if(isset($teamDisclaimer['text_en'])){echo utf8_decode($teamDisclaimer['text_en']);} ?></textarea>
                </p>
                <p>
                    <button class="abc-btn abc-padding abc-teal abc-right abc-margin" type="submit"><i
                                class="fa fa-floppy-o"></i> Gravar
                    </button>
                </p>

            </form>
        </div>


        <div class="abc-container">
            <a href="/admin/team/add">
                <button class="abc-btn abc-teal abc-right"><i class="fa fa-plus-circle"></i> Adicionar</button>
            </a>

            <? foreach ($positions as $pos) { ?>
                <h5><?= $pos['name'] ?></h5>

                <ul class="abc-ul abc-card-4 abc-white">

                    <? foreach ($team as $member) {
                        if ($member['position'] == $pos['id']) { ?>
                            <li class="abc-padding-16" data-id="<?= $member['id'] ?>">
                            <span onclick="openModal(event)"
                                  class="abc-closebtn abc-padding abc-margin-right abc-medium">x</span>
                                <a href="/admin/team/edit/<?= $member['id'] ?>" style="text-decoration: none;">
                                    <img src="/image/team/<?= $member['id'] ?>"
                                         alt="<?= utf8_decode($member['name']) ?>"
                                         class="abc-left abc-circle abc-margin-right" style="height:35px;width:35px">
                                    <span class="abc-xlarge"><?= utf8_decode($member['name']) ?></span><br>
                                </a>
                            </li>
                            <?
                        }
                    } ?>

                </ul>
            <? } ?>
        </div>
        <hr>


        <!-- End page content -->
    </div>
    <script>

        var memberId;

        function openModal(evt) {
            memberId = evt.target.parentElement.getAttribute("data-id");
            Ink.s(".abc-modal [data-type='body']").innerHTML = "<p>Tem a certeza que deseja remover " + Ink.s("span.abc-xlarge", evt.target.parentElement).innerHTML + " ?</p>"
            Ink.s(".abc-modal").style['display'] = "block";
        }

        function post(path, params) {
            method = "post"; // Set method to post by default if not specified.

            // The rest of this code assumes you are not using a library.
            // It can be made less wordy if you use one.
            var form = document.createElement("form");
            form.setAttribute("method", method);
            form.setAttribute("action", path);

            for (var key in params) {
                if (params.hasOwnProperty(key)) {
                    var hiddenField = document.createElement("input");
                    hiddenField.setAttribute("type", "hidden");
                    hiddenField.setAttribute("name", key);
                    hiddenField.setAttribute("value", params[key]);

                    form.appendChild(hiddenField);
                }
            }

            document.body.appendChild(form);
            form.submit();
        }

        function deleteMember() {
            post('/admin/team/delete', {'memberId': memberId});
        }
    </script>
    <script>
        function doSave() {
            tinymce.triggerSave();
            return true;
        }
    </script>
<? include "footer.php" ?>