
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div>
            <div class="box-body">
                    <label>Status:</label>
                    <p class="text-muted">
                        <?= $testemunho->getStatus()->getDescricao(); ?>
                    </p>
                    <hr>
                    <label>Nome Pessoa:</label>
                    <p class="text-muted">
                        <?= $testemunho->getNomePessoa() ?>
                    </p>
                    <hr>
                    <label>Título:</label>
                    <p class="text-muted">
                        <?= $testemunho->getNomeTestemunho() ?>
                    </p>
                    <hr>
                    <label>Descrição:</label>
                    <p class="text-muted">
                        <?= $testemunho->getDescricao() ?>
                    </p>
                    <hr>
            </div><!-- /.box-body -->
            <div class="box-footer">

                <?php
                if ($testemunho->getStatus()->getId() != enums\TipoStatus::LIBERADO):
                    $msg = 'Tem certeza que deseja liberar esse testemunho?'
                    ?>
                    <a class="btn btn-primary pull-right" title="Liberar" 
                       href="javascript: ativar(<?= $testemunho->getId() ?>, 'restrito/diversos/testemunhos/testemunhoLiberar', '<?= $msg ?>') ">
                        Liberar
                    </a>
                <?php endif; ?>
            </div>
        </div><!-- /.box -->
    </div>
