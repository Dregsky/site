<?php

Use enums\DepartamentoEnum;

$imageProfile = processaImagem($this->session->userdata('foto'), $this->session->userdata('genero'));
$perfil = $this->session->userdata('perfil');
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $imageProfile ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info" style="white-space: normal;">
                <p><?= $this->session->userdata('nome') ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li id="home" >
                <a href="<?= base_url('restrito/home') ?>">
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
                    <li id="albuns"><a href="<?= base_url('restrito/fotos/albuns') ?>"><i class="glyphicon glyphicon-picture"></i>Albuns</a></li>
                    <li id="slides"><a href="<?= base_url('restrito/slide/lista') ?>"><i class="glyphicon glyphicon-sound-stereo"></i>Slides</a></li>
                </ul>
            </li>
            <li id="departamentos" class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i> <span>Departamentos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <?php if (menuPermissao('ADCRUZ', $perfil)) : ?>
                        <li id="ADCRUZ">
                            <a href="#"><i class="fa fa-circle-o"></i>ADCRUZ<i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="agenda" ><a href="<?= base_url('restrito/departamento/ADCRUZ/agenda') ?>"><i class="glyphicon glyphicon-calendar"></i>Agenda</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if (menuPermissao('Diretoria', $perfil)) : ?>
                        <li id="Diretoria">
                            <a href="#"><i class="fa fa-circle-o"></i>Diretoria<i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="coordenacao"><a href="<?= base_url('restrito/departamento/Diretoria/coordenacao') ?>"><i class="glyphicon glyphicon-king"></i>Coordenação</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if (menuPermissao('ANG', $perfil)) : ?>
                        <li id="ANG">
                            <a href="#"><i class="fa fa-circle-o"></i>ANG<i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="coordenacao"><a href="<?= base_url('restrito/departamento/ANG/coordenacao') ?>"><i class="glyphicon glyphicon-king"></i>Coordenação</a></li>
                                <li class="agenda" ><a href="<?= base_url('restrito/departamento/ANG/agenda') ?>"><i class="glyphicon glyphicon-calendar"></i>Agenda</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if (menuPermissao('JTV', $perfil)) : ?>
                        <li id="JTV">
                            <a href="#"><i class="fa fa-circle-o"></i>JTV<i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="coordenacao"><a href="<?= base_url('restrito/departamento/JTV/coordenacao') ?>"><i class="glyphicon glyphicon-king"></i>Coordenação</a></li>
                                <li class="agenda" ><a href="<?= base_url('restrito/departamento/JTV/agenda') ?>"><i class="glyphicon glyphicon-calendar"></i>Agenda</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if (menuPermissao('CVKIDS', $perfil)) : ?>
                        <li id="CVKIDS">
                            <a href="#"><i class="fa fa-circle-o"></i>CVKIDS<i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="coordenacao"><a href="<?= base_url('restrito/departamento/CVKIDS/coordenacao') ?>"><i class="glyphicon glyphicon-king"></i>Coordenação</a></li>
                                <li class="agenda" ><a href="<?= base_url('restrito/departamento/CVKIDS/agenda') ?>"><i class="glyphicon glyphicon-calendar"></i>Agenda</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if (menuPermissao('Orquestra', $perfil)) : ?>
                        <li id="Orquestra">
                            <a href="#"><i class="fa fa-circle-o"></i>Orquestra<i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="coordenacao"><a href="<?= base_url('restrito/departamento/Orquestra/coordenacao') ?>"><i class="glyphicon glyphicon-king"></i>Coordenação</a></li>
                                <li class="agenda" ><a href="<?= base_url('restrito/departamento/Orquestra/agenda') ?>"><i class="glyphicon glyphicon-calendar"></i>Agenda</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if (menuPermissao('CIBE', $perfil)) : ?>
                        <li id="CIBE">
                            <a href="#"><i class="fa fa-circle-o"></i>CIBE<i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="coordenacao"><a href="<?= base_url('restrito/departamento/CIBE/coordenacao') ?>"><i class="glyphicon glyphicon-king"></i>Coordenação</a></li>
                                <li class="agenda" ><a href="<?= base_url('restrito/departamento/CIBE/agenda') ?>"><i class="glyphicon glyphicon-calendar"></i>Agenda</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if (menuPermissao('MGD', $perfil)) : ?>
                        <li id="MGD">
                            <a href="#"><i class="fa fa-circle-o"></i>MGD<i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="coordenacao"><a href="<?= base_url('restrito/departamento/MGD/coordenacao') ?>"><i class="glyphicon glyphicon-king"></i>Coordenação</a></li>
                                <li class="agenda" ><a href="<?= base_url('restrito/departamento/MGD/agenda') ?>"><i class="glyphicon glyphicon-calendar"></i>Agenda</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if (menuPermissao('EBD', $perfil)) : ?>
                        <li id="EBD">
                            <a href="#"><i class="fa fa-circle-o"></i>EBD<i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="coordenacao"><a href="<?= base_url('restrito/departamento/EBD/coordenacao') ?>"><i class="glyphicon glyphicon-king"></i>Coordenação</a></li>
                                <li class="agenda" ><a href="<?= base_url('restrito/departamento/EBD/agenda') ?>"><i class="glyphicon glyphicon-calendar"></i>Agenda</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if (menuPermissao('Missoes', $perfil)) : ?>
                        <li id="Missoes">
                            <a href="#"><i class="fa fa-circle-o"></i>Missões<i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="coordenacao"><a href="<?= base_url('restrito/departamento/Missoes/coordenacao') ?>"><i class="glyphicon glyphicon-king"></i>Coordenação</a></li>
                                <li class="agenda" ><a href="<?= base_url('restrito/departamento/Missoes/agenda') ?>"><i class="glyphicon glyphicon-calendar"></i>Agenda</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if (menuPermissao('Familia', $perfil)) : ?>
                        <li id="Familia">
                            <a href="#"><i class="fa fa-circle-o"></i>Família<i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="coordenacao"><a href="<?= base_url('restrito/departamento/Familia/coordenacao') ?>"><i class="glyphicon glyphicon-king"></i>Coordenação</a></li>
                                <li class="agenda" ><a href="<?= base_url('restrito/departamento/Familia/agenda') ?>"><i class="glyphicon glyphicon-calendar"></i>Agenda</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php if (menuPermissao('Membros', $perfil)) : ?>
                <li id="membros" class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Membros</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li id="listaMembro"><a href="<?= base_url('restrito/membros/lista') ?>"><i class="fa fa-list"></i>Lista</a></li>
                        <li id="mantemMembro"><a href="<?= base_url('restrito/membros/membroMantem') ?>"><i class="fa  fa-user-plus"></i>Cadastro</a></li>
                    </ul>
                </li>
            <?php endif; ?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<input type="hidden" id="menuAtivo" value="<?= $menuAtivo ?>">
<input type="hidden" id="menuAtivoFilho" value="<?= $menuAtivoFilho ?>">
<input type="hidden" id="menuAtivoNeto" value="<?= $menuAtivoNeto ?>">
