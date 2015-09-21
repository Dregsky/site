<script>
    $('.multiple_select').ready(function () {
        $('.multiple_select').multiSelect();
    });
</script>
<center>
    <?php
    $alert = $this->session->flashdata('alert');
    if ($alert != null) {
        echo process_alert($alert);
    }
    ?>
    <?= form_open('diversos/membro/cadastrar', 'id="formCadastroMembro" enctype="multipart/form-data"'); ?>
    <table border="1" width="80%" class="tabelaMembro">
        <tr>
            <td class="tdMembro" align="center" height="50" colspan="3" valign="middle">DADOS PESSOAIS</td>
        </tr>
        <tr>
            <td class="espacoEsquerda">Nome Completo*</td>
            <td>CPF*</td>
            <td>Data Nascimento*</td>
        </tr>
        <tr height="50" valign="top">
            <td><input type="text" name="nome" value="<?= $nome ?>" size="50" required></td>
            <td>
                <input type="text" name="cpf" size="20" maxlength="14" 
                       onkeyup="formataCpf(this)" onblur="valida_cpf(this)" value="<?= $cpf ?>" required>
            </td>
            <td><input type="date" name="dataNascimento" size="15" maxlength="10" value="<?= $dataNascimento ?>" required>&nbsp;</td>
        </tr>
        <tr>
            <td>Rua*</td>
            <td>Bairro*</td>
            <td>Cidade*</td>
        </tr>
        <tr height="50" valign="top">
            <td><input type="text" name="rua" size="50" maxlength="100" value="<?= $rua ?>" required></td>
            <td><input type="text" name="bairro" size="20" maxlength="100" value="<?= $bairro ?>" required></td>
            <td><input type="text" name="cidade" size="15" maxlength="100" value="<?= $cidade ?>" required></td>
        </tr>
        <tr>
            <td>Cidade Natal*</td>
            <td>Telefone*</td>
            <td>Gênero*</td>
        </tr>
        <tr height="50" valign="top">
            <td>
                <input type="text" name="cidadeNatal" size="20" value="<?= $cidadeNatal ?>" required>
            </td>
            <td>
                <input id="telefone" type="text" name="telefone" value="<?= $telefone ?>" maxlength="15" required>
            </td>

            <td>
                <select name="genero" required>
                    <option value=""></option>
                    <option value="M" <?= $genero == 'M' ? ' selected' : ''?>>Masculino</option>
                    <option value="F" <?= $genero == 'F' ? ' selected' : ''?>>Feminino</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>E-mail*</td>
            <td>Escolaridade*</td>
            <td></td>
        </tr>
        <tr height="50" valign="top">
            <td><input type="email" name="email" size="50" value="<?= $email ?>" required></td>
            <td>
                <select name="escolaridade" required>
                    <option value=""></option>
                    <?php foreach ($escolaridadeList as $e): ?>
                        <option value=<?= $e->getId() ?> <?= ($escolaridade == $e->getId()) ? 'selected' : '' ?>>
                            <?= $e->getDescricao(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo htmlentities("Profissão*") ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="50" valign="top">
            <td>
                <select name="profissao" style="width:200px" required="">
                    <option value=""></option>
                    <?php foreach ($profissoes as $p): ?>
                        <option value=<?= $p->getId() ?> <?= ($profissao == $p->getId()) ? 'selected' : '' ?>>
                            <?= $p->getDescricao(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>RG*</td>
            <td><?php echo htmlentities("Órgão Expedidor*") ?></td>
            <td><?php echo htmlentities("Data Emissão*") ?></td>
        </tr>
        <tr height="50" valign="top">
            <td><input type="text" name="rg" size="20" value="<?= $rg ?>" required></td>
            <td><input type="text" name="orgaoEmissor" value="<?= $orgaoEmissor ?>" size="20" required></td>
            <td><input type="date" name="dataEmissao"  value="<?= $dataEmissao ?>" required></td>
        </tr>
        <tr>
            <td>Estado Civil*</td>
            <td>Foto</td>
            <td></td>
        </tr>
        <tr height="50" valign="top">
            <td>
                <select name="estadoCivil"required>
                    <option value=""></option>
                    <?php foreach ($estadoCivilList as $c): ?>
                        <option value=<?= $c->getId() ?><?= ($estadoCivil == $c->getId()) ? ' selected' : '' ?> >
                            <?= $c->getDescricao(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td><input name="fotoPessoa" type="file" id="fotoMembro"/></td>
            <td></td>
        </tr>
    </table>
    <br>
    <table border="1" width="80%" class="tabelaMembro">
        <tr>
            <td class="tdMembro" align="center" height="50" colspan="3" valign="middle">DADOS MINISTERIAIS</td>
        </tr>
        <tr>
            <td>Data de Chegada*</td>
            <td><?php echo htmlentities("Data Batismo nas Águas") ?></td>
            <td><?php echo htmlentities("Data Batismo com Espírito Santos") ?></td>
        </tr>
        <tr height="50" valign="top">
            <td>
                <input type="date" name="dataChegada" value="<?= $dataChegada ?>" size="20" maxlength="10" required>
            </td>
            <td>
                <input type="date" name="dataBatismoEspirito" value="<?= $dataBatismoEspirito ?>" size="20" maxlength="10">
            </td>
            <td>
                <input type="date" name="dataBatismoAguas" value="<?= $dataBatismoAguas ?>" size="20" maxlength="10">
            </td>
        </tr>
        <tr>
            <td><?php echo htmlentities("Função Ministerial*") ?></td>
            <td>Departamentos que Participa (Clique para adicionar)*</td>
            <td></td>
        </tr>
        <tr height="50" valign="top">
            <td>
                <select name="funcaoMinisterial" required>
                    <option value=""></option>
                    <?php foreach ($funcaoList as $f): ?>
                        <option value=<?= $f->getId() ?><?= ($funcaoMinisterial == $f->getId()) ? ' selected' : '' ?>>
                            <?= $f->getDescricao(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <select class="multiple_select" name="departamentos[]" required="required" multiple="multiple">
                    <option value="<?= enums\DepartamentoEnum::IGREJA ?>" disabled="disabled" selected>Igreja</option>
                    <?php var_dump($departamentos); ?>
                    <?php foreach ($departamentosList as $d): ?>
                        <option value=<?= $d->getId() ?><?= (in_array($d->getId(), $departamentos)) ? ' selected' : '' ?>>
                            <?= $d->getNomeDepartamento(); ?>
                        </option>
                    <?php endforeach; ?>>
                </select>
            </td>
            <td></td>
        </tr>
    </table>
    <br>
    <table border="1" width="80%" class="tabelaMembro">
        <tr>
            <td class="tdMembro" align="center" height="50" colspan="3" valign="middle">DADOS FAMILIARES</td>
        </tr>
        <tr>
            <td>Nome do Pai*</td>
            <td colspan="2"><?php echo htmlentities("Nome da Mãe*") ?></td>
        </tr>
        <tr height="50" valign="top">
            <td><input type="text" name="nomePai" value="<?= $nomePai ?>" size="50" required></td>
            <td colspan="2"><input type="text" name="nomeMae" value="<?= $nomeMae ?>" size="50" required></td>
        </tr>
        <tr>
            <td><?php echo htmlentities("Cônjuge") ?></td>
            <td>Data de Casamento</td>
            <td>Quant. Filhos</td>
        </tr>
        <tr height="50" valign="top">
            <td><input type="text" name="nomeConjuge" value="<?= $nomeConjuge ?>" size="50"/></td>
            <td><input type="date" name="dataCasamento" value="<?= $dataCasamento ?>" size="20" maxlength="10"/></td>
            <td><input type="number" name="qtdFilhos" value="<?= $qtdFilhos ?>" size="20" maxlength="2"/></td>
        </tr>
    </table>
    <br>
    <table border="1" width="80%">
        <tr height="50" valign="middle">
            <td colspan="3" align="center" class="tdBotao">
                <button class="btn btn-default" type="reset">Limpar</button>
                &nbsp;
                <button class="btn btn-primary" type="submit">Cadastrar</button>
            </td>
        </tr>
    </table>
    <?= form_close() ?>
</center>
