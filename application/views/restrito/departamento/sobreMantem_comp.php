<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div>
            <?= form_open('restrito/departamento/' . $departamento->getApelido() . '/salvarSobre') ?>
            <div class="box-body">
                <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label>Sobre o Departamento*</label>
                        <textarea class="textarea" id="sobre" name="sobre" class="form-control" rows="3" required
                                  ><?= isset($sobre) ? $sobre : '' ?></textarea>
                    </div><!-- form group -->
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button id="submit" type="submit" class="btn btn-primary pull-right">Salvar</button>
            </div>
            <?= form_close(); ?>
        </div><!-- /.box -->
    </div>

    <script type="text/javascript" src=" <?= base_url('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>">
    </script>

    <script>

        $(function () {
            $(".textarea").wysihtml5({
                toolbar: {
                    "html": true
                }
            });
        });
    </script>