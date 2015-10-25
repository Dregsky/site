
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div>
            <?= form_open('restrito/noticia/salvarNoticia', 'id="formCadastroNoticia" enctype="multipart/form-data"') ?>
            <div class="box-body">
                <input name="id" type="hidden" value="<?= $id ?>" class="form-control">
                <!-- select -->
                <div class="form-group">
                    <label>Departamento*</label>
                    <?php if ($departamentoPerfil > 0) : ?>
                        <p id="selectDisabled"></p>
                    <?php endif; ?>
                    <select id="departamento" name="departamento" class="form-control" 
                    <?= ($departamentoPerfil > 0) ? 'disabled' : '' ?>
                            required>
                        <option value=""></option>  
                        <?php
                        $departamento = !isset($departamento) ? $departamentoPerfil : $departamento;

                        foreach ($departamentos as $d):
                            ?>
                            <option 
                                value="<?= $d->getId() ?>"
                                <?= $departamento == $d->getId() ? 'selected' : '' ?>>
                                    <?= $d->getApelido() ?>
                            </option>
                            <?php
                        endforeach;
                        ?>
                    </select>
                </div>

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
                    <label>Data Evento</label>
                    <input type="date" name="dataEvento" class="form-control" 
                           value="<?= isset($dataEvento) ? $dataEvento->format('Y-m-d') : '' ?>">
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
                    <input id="titulo" name="titulo" class="form-control" required
                           maxlength="100" value="<?= isset($titulo) ? $titulo : '' ?>">
                </div><!-- form group -->
                <div class="form-group">
                    <label>Sub Título*</label>
                    <input name="subTitulo" class="form-control" required
                           maxlength="110" 
                           value="<?= isset($subTitulo) ? $subTitulo : '' ?>">
                </div><!-- form group -->
                <div class="form-group">
                    <label>Fonte*</label>
                    <input name="fonte" class="form-control" required
                           maxlength="100" 
                           value="<?= isset($fonte) ? $fonte : '' ?>">
                </div><!-- form group -->

                <div class="form-group">
                    <label >Texto*</label>
                    <textarea class="textarea" name="descricao" required><?= isset($descricao) ? $descricao : '' ?></textarea>
                </div><!-- form group -->
                <div class="form-group">
                    <label for="fotoNoticia">Foto*</label>
                    <?php
                    $foto = isset($fotoNoticia) ? $fotoNoticia : '';
                    ?>
                    <div><img id="foto" src="<?= base_url('public/images/noticias/' . $foto) ?>" class="img-thumbnail" alt="Imagem Notícia" 
                              style="width:300px; height:206px;"></div>
                    <span class="btn btn-danger btn-file">
                        <i class="fa fa-plus-circle"></i>Adicionar
                        <input name="fotoNoticia" type="file" id="fotoInput">
                        <input name="fotoAtual" type="hidden" value="<?= $foto ?>" >
                    </span>
                </div><!-- /.form group -->


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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#foto').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#fotoInput").change(function () {
            readURL(this);
        });

        $('#submit').on('click', function () {
            $('#departamento').prop('disabled', false);
        });
    </script>