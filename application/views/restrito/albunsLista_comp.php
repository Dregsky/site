<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('public/plugins/datatables/dataTables.bootstrap.css') ?>">
<section class="content-header">
    <h1>
        Albuns
        <small>Deus seja louvado!</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Fotos</a></li>
        <li class="active">Albuns</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box1">
                <div class="box-header">
                    <h3 class="box-title"><a class="btn btn-primary btn-black" href="<?=base_url('restrito/fotos/mantemAlbum')?>">Novo Album</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="rowHead">
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Ano</th>
                                <th>Data Cadastro</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($albuns)):?>
                            <?php foreach ($albuns as $a): ?>
                                <tr class="row1">
                                    <td><?= $a->getId() ?></td>
                                    <td><?= $a->getNomeAlbum() ?></td>
                                    <td><?= $a->getAnoAlbum() ?></td>
                                    <td><?= $a->getDataCadastro()->format('d/m/Y') ?></td>
                                    <td><?= $a->getStatus()->getDescricao() ?></td>
                                    <td></td>
                                </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<!-- DataTables -->
<script type="text/javascript" src="<?= base_url('public/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('public/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>
<script>
    $(function () {
        $('#dataTable').DataTable({
            "language": {
                url: BASE_URL + "/public/plugins/datatables/language/pt-br.lang"
            }
        });
    });
</script>