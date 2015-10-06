<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div>
           <?php $action = 'restrito/departamento/' . $departamento->getApelido() . '/salvarLogo'; ?>
            <?= form_open($action, 'id="formCadastroLogo" enctype="multipart/form-data"') ?>
                <div class="form-group">
                    <?php
                    $logo = $departamento->getLogo();
                    ?>
                    <div><img id="logo" src="<?= base_url($logo) ?>" class="img-thumbnail" alt="Logo" 
                              style="width:660px!important; height:150px!important;"></div>
                    <span class="btn btn-danger btn-file">
                        <i class="fa fa-plus-circle"></i>Adicionar
                        <input name="logo" type="file" id="fotoInput">
                        <input name="fotoAtual" type="hidden" value="<?=$logo ?>" >
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
                    $('#logo').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#fotoInput").change(function () {
            readURL(this);
        });

    </script>
