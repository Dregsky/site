
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div>
            <?= form_open('restrito/comunicado/salvarComunicado', 'id="formCadastroComunicado" enctype="multipart/form-data"') ?>
            <div class="box-body">
                <input name="id" type="hidden" value="<?= $id ?>" class="form-control">
                <!-- select -->
                <div class="form-group">
                    <label>Data Cadastro*</label>
                    <?php
                    $dataCadastro = isset($dataCadastro) ? $dataCadastro : new DateTime();
                    $interval = new DateInterval('P7D');
                    $dataSaiNovo = isset($dataSaiNovo) ? $dataSaiNovo : (new DateTime())->add($interval);
                    ?>
                    <input type="date" class="form-control" disabled
                           value="<?= $dataCadastro->format('Y-m-d') ?>">
                    <label>Data Sai Novo*</label>
                    <input type="date" class="form-control" disabled
                           value="<?= $dataSaiNovo->format('Y-m-d') ?>">
                </div><!-- form group -->
                <div class="form-group">
                    <label>Status*</label>
                    <select name="status" class="form-control" required>
                        <option value=""></option>  
                        <?php
                        $status = isset($status) ? $status : '';
                        foreach ($statusList as $s):
                            ?>
                            <option 
                                value="<?= $s->getId() ?>"
                                <?= $status == $s->getId() ? 'selected' : '' ?>>
                                    <?= $s->getDescricao() ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Título*</label>
                    <input id="assunto" name="assunto" class="form-control" required
                           maxlength="60" value="<?= isset($assunto) ? $assunto : '' ?>">
                </div><!-- form group -->

                <div class="form-group">
                    <label >Descrição*</label>
                    <textarea class="textarea" maxlength="400" name="descricao" required><?= isset($descricao) ? $descricao : '' ?></textarea>
                </div><!-- form group -->

            </div><!-- /.box-body -->
            <div class="box-footer">
                <button id="submit" type="submit" class="btn btn-primary pull-right">Salvar</button>
            </div>
            <?= form_close(); ?>
        </div><!-- /.box -->
    </div>
    <script type="text/javascript" src=" <?= base_url('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>

    <script>

        $(function () {
            $(".textarea").wysihtml5({
                toolbar: {
                    "html": true
                }
            });
        });
    </script>