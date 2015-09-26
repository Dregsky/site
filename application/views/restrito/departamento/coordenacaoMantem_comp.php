<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div>
            <?php $action = 'restrito/departamento/' . $departamento . '/salvarCoordenador'; ?>
            <?= form_open($action, 'id="formCadastroCoordenador" enctype="multipart/form-data"') ?>
            <div class="box-body">
                <input name="id" type="hidden" value="<?= $id ?>" class="form-control">
                <!-- select -->
                <div class="form-group">
                    <label>Departamento*</label>
                    <select name="cod_departamento" class="form-control" 
                            disabled required>
                        <option value=""></option>  
                        <?php
                        foreach ($departamentos as $d):
                            $cod_departamento = isset($cod_departamento) ? $cod_departamento : '';
                            ?>
                            <option 
                                value="<?= $d->getId() ?>"
                                <?= $cod_departamento == $d->getId() ? 'selected' : '' ?>>
                                    <?= $d->getApelido() ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status*</label>
                    <select name="cod_status" class="form-control" required>
                        <option value=""></option>  
                        <?php
                        $status = isset($cod_status) ? $cod_status : '';
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
                    <label>Pessoa</label>
                    <select name="cod_pessoa" class="form-control" >
                        <option value="0"></option>  
                        <?php
                        $pessoa = isset($cod_pessoa) ? $cod_pessoa : '';
                        foreach ($pessoas as $p):
                            ?>
                            <option 
                                value="<?= $p->getId() ?>"
                                <?= $pessoa == $p->getId() ? 'selected' : '' ?>>
                                    <?= $p->getNome() ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nome Pessoa* (Ex : Pr. Fulano, Ev. Ciclano):</label>
                    <input name="nomePessoa" type="text" value="<?= isset($nomePessoa) ? $nomePessoa : '' ?>" 
                           maxlength="50" class="form-control" required>
                </div><!-- /.form group -->

                <!-- Color Picker -->
                <div class="form-group">
                    <label>Nome Cargo* (Ex : Líder de Jovens, Pastor Dirigente):</label>
                    <input name="nomeCargo" type="text" value="<?= isset($nomeCargo) ? $nomeCargo : '' ?>" 
                           maxlength="50" class="form-control" required>
                </div><!-- /.form group -->

                <div class="form-group">
                    <label>Ano*</label>
                    <div class="input-group">
                        <input name="ano" type="number" min="1900" max="2300" 
                               value="<?= isset($ano) ? $ano : date('Y') ?>" class="form-control" required>
                    </div><!-- /.input group -->
                </div><!-- /.form group -->

                <div class="form-group">
                    <label for="foto">Foto</label>
                    <?php
                    $foto = isset($foto) ? $foto : '';
                    ?>
                    <div><img id="foto" src="<?= base_url($foto) ?>" class="img-thumbnail" alt="Foto coordenador" 
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
