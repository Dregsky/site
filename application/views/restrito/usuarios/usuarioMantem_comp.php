
<?php

use enums\TipoUsuario;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div>
            <?= form_open('restrito/usuarios/salvarUsuario', 'id="formCadastroUsuario" enctype="multipart/form-data"') ?>
            <div class="box-body">
                <!-- select -->
                <div class="form-group">
                    <label>Membros*</label>
                    <select id="id" name="id" class="form-control select2" <?= $id > 0 ? 'disabled' : '' ?> required>
                        <option value=""></option>  
                        <?php
                        foreach ($pessoas as $p):
                            ?>
                            <option 
                                value="<?= $p['id'] ?>"
                                <?= $id == $p['id'] ? 'selected' : '' ?>>
                                    <?= $p['nome'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div><!-- ./form-group -->
                <div class="form-group">
                    <label>Login*</label>
                    <input type="text" id="login" name="login" class="form-control" 
                           max-length="45" placeholder="Login" 
                           value="<?= isset($login) ? $login : '' ?>" required>
                </div><!-- form group -->
                <div class="form-group">
                    <a  <?= empty($id) ? ' style="display: none" ' : '' ?>  id="alterarSenha" class="btn btn-default">Alterar Senha</a>
                </div><!-- ./form-group -->
                <div class="form-group">
                    <label>Senha*</label>
                    <input type="password" id="senha" name="senha" class="form-control" 
                           placeholder="Senha" <?= !empty($id) ? ' disabled ' : '' ?>required>
                </div><!-- form group -->
                <div class="form-group">
                    <label>Confirmar Senha*</label>
                    <input type="password" id="confSenha" class="form-control" 
                           placeholder="Confirmar Senha"  <?= !empty($id) ? ' disabled ' : '' ?>required>
                </div><!-- form group -->

            </div><!-- /.box-body -->
            <div class="box-footer">
                <button id="submit" type="submit" class="btn btn-primary pull-right">Salvar</button>
            </div>
            <?= form_close(); ?>
        </div><!-- /.box -->
    </div>

    <script>
        $(function () {
            $(".select2").select2();
        });

        var password = document.getElementById("senha")
                , confirm_password = document.getElementById("confSenha");

        function validatePassword() {
            if ($('#senha').val() !== $('#confSenha').val()) {
                confirm_password.setCustomValidity("Senhas não batem!");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        $('#confSenha').on('keyup', function () {
            validatePassword();
        });
        $('#senha').on('change', function () {
            validatePassword();
        });

        $('#alterarSenha').on('click', function () {
            $('#senha').attr('disabled', false);
            $('#confSenha').attr('disabled', false);
        });
        
        $('#submit').on('click', function () {
            $('#id').prop('disabled', false);
        });
    </script>