<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
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
                    <?php $info = " O Album deve aparecer nos albuns da igreja e do departamento?
Selecione : SIM
O Album deve aparecer apenas nos albuns do departamento?
Selecione: NÃO";
                    ?>
                    <label>Exibir no Album Principal
                        <i style="cursor: help;" class="fa fa-info-circle" title="<?= $info ?>">
                        </i>
                    </label>
                    <select name="exibirPrincipal" class="form-control" required>
                        <?php
                        $exibirPrincipal = isset($exibirPrincipal) ? $exibirPrincipal : '';
                        ?>
                        <option value="0"
                                <?= $exibirPrincipal == 0 ? 'selected' : '' ?>>
                            Não
                        </option>
                        <option value="1"
                                <?= $exibirPrincipal == 1 ? 'selected' : '' ?>>
                            Sim
                        </option>

                    </select>

                </div>
                <div class="form-group">
                    <label>Status</label>
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
                    <input name="nomeAlbum" type="text" value="<?= isset($nomeAlbum) ? $nomeAlbum : '' ?>" 
                           maxlength="80" class="form-control" required>
                </div><!-- /.form group -->

                <!-- Color Picker -->
                <div class="form-group">
                    <label>Evento</label>
                    <input name="nomeEvento" type="text" value="<?= isset($nomeEvento) ? $nomeEvento : '' ?>" 
                           maxlength="80" class="form-control" required>
                </div><!-- /.form group -->

                <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label>Link Flickr</label>
                        <textarea name="flickr" class="form-control" rows="3" required
                                  maxlength="600"><?= isset($flickr) ? $flickr : '' ?></textarea>
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
                <button type="submit" class="btn btn-primary pull-right">Salvar</button>
            </div>
            <?= form_close(); ?>
        </div><!-- /.box -->
    </div>