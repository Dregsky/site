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
                </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr class="rowHead">
                            <th>Id</th>
                            <th>Nome Pessoa</th>
                            <th>Titulo</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($testemunhos)): ?>
                            <?php foreach ($testemunhos as $t): ?>
                                <tr title="Ver" class="row1 edit-row">
                                    <td><?= $t->getId() ?></td>
                                    <td><?= $t->getNomePessoa() != null ? $t->getNomePessoa() : '' ?></td>
                                    <td><?= $t->getNomeTestemunho() != null ? $t->getNomeTestemunho() : '' ?></td>
                                    <td><?= $t->getStatus()->getDescricao() ?></td>
                                    <td title="" class='no-edit-col icon-actions'>
                                        <a class="icon-black glyphicon glyphicon-eye-open" title="Ver" href="<?= base_url('restrito/diversos/testemunhos/testemunhoView/' . $t->getId()) ?>">
                                        </a>
                                        <?php if ($t->getStatus()->getId() == enums\TipoStatus::LIBERADO) { ?>
                                            <p style="display:none">0</p>
                                            <a class="icon-black glyphicon glyphicon-remove" title="Inativar" href="javascript: inativar(<?= $t->getId() ?>, 'restrito/diversos/testemunhos/testemunhoInativar')">
                                            </a>
                                        <?php } else { ?>
                                            <p style="display:none">1</p>
                                            <?php $msg = 'Tem certeza que deseja liberar esse testemunho?'?>
                                            <a class="icon-black glyphicon glyphicon-ok" title="Liberar" 
                                               href="javascript: ativar(<?= $t->getId() ?>, 'restrito/diversos/testemunhos/testemunhoLiberar', '<?=$msg?>') ">
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
            var id = $(this).parent().children().first().text();
            location.href = BASE_URL + 'restrito/diversos/testemunhos/testemunhoView/' + id;
        }

    });
</script>