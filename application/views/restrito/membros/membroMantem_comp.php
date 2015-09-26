<script>
    $('.multiple_select').ready(function () {
        $('.multiple_select').multiSelect();
    });
    window.onload = function () {
    id('telefone').onkeyup = function () {
        mascara(this, mtel);
    };
};
</script>
<link rel="stylesheet" type="text/css" href="<?= base_url('public/js/multiple-select/css/multi-select.css') ?>" media="screen" />
<script type="text/javascript" src="<?= base_url('public/js/multiple-select/js/jquery.multi-select.js') ?>"><!-- multiple select scripts --></script>
<script type="text/javascript" src="<?= base_url('public/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('public/js/restrito/scripts.js') ?>"><!-- scripts for use --></script>

<?php $action = 'restrito/membros/salvarMembro'; ?>
<?= form_open($action, 'id="formCadastroMembro" enctype="multipart/form-data"') ?>
<input name="id" type="hidden" value="<?= isset($id) ? $id : '' ?>" class="form-control">
<div class="box box-default collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title">Dados Pessoais</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <!--COL 4-->
            <div class="form-group col-sm-4">
                <label>Nome Completo*</label>
                <input type="text" name="nome" value="<?= isset($nome) ? $nome : '' ?>"
                       class="form-control" required>
            </div><!-- /.form group -->
            <div class="form-group col-sm-4">
                <label>CPF*</label>
                <input name="cpf" size="20" maxlength="14" type="text" 
                       class="form-control" value="<?= isset($cpf) ? $cpf : '' ?>"  
                       onkeyup="formataCpf(this)" onblur="valida_cpf(this)"
                       placeholder ="___.___.___-__" >
            </div><!-- /.form group -->

            <div class="form-group col-sm-4">
                <label>Data Nascimento*</label>
                <input type="date" name="dataNascimento" size="15" maxlength="10" 
                       value="<?= isset($dataNascimento) ? $dataNascimento : '' ?>" 
                       class="form-control"  required>
            </div><!-- /.form group -->
        </div><!-- ./row -->
        <div class="row">
            <div class="form-group col-sm-4">
                <label>Rua*</label>
                <input type="text"  name="rua" maxlength="100" 
                       value="<?= isset($rua) ? $rua : '' ?>"
                       class="form-control" required>
            </div><!-- /.form group --> 
            <div class="form-group col-sm-4">
                <label>Bairro*</label>
                <input type="text"  name="bairro" maxlength="100" 
                       value="<?= isset($bairro) ? $bairro : '' ?>"
                       class="form-control" required>
            </div><!-- /.form group -->
            <div class="form-group col-sm-4">
                <label>Cidade*</label>
                <input type="text"  name="cidade" maxlength="100" 
                       value="<?= isset($cidade) ? $cidade : '' ?>"
                       class="form-control" required>
            </div><!-- /.form group -->  
        </div><!-- ./row -->
        <div class="row">
            <div class="form-group col-sm-4">
                <label>Cidade Natal*</label>
                <input type="text"  name="cidadeNatal" 
                       value="<?= isset($cidadeNatal) ? $cidadeNatal : '' ?>"
                       class="form-control" required>
            </div><!-- /.form group --> 
            <div class="form-group col-sm-4">
                <label>Telefone*</label>
                <input id="telefone" type="text"  name="telefone" maxlength="15" 
                       value="<?= isset($telefone) ? $telefone : '' ?>"
                       class="form-control" placeholder="(__)____-____" required>
            </div><!-- /.form group --> 
            <div class="form-group col-sm-4">
                <label>Genero*</label>
                <select class="form-control" name="genero" required>
                    <?php $genero = isset($genero) ? $genero : '' ?>
                    <option value=""></option>
                    <option value="M" <?= $genero == 'M' ? ' selected' : '' ?>>Masculino</option>
                    <option value="F" <?= $genero == 'F' ? ' selected' : '' ?>>Feminino</option>
                </select>
            </div><!-- /.form group --> 
        </div><!-- ./row -->
        <div class="row">
            <div class="form-group col-sm-4">
                <label>Email*</label>
                <input type="email"  name="email" 
                       value="<?= isset($email) ? $email : '' ?>"
                       class="form-control" required>
            </div><!-- /.form group -->  
            <div class="form-group col-sm-4">
                <label>Escolaridade*</label>
                <select name="escolaridade" class="form-control select2 select2-hidden-accessible" 
                        style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option value=""></option>
                    <?php $escolaridade = isset($escolaridade) ? $escolaridade : '' ?>
                    <?php foreach ($escolaridadeList as $e): ?>
                        <option value=<?= $e->getId() ?> <?= ($escolaridade == $e->getId()) ? 'selected' : '' ?>>
                            <?= $e->getDescricao(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div> <!-- /.form group -->
            <div class="form-group col-sm-4">
                <label>Profissão*</label>
                <select name="profissao" class="form-control select2 select2-hidden-accessible" 
                        style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option value=""></option>
                    <?php $profissao = isset($profissao) ? $profissao : '' ?>
                    <?php foreach ($profissoes as $p): ?>
                        <option value=<?= $p->getId() ?> <?= ($profissao == $p->getId()) ? 'selected' : '' ?>>
                            <?= $p->getDescricao(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div><!-- /.form group --> 
        </div><!-- ./row -->
        <div class="row">
            <div class="form-group col-sm-4">
                <label>RG*</label>
                <input type="text"  name="rg"  
                       value="<?= isset($rg) ? $rg : '' ?>"
                       class="form-control" required>
            </div><!-- /.form group --> 
            <div class="form-group col-sm-4">
                <label>Orgão Expedidor*</label>
                <input type="text"  name="orgaoEmissor"  
                       value="<?= isset($orgaoEmissor) ? $orgaoEmissor : '' ?>"
                       class="form-control" required>
            </div><!-- /.form group -->  

            <div class="form-group col-sm-4">
                <label>Data Emissão*</label>
                <input type="date"  name="dataEmissao"  
                       value="<?= isset($dataEmissao) ? $dataEmissao : '' ?>"
                       class="form-control" required>
            </div><!-- /.form group -->    
        </div><!-- ./row -->
        <div class="row">
            <div class="form-group col-sm-4">
                <label>Estado Civil*</label>
                <select class="form-control" name="estadoCivil" required>
                    <option value=""></option>
                    <?php foreach ($estadoCivilList as $c): ?>
                        <option value=<?= $c->getId() ?><?= ($estadoCivil == $c->getId()) ? ' selected' : '' ?> >
                            <?= $c->getDescricao(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div><!-- /.form group --> 
            <div class="form-group col-sm-4">
                <label for="foto">Foto</label>
                <?php
                $foto = isset($fotoPessoa) ? $fotoPessoa : '';
                ?>
                <div><img id="foto" src="<?= base_url($foto) ?>" class="img-thumbnail" alt="Foto coordenador" 
                          width="160" height="240"></div>
                <span class="btn btn-danger btn-file">
                    <i class="fa fa-plus-circle"></i>Adicionar
                    <input name="fotoPessoa" type="file" id="fotoInput">
                    <input name="fotoAtual" type="hidden" value="<?= $foto ?>" >
                </span>
            </div><!-- /.form group -->
        </div><!-- ./row -->
    </div><!-- /.box-body -->
</div><!-- /.box-->

<div class="box box-danger collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title">Dados Ministeriais</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="form-group col-sm-4">
                <label>Data Chegada*</label>
                <input  class="form-control" type="date" name="dataChegada" size="15" maxlength="10" 
                        value="<?= isset($dataChegada) ? $dataChegada : '' ?>" 
                        required>
            </div><!-- /.form group -->
            <div class="form-group col-sm-4">
                <label>Data Batismo nas Águas</label>
                <input  class="form-control"  type="date" name="dataBatismoAguas" size="15" maxlength="10" 
                        value="<?= isset($dataBatismoAguas) ? $dataBatismoAguas : '' ?>" 
                        >
            </div><!-- /.form group -->
            <div class="form-group col-sm-4">
                <label>Data Batismo com Espírito Santo</label>
                <input  class="form-control" type="date" name="dataBatismoEspirito" size="15" maxlength="10" 
                        value="<?= isset($dataBatismoEspirito) ? $dataBatismoEspirito : '' ?>" 
                        >
            </div><!-- /.form group -->
        </div><!-- ./row -->
        <div class="row">
            <div class="form-group col-sm-4">
                <label>Função Ministerial*</label>
                <select class="form-control" name="funcaoMinisterial" required>
                    <option value=""></option>
                    <?php $funcaoMinisterial = isset($funcaoMinisterial) ? $funcaoMinisterial : '' ?>
                    <?php foreach ($funcaoList as $f): ?>
                        <option value=<?= $f->getId() ?><?= ($funcaoMinisterial == $f->getId()) ? ' selected' : '' ?>>
                            <?= $f->getDescricao(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div><!-- /.form group -->
            <div class="form-group col-sm-8">
                <label>Departamentos que Participa (Clique para adicionar)*</label>
                <select class="form-control multiple_select" name="departamentos[]" required="required" multiple="multiple">
                    <option value="<?= enums\DepartamentoEnum::IGREJA ?>" 
                            disabled="disabled" selected>Igreja</option>
                            <?php foreach ($departamentosList as $d): ?>
                        <option value=<?= $d->getId() ?>
                                <?= (in_array($d->getId(), $departamentos)) ? ' selected' : '' ?>>
                                    <?= $d->getNomeDepartamento(); ?>
                        </option>
                    <?php endforeach; ?>>
                </select>
            </div><!-- /.form group -->
        </div><!-- ./row -->
    </div><!-- /.box-body -->
</div><!-- /.box -->
<div class="box box-success collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title">Dados Familiares</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="form-group col-sm-6">
                <label>Nome do Pai*</label>
                <input type="text" name="nomePai" value="<?= isset($nomePai) ? $nomePai : '' ?>"
                       class="form-control" required>
            </div><!-- /.form group -->
            <div class="form-group col-sm-6">
                <label>Nome da Mãe*</label>
                <input type="text" name="nomeMae" value="<?= isset($nomeMae) ? $nomeMae : '' ?>"
                       class="form-control" required>
            </div><!-- /.form group -->
        </div><!-- ./row -->
        <div class="row">
            <div class="form-group col-sm-4">
                <label>Conjuge</label>
                <input type="text" name="nomeConjuge" value="<?= isset($nomeConjuge) ? $nomeConjuge : '' ?>"
                       class="form-control">
            </div><!-- /.form group -->
            <div class="form-group col-sm-4">
                <label>Data Casamento</label>
                <input class="form-control" type="date" name="dataCasamento" size="15" maxlength="10" 
                       value="<?= isset($dataCasamento) ? $dataCasamento : '' ?>" 
                       >
            </div><!-- /.form group -->
            <div class="form-group col-sm-4">
                <label>Quant. Filhos</label>
                <input type="number" maxlength="2" name="qtdFilhos" value="<?= isset($qtdFilhos) ? $qtdFilhos : '' ?>"
                       class="form-control">
            </div><!-- /.form group -->
        </div><!-- ./row -->
    </div><!-- /.box-body -->
</div><!-- /.box -->

<div class="box-footer">
    <button type="submit" class="btn btn-primary pull-right">Salvar</button>
</div>
<?= form_close(); ?>
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

</script>

