<?php
$imageProfile = imagemProfileRestrito($this->session->userdata('genero'), $this->session->userdata('foto'));
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=$imageProfile ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info" style="white-space: normal;">
                <p><?=$this->session->userdata('nome')?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li id="home" >
                <a href="<?=base_url('restrito/home')?>">
                    <i class="glyphicon glyphicon-home"></i> <span>Home</span> <i class="pull-right"></i>
                </a>
            </li>
            <li id="fotos" class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-camera"></i>
                    <span>Fotos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="albuns"><a href="<?=base_url('restrito/fotos/albuns') ?>"><i class="glyphicon glyphicon-picture"></i>Albuns</a></li>
                    <li id="slides"><a href="pages/charts/chartjs.html"><i class="glyphicon glyphicon-sound-stereo"></i>Slides</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<input type="hidden" id="menuAtivo" value="<?=$menuAtivo?>">
<input type="hidden" id="menuAtivoFilho" value="<?=$menuAtivoFilho?>">
