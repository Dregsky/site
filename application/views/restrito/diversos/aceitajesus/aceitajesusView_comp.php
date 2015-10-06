
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div>
            <div class="box-body">
                    <label>Nome:</label>
                    <p class="text-muted">
                        <?= $aceita->getNome() ?>
                    </p>
                    <hr>
                    <label>Email:</label>
                    <p class="text-muted">
                        <?= $aceita->getEmail() ?>
                    </p>
                    <hr>
                    <label>Telefone:</label>
                    <p class="text-muted">
                        <?= $aceita->getTelefone() ?>
                    </p>
                    <hr>
                    <label>Data:</label>
                    <p class="text-muted">
                        <?= $aceita->getDataAceitaJesus()->format('d/m/Y') ?>
                    </p>
                    <hr>
            </div><!-- /.box-body -->
            <div class="box-footer">
            </div>
        </div><!-- /.box -->
    </div>
