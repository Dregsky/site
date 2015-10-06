<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div>
            <?php $action = 'restrito/diversos/dirigentes/salvarDirigente'; ?>
            <?= form_open($action, 'id="formCadastroCoordenador" enctype="multipart/form-data"') ?>
            <div class="box-body">
                <input name="id" type="hidden" value="<?= $id ?>" class="form-control">
                <input name="posicao" type="hidden" value="<?= isset($posicao) ? $posicao : '99' ?>" class="form-control">
                <div class="form-group">
                    <label>Nome Dirigente* (Ex : Pastor Fulano Beltrano de Ciclano):</label>
                    <input name="nomeDirigente" type="text" value="<?= isset($nomeDirigente) ? $nomeDirigente : '' ?>" 
                           maxlength="50" class="form-control" required>
                </div><!-- /.form group -->

                <!-- Color Picker -->
                <div class="form-group">
                    <label>Período Dirigido* (Ex : 01/12/2012 a  01/12/2015):</label>
                    <input name="periodoDirigido" type="text" value="<?= isset($periodoDirigido) ? $periodoDirigido : '' ?>" 
                           maxlength="50" class="form-control" required>
                </div><!-- /.form group -->

                <div class="form-group">
                    <label for="foto">Foto</label>
                    <?php
                    $foto = isset($foto) ? $foto : '';
                    ?>
                    <div><img id="foto" src="<?= base_url($foto) ?>" class="img-thumbnail" alt="Foto Dirigente" 
                              width="160" height="240"></div>
                    <span class="btn btn-danger btn-file">
                        <i class="fa fa-plus-circle"></i>Adicionar
                        <input name="foto" type="file" id="fotoInput">
                        <input name="fotoAtual" type="hidden" value="<?=$foto ?>" >
                    </span>
                </div><!-- /.form group -->

            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Salvar</button>
            </div>
            <?= form_close(); ?>
        </div><!-- /.box -->
    </div>
    <script>

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#foto').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#fotoInput").change(function () {
            readURL(this);
        });

    </script>
