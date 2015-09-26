<?php

use enums\TipoSlide;
?>

<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('public/plugins/datatables/dataTables.bootstrap.css') ?>">

<div class="row">
    <div class="col-xs-12">
        <div class="box box1">
            <div class="box-header">
                <h3 class="box-title box1-title">Lista</h3>
                <h3 class="box-title pull-right">
                    <a class="btn btn-default" href="<?= base_url('restrito/slide/slideMantem') ?>">
                        <i class="fa fa-plus-circle"></i>
                        Novo Slide
                    </a>
                </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr class="rowHead">
                            <th>Id</th>
                            <th>Departamento</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Status</th>
                            <th>Principal</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($slides)): ?>
                            <?php foreach ($slides as $s): ?>
                                <tr title="Editar" class="row1 edit-row">
                                    <td><?= $s->getId() ?></td>
                                    <td><?= $s->getDepartamento()->getApelido() ?></td>
                                    <td><?= $s->getNome() ?></td>
                                    <?php $ts = $s->getTipoSlide(); ?>
                                    <td><?=
                                        ($ts == TipoSlide::COMUNICADO ? 'Comunicado' :
                                                ($ts == TipoSlide::NOTICIA ? 'Notícia' : 'Link')
                                        );
                                        ?>
                                    </td>
                                    <td><?= $s->getStatus()->getDescricao() ?></td>
                                    <td><?= $s->getExibirPrincipal() ? 'Sim' : 'Não' ?></td>
                                    <td title="" class='no-edit-col icon-actions'>
                                        <a class="icon-black glyphicon glyphicon-pencil" title="Editar" href="<?= base_url('restrito/slide/slideMantem/' . $s->getId()) ?>">
                                        </a>
                                        <?php if ($s->getStatus()->getId() == enums\TipoStatus::ATIVO) { ?>
                                            <p style="display:none">0</p>
                                            <a class="icon-black glyphicon glyphicon-remove" title="Inativar" href="javascript: inativar(<?= $s->getId() ?>, 'restrito/slide/slideInativar')">
                                            </a>
                                        <?php } else { ?>
                                            <p style="display:none">1</p>
                                            <a class="icon-black glyphicon glyphicon-ok" title="Ativar" href="javascript: ativar(<?= $s->getId() ?>, 'restrito/slide/slideAtivar')">
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
<!-- DataTables -->
<script type="text/javascript" src="<?= base_url('public/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('public/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>
<script>
    $(function () {
        $('#dataTable').DataTable({
            "language": {
                url: BASE_URL + "/public/plugins/datatables/language/pt-br.lang"
            },
            "order": [[0, "desc"]]
        });
    });

    $('.edit-row > td').on('click', function (e) {
        if (!$(this).hasClass('no-edit-col')) {
            var id = $('.edit-row > td:first').text();
            location.href = BASE_URL + 'restrito/slide/slideMantem/' + id;
        }

    });
</script>