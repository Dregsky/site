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
    <?php
    $alert = $this->session->flashdata('alert');
    if ($alert != null) :
        ?>

        <p class="login-box-msg"><?= process_alert($alert); ?></p>
    <?php endif; ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Manter Album</h3>
                </div>
                <?= form_open('restrito/Fotos/salvarAlbum') ?>
                <div class="box-body">
                    <input name="id" type="hidden" value="<?= $id ?>" class="form-control">
                    <input name="dataCadastro" type="hidden" value="<?= $dataCadastro->format('Y-m-d') ?>" class="form-control">
                    <!-- select -->
                    <div class="form-group">
                        <label>Departamento</label>
                        <select name="departamento" class="form-control" 
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
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Departamento</label>
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
                    <!-- Color Picker -->
                    <div class="form-group">
                        <label>Nome:</label>
                        <input name="nomeAlbum" type="text" value="<?= isset($nomeAlbum) ? $nomeAlbum : '' ?>" class="form-control" required>
                    </div><!-- /.form group -->

                    <!-- Color Picker -->
                    <div class="form-group">
                        <label>Evento</label>
                        <input name="nomeEvento" type="text" value="<?= isset($nomeEvento) ? $nomeEvento : '' ?>" class="form-control" required>
                    </div><!-- /.form group -->

                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Link Flickr</label>
                            <textarea name="flickr" class="form-control" rows="3" required><?= isset($flickr) ? $flickr : '' ?></textarea>
                        </div><!-- form group -->
                    </div>

                    <div class="form-group">
                        <label>Ano</label>
                        <div class="input-group">
                            <input name="anoAlbum" type="number" min="1900" max="2300" 
                                   value="<?= isset($anoAlbum) ? $anoAlbum : '' ?>" class="form-control" required>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->

                    <div class="form-group">
                        <label>Quantidade Fotos</label>
                        <div class="input-group">
                            <input name="quantidadeFotos" type="number" 
                                   value="<?= isset($quantidadeFotos) ? $quantidadeFotos : '' ?>" min="1" max="1000" class="form-control" required>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                <?= form_close(); ?>
            </div><!-- /.box -->
        </div>
</section>
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