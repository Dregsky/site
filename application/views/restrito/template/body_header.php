<?php
$imageProfile = processaImagem($this->session->userdata('foto'), $this->session->userdata('genero'));
?>
<header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url('restrito/home') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="<?= base_url('public/images/logo/logo_adcruz_final.png') ?>" width="50"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>ADCRUZ</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" onClick="sideBar()" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $imageProfile ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $this->session->userdata('nome') ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $imageProfile ?>" 
                                 class="img-circle" alt="<?= $this->session->userdata('nome') ?>">
                            <p>
                                <?= $this->session->userdata('nome') ?>
                                <small> <?= $this->session->userdata('nomePerfil') ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= base_url('restrito/login/logout') ?>" class="btn btn-default btn-flat">Sair</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<script>
    function sideBar() {
    $.ajax({
        url: BASE_URL + "restrito/home/sideBar",
        type: 'POST',
        data: {'nada': ''},
        success: function (data) {
        }
    });

}
</script>