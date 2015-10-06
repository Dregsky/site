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
            <li id="fotos" class="treeview <?= $menuAtivo == 'fotos' ? 'active' : '' ?>">
                <a href="#">
                    <i class="glyphicon glyphicon-camera"></i>
                    <span>Fotos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="albuns" 
                        class="<?= ($menuAtivo == 'fotos' && $menuAtivoFilho == 'albuns') ? 'active' : '' ?>">
                        <a href="<?= base_url('restrito/fotos/albuns') ?>"><i class="glyphicon glyphicon-picture"></i>Albuns</a></li>
                    <li id="slides" 
                        class="<?= ($menuAtivo == 'fotos' && $menuAtivoFilho == 'slides') ? 'active' : '' ?>">
                        <a href="<?= base_url('restrito/slide/lista') ?>"><i class="glyphicon glyphicon-sound-stereo"></i>Slides</a></li>
                </ul>
            </li>
            <li id="departamentos" class="treeview <?= $menuAtivo == 'departamentos' ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-cubes"></i> <span>Departamentos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <?php
                    $departamentos = array(
                        'ANG', 'JTV',
                        'CVKIDS', 'Orquestra', 'CIBE', 'MGD',
                        'EBD', 'Missoes', 'Familia', 'LIV'
                    );
                    ?>
                    <?php if (menuPermissao('ADCRUZ', $perfil)) : ?>
                        <li id="ADCRUZ" class="<?= ($menuAtivoFilho == 'ADCRUZ') ? 'active' : '' ?>">
                            <a href="#"><i class="fa fa-circle-o"></i>ADCRUZ<i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="agenda 
                                    <?= ($menuAtivoFilho == 'ADCRUZ' && $menuAtivoNeto == 'agenda') ? 'active' : '' ?>">
                                    <a href="<?= base_url('restrito/departamento/ADCRUZ/agenda') ?>"><i class="glyphicon glyphicon-calendar"></i>Agenda</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if (menuPermissao('Diretoria', $perfil)) : ?>
                        <li id="Diretoria" class="<?= ($menuAtivoFilho == 'Diretoria') ? 'active' : '' ?>">
                            <a href="#"><i class="fa fa-circle-o"></i>Diretoria<i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="coordenacao
                                    <?= ($menuAtivoFilho == 'Diretoria' && $menuAtivoNeto == 'coordenacao') ? 'active' : '' ?>">
                                    <a href="<?= base_url('restrito/departamento/Diretoria/coordenacao') ?>"><i class="glyphicon glyphicon-king"></i>Coordenação</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php foreach ($departamentos as $d): ?>
                        <?php if (menuPermissao($d, $perfil)) : ?>
                            <li id="<?= $d ?>" class="<?= ($menuAtivoFilho == $d) ? 'active' : '' ?>">
                                <a href="#"><i class="fa fa-circle-o"></i><?= $d ?><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li class="coordenacao
                                        <?= ($menuAtivoFilho == $d && $menuAtivoNeto == 'coordenacao') ? 'active' : '' ?>">
                                        <a href="<?= base_url('restrito/departamento/' . $d . '/coordenacao') ?>"><i class="glyphicon glyphicon-king"></i>Coordenação</a></li>
                                    <li class="agenda
                                         <?= ($menuAtivoFilho == $d && $menuAtivoNeto == 'agenda') ? 'active' : '' ?>">
                                        <a href="<?= base_url('restrito/departamento/' . $d . '/agenda') ?>"><i class="glyphicon glyphicon-calendar"></i>Agenda</a></li>
                                    <li class="sobre 
                                         <?= ($menuAtivoFilho == $d && $menuAtivoNeto == 'sobre') ? 'active' : '' ?>">
                                        <a href="<?= base_url('restrito/departamento/' . $d . '/sobre') ?>"><i class="glyphicon glyphicon-comment"></i>Sobre</a></li>
                                    <li class="logo 
                                         <?= ($menuAtivoFilho == $d && $menuAtivoNeto == 'logo') ? 'active' : '' ?>">
                                        <a href="<?= base_url('restrito/departamento/' . $d . '/logo') ?>"><i class="fa fa-star"></i>Logo</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </li>
            <?php if (menuPermissao('Membros', $perfil)) : ?>
                <li id="membros" class="treeview <?= $menuAtivo == 'membros' ? 'active' : '' ?>">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Membros</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li id="listaMembro"
                            class="<?= ($menuAtivo == 'membros' && $menuAtivoFilho == 'listaMembro') ? 'active' : '' ?>">
                            <a href="<?= base_url('restrito/membros/lista') ?>"><i class="fa fa-list"></i>Lista</a></li>
                        <li id="mantemMembro"
                            class="<?= ($menuAtivo == 'membros' && $menuAtivoFilho == 'mantemMembro') ? 'active' : '' ?>">
                            <a href="<?= base_url('restrito/membros/membroMantem') ?>"><i class="fa  fa-user-plus"></i>Cadastro</a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <li id="noticias" class="treeview <?= $menuAtivo == 'noticias' ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Notícia</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="listaNoticia"
                        class="<?= ($menuAtivo == 'noticias' && $menuAtivoFilho == 'listaNoticia') ? 'active' : '' ?>">
                        <a href="<?= base_url('restrito/noticia/lista') ?>"><i class="fa fa-list"></i>Lista</a></li>
                    <li id="mantemNoticia"
                        class="<?= ($menuAtivo == 'noticias' && $menuAtivoFilho == 'mantemNoticia') ? 'active' : '' ?>">
                        <a href="<?= base_url('restrito/noticia/noticiaMantem') ?>"><i class="fa  fa-plus-square"></i>Cadastro</a></li>
                </ul>
            </li>
            <li id="comunicados" class="treeview <?= $menuAtivo == 'comunicados' ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-bullhorn"></i>
                    <span>Comunicado</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="listaComunicado"
                        class="<?= ($menuAtivo == 'comunicados' && $menuAtivoFilho == 'listaComunicado') ? 'active' : '' ?>">
                        <a href="<?= base_url('restrito/comunicado/lista') ?>"><i class="fa fa-list"></i>Lista</a></li>
                    <li id="mantemComunicado"
                        class="<?= ($menuAtivo == 'comunicados' && $menuAtivoFilho == 'mantemComunicado') ? 'active' : '' ?>">
                        <a href="<?= base_url('restrito/comunicado/comunicadoMantem') ?>"><i class="fa  fa-plus-square"></i>Cadastro</a></li>
                </ul>
            </li>

            <?php if (menuPermissao('Usuarios', $perfil)) : ?>
                <li id="usuarios" class="treeview <?= $menuAtivo == 'usuarios' ? 'active' : '' ?>">
                    <a href="#">
                        <i class="glyphicon glyphicon-lock"></i>
                        <span>Usuários Admin</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li id="listaUsuario"
                            class="<?= ($menuAtivo == 'usuarios' && $menuAtivoFilho == 'listaUsuario') ? 'active' : '' ?>">
                            <a href="<?= base_url('restrito/usuarios/lista') ?>"><i class="fa fa-key"></i>Lista</a></li>
                        <li id="mantemUsuario"
                            class="<?= ($menuAtivo == 'usuarios' && $menuAtivoFilho == 'mantemUsuario') ? 'active' : '' ?>">
                            <a href="<?= base_url('restrito/usuarios/mantemUsuario') ?>"><i class="fa fa-user-secret"></i>Criar</a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (menuPermissao('Diversos', $perfil)) : ?>
                <li id="diversos" class="treeview <?= $menuAtivo == 'diversos' ? 'active' : '' ?>">
                    <a href="#">
                        <i class="glyphicon glyphicon-globe"></i>
                        <span>Diversos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li id="listaDirigentes"
                            class="<?= ($menuAtivo == 'diversos' && $menuAtivoFilho == 'listaDirigentes') ? 'active' : '' ?>">
                            <a href="<?= base_url('restrito/diversos/dirigentes/lista') ?>"><i class="fa fa-user-secret"></i>Dirigentes</a>
                        </li>
                        <li id="listaTestemunhos"
                            class="<?= ($menuAtivo == 'diversos' && $menuAtivoFilho == 'listaTestemunhos') ? 'active' : '' ?>">
                            <a href="<?= base_url('restrito/diversos/testemunhos/lista') ?>"><i class="fa fa-commenting"></i>Testemunhos</a>
                        </li>
                        <li id="listaAceitaJesus"
                            class="<?= ($menuAtivo == 'diversos' && $menuAtivoFilho == 'listaAceitaJesus') ? 'active' : '' ?>">
                            <a href="<?= base_url('restrito/diversos/AceitaJesus/lista') ?>"><i class="fa fa-hand-stop-o"></i>Aceita Jesus</a>
                        </li>
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
