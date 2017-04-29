<nav class="abc-sidenav abc-collapse abc-white abc-animate-left" style="z-index:3;width:300px;" id="mySidenav"><br>
    <div class="abc-container abc-row">
        <div>
            <span>Welcome, <strong><?= $user['name'] ?></strong></span><br>
            <a href="/admin/admins/edit/<?= $user['id'] ?>"
               class="abc-hover-none abc-hover-text-green abc-show-inline-block"><i class="fa fa-user"></i></a>
            <a href="/admin/logout" class="abc-hover-none abc-hover-text-blue abc-show-inline-block"><i
                        class="fa fa-sign-out"></i></a>

        </div>
    </div>
    <hr>
    <a href="#" class="abc-padding-16 abc-hide-large abc-dark-grey abc-hover-black" onclick="abc_close()"
       title="close menu"><i class="fa fa-remove fa-fw"></i>&nbsp; Close Menu</a>

    <a data-menu="dashboard" href="/admin/dashboard" class="abc-padding abc-blue"><i class="fa fa-tachometer fa-fw"></i>&nbsp;Dashboard</a>
    <a data-menu="homepage" href="/admin/homepage" class="abc-padding"><i class="fa fa-home fa-fw"></i>&nbsp;Homepage</a>
    <a data-menu="sociedade" href="/admin/sociedade" class="abc-padding"><i class="fa fa-university  fa-fw"></i>&nbsp; Sociedade</a>
    <a data-menu="areaspratica" href="/admin/areas" class="abc-padding"><i class="fa fa-balance-scale  fa-fw"></i>&nbsp; Áreas de Prática</a>
    <a data-menu="equipa" href="/admin/team" class="abc-padding"><i class="fa fa-users fa-fw"></i>&nbsp; Equipa</a>
    <a data-menu="blog" href="/admin/blog" class="abc-padding"><i class="fa fa-pencil fa-fw"></i>&nbsp; Blog</a>
    <a data-menu="recrutamento" href="/admin/recrutamento" class="abc-padding"><i class="fa fa-handshake-o fa-fw"></i>&nbsp;Recrutamento</a>
    <a data-menu="testemunhos" href="/admin/testimonials" class="abc-padding"><i class="fa fa-comments-o fa-fw"></i>&nbsp;Testemunhos</a>
    <a data-menu="disclaimer" href="/admin/disclaimer" class="abc-padding"><i class="fa fa-info-circle fa-fw"></i>&nbsp;Disclaimer</a>
    <a data-menu="mensagens" href="/admin/messages" class="abc-padding"><i class="fa fa-envelope fa-fw"></i>&nbsp;Mensagens</a>
    <a data-menu="administradores" href="/admin/admins" class="abc-padding"><i class="fa fa-cog fa-fw"></i>&nbsp;Administradores</a><br><br>
</nav>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="abc-overlay abc-hide-large abc-animate-opacity" onclick="abc_close()" style="cursor:pointer"
     title="close side menu" id="myOverlay"></div>

