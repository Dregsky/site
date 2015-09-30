<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('public/plugins/datatables/dataTables.bootstrap.css') ?>">
<link rel="stylesheet" href="<?=
base_url('public/plugins/datatables/extensions/'
        . 'TableTools/css/dataTables.tableTools.min.css')
?>">

<div class="row">
    <div class="col-xs-12">
        <div class="box box1">
            <div class="box-header">
                <h3 class="box-title box1-title">Lista</h3>
                <h3 class="box-title pull-right">
                    <a class="btn btn-default" href="<?= base_url('restrito/membros/membroMantem') ?>">
                        <i class="fa fa-plus-circle"></i>
                        Novo Membro
                    </a>
                </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr class="rowHead">
                            <th>Id</th>
                            <th>Cargo</th>
                            <th>Nome</th>
                            <th>Data Cadastro</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($pessoas)): ?>
                            <?php foreach ($pessoas as $p): ?>
                                <tr title="Editar" class="row1 edit-row">
                                    <td><?= $p->getId() ?></td>
                                    <td><?= $p->getFuncaoMinisterial()->getDescricao() ?></td>
                                    <td><?= $p->getNome() ?></td>
                                    <td>
                                        <?php $dataCadastro = $p->getDataCadastro() != null ? $p->getDataCadastro() : '' ?>
                                        <span style="display:none">
                                            <?= $dataCadastro != null ? $dataCadastro->format('Ymd') : '' ?>
                                        </span>
                                        <?= $dataCadastro != null ? $dataCadastro->format('d/m/Y') : '' ?>
                                    </td>
                                    <td><?= $p->getStatus()->getDescricao() ?></td>
                                    <td title="" class='no-edit-col icon-actions'>
                                        <a class="icon-black glyphicon glyphicon-pencil" title="Editar" href="<?= base_url('restrito/membros/membroMantem/' . $p->getId()) ?>">
                                        </a>
                                        <?php if ($p->getStatus()->getId() == enums\TipoStatus::ATIVO) { ?>
                                            <p style="display:none">0</p>
                                            <a class="icon-black glyphicon glyphicon-remove" title="Inativar" href="javascript: inativar(<?= $p->getId() ?>, 'restrito/membros/membroInativar')">
                                            </a>
                                        <?php } else { ?>
                                            <p style="display:none">1</p>
                                            <a class="icon-black glyphicon glyphicon-ok" title="Ativar" href="javascript: ativar(<?= $p->getId() ?>, 'restrito/membros/membroAtivar')">
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
<script type="text/javascript" src="<?=
                        base_url('public/plugins/datatables/extensions/TableTools/js/'
                                . 'dataTables.tableTools.min.js')
                        ?>"></script>
<script>
    $(function () {
        var extensions = {
            "sFilter": "dataTables_filter filter_export"
        };
        $.extend($.fn.dataTableExt.oStdClasses, extensions);
        // Used when bJQueryUI is true
        $.extend($.fn.dataTableExt.oJUIClasses, extensions);

        $('#dataTable').DataTable({
            "sDom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": BASE_URL + "/public/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "sRowSelect": "multi",
                "aButtons": [
                    {
                        "sExtends": "collection",
                        "sButtonText": "Exportar",
                        "aButtons": ["copy",
                            {
                                "sExtends": "xls",
                                "sButtonText": "Excel",
                                "sFileName": "membro.csv"
                            }
                            , "pdf", "print"
                        ]
                    }
                ]
            },
            "language": {
                url: BASE_URL + "/public/plugins/datatables/language/pt-br.lang"
            },
            "order": [[0, "desc"]]
        });
    });
    $('.edit-row > td').on('click', function (e) {
        if (!$(this).hasClass('no-edit-col')) {
            var id = $(this).parent().children().first().text();
            location.href = BASE_URL + 'restrito/membros/membroMantem/' + id;
        }
    });

    $(window).load(function () {
        $('#dataTable_wrapper').addClass('export');
    });
</script>