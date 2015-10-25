
<?php

use enums\TipoSlide;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div>
            <?= form_open('restrito/slide/salvarSlide', 'id="formCadastroSlide" enctype="multipart/form-data"') ?>
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
                    <label>Data de Expiração</label>
                    <input type="date" name="dataSai" class="form-control" 
                           value="<?= isset($dataSai) ? $dataSai->format('Y-m-d') : '' ?>">
                </div><!-- form group -->
                <div class="form-group">
                    <?php $info = " O Slide deve aparecer na pagina principal do site e do departamento?
Selecione : SIM
O Slide deve aparecer apenas na pagina inicial do departamento?
Selecione: NÃO";
                    ?>
                    <label>Exibir Slide na Pagina Principal*
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
                    <label>Status*</label>
                    <select name="status" class="form-control" required>
                        <option value=""></option>  
                        <?php
                        $status = isset($status) ? $status : '';

                        Use enums\TipoStatus;
                        ?>
                        <option 
                            value="<?= TipoStatus::ATIVO ?>"
                            <?= $status == TipoStatus::ATIVO ? 'selected' : '' ?>>
                            Ativo 
                        </option>
                        <option 
                            value="<?= TipoStatus::INATIVO ?>"
                            <?= $status == TipoStatus::INATIVO ? 'selected' : '' ?>>
                            Inativo 
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tipo Slide*</label>
                    <select id="tipoSlide" name="tipoSlide" class="form-control" required>
                        <?php
                        $idNoticia = (isset($tipoSlide) ? ($tipoSlide == TipoSlide::NOTICIA ?
                                                (isset($idLink) ? $idLink : '') : '') : '');
                        $idComunicado = (isset($tipoSlide) ? ($tipoSlide == TipoSlide::COMUNICADO ?
                                                (isset($idLink) ? $idLink : '') : '') : '');
                        $tipoSlide = isset($tipoSlide) ? $tipoSlide : '';
                        ?>
                        <option value="<?= TipoSlide::LINK ?>"
                                <?= $tipoSlide == TipoSlide::LINK ? 'selected' : '' ?>>
                            Link
                        </option>
                        <option value="<?= TipoSlide::NOTICIA ?>"
                                <?= $tipoSlide == TipoSlide::NOTICIA ? 'selected' : '' ?>>
                            Notícia
                        </option>
                        <option value="<?= TipoSlide::COMUNICADO ?>"
                                <?= $tipoSlide == TipoSlide::COMUNICADO ? 'selected' : '' ?>>
                            Comunicado
                        </option>

                    </select>
                </div>
                <div class="box box-info" style="background-color: #222d32; color:white">
                    <div class="form-group" <?= empty($idNoticia) ? 'style="display: none;"' : '' ?>>
                        <label>Notícia</label>
                        <select id="noticias_slide" class="form-control select2">
                            <option value=""></option>  
                            <?php
                            foreach ($noticias as $n):
                                ?>
                                <option 
                                    value="<?= $n->getId() ?>"
                                    <?= $idNoticia == $n->getId() ? 'selected' : '' ?>>
                                        <?= $n->getTitulo() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div><!-- ./form-group -->
                    <div class="form-group" <?= empty($idComunicado) ? 'style="display: none;"' : '' ?>>
                        <label>Comunicado</label>
                        <select id="comunicados_slide" class="form-control select2">
                            <option value=""></option>  
                            <?php
                            for ($i = (sizeof($comunicados) - 1); $i >= 0; $i--):
                                ?>
                                <option 
                                    value="<?= $comunicados[$i]->getId() ?>"
                                    <?= $idComunicado == $comunicados[$i]->getId() ? 'selected' : '' ?>>
                                        <?= $comunicados[$i]->getAssunto() ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div><!-- ./form-group -->
                </div><!-- ./box -->


                <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label>Link*</label>
                        <input id="link" name="link" class="form-control" required
                               maxlength="300" <?= isset($idLink) ? ' style="display:none;" ' : '' ?>
                               value="<?= isset($link) ? $link : '#' ?>">
                        <input id="link2" class="form-control" disabled 
                        <?= !isset($idLink) ? ' style="display:none;" ' : '' ?>
                               maxlength="300" value="<?= isset($link) ? $link : '' ?>">
                    </div><!-- form group -->
                </div>
                <div class="form-group">
                    <label>Nome*</label>
                    <input name="nome" class="form-control" required
                           maxlength="100" 
                           value="<?= isset($nome) ? $nome : '' ?>">
                </div><!-- form group -->
                <div class="form-group">
                    <label for="foto">Foto*</label>
                    <?php
                    $foto = isset($foto) ? $foto : '';
                    ?>
                    <div><img id="foto" src="<?= base_url($foto) ?>" class="img-thumbnail" alt="Imagem Slide" 
                              style="width:960px!important; height:268px!important;"></div>
                    <span class="btn btn-danger btn-file">
                        <i class="fa fa-plus-circle"></i>Adicionar
                        <input name="foto" type="file" id="fotoInput" title="Selecione uma imagem" 
                               <?= empty($id) ? 'required' : '' ?>>
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

    <script>

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

        $(function () {
            $(".select2").select2();
            if ($('#selectDisabled').length) {
                $('#selectDisabled').hide();
                var selecionado = $('#departamento option:selected').clone();
                $('#departamento').empty();
                $('#departamento').append(selecionado);
            }
        });

        $('#tipoSlide').on('change', function () {
            var tipoSlide = $('#tipoSlide').val();
            $('#link').val('#');
            $('#link2').val('#');
            /*
             * 1- Noticia
             * 2- Comunicado
             * 3- Link
             */
            switch (tipoSlide) {
                case '1':
                    $('#noticias_slide').parent().show();
                    $('#comunicados_slide').parent().hide();
                    $('#noticias_slide').attr('required', true);
                    $('#comunicados_slide').attr('required', false);
                    $('#link').hide();
                    $('#link2').show();
                    break
                case '2':
                    $('#noticias_slide').parent().hide();
                    $('#comunicados_slide').parent().show();
                    $('#noticias_slide').attr('required', false);
                    $('#comunicados_slide').attr('required', true);
                    $('#link').hide();
                    $('#link2').show();
                    break
                default:
                    $('#noticias_slide').parent().hide();
                    $('#comunicados_slide').parent().hide();
                    $('#noticias_slide').attr('required', false);
                    $('#comunicados_slide').attr('required', false);
                    $('#link').show();
                    $('#link2').hide();
                    break
            }
        });

        $('#noticias_slide').on('change', function () {
            var link = 'noticia/' + $('#noticias_slide').val();
            $('#link').val(link);
            $('#link2').val(link);
        });
        $('#comunicados_slide').on('change', function () {
            var link = 'comunicado/' + $('#comunicados_slide').val();
            $('#link').val(link);
            $('#link2').val(link);
        });

        $('#submit').on('click', function () {
            $('#departamento').prop('disabled', false);
        });
    </script>