<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ADCruz | Login</title>
        <link rel="icon" href="<?= base_url('public/images/favicon-adcruz.png') ?>" type="image/gif"/>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Style custom -->
        <link rel="stylesheet" href="<?= base_url('public/css/restrito/style.css') ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?= base_url('public/bootstrap/css/bootstrap.min.css') ?>" >
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url('public/css/restrito/template/AdminLTE.min.css') ?>" >
        <!-- iCheck -->
        <link rel="stylesheet" href="<?= base_url('public/plugins/iCheck/square/square.css') ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>ADCruz</b>Restrito</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <?php
                $alert = $this->session->flashdata('alert');
                if ($alert != null) :
                    ?>

                    <p class="login-box-msg"><?= process_alert($alert); ?></p>
                <?php endif; ?>
                <?= form_open('restrito/login/logar') ?>
                <div class="form-group has-feedback">
                    <input style="cursor:pointer"  type="text" class="form-control" name="login" placeholder="Usuário" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-black btn-block btn-flat">Entrar</button>
                    </div><!-- /.col -->
                </div>
                <?= form_close() ?>

                <a href="<?= base_url('restrito/login/recuperarSenha') ?>">Esqueci minha senha</a><br>

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.4 -->
        <script type="text/javascript" src="<?= base_url('public/plugins/jQuery/jQuery-2.1.4.min.js') ?>"></script>
        <!-- Bootstrap 3.3.5 -->
        <script type="text/javascript" src="<?= base_url('public/bootstrap/js/bootstrap.min.js') ?>"></script>
        <!-- iCheck -->
        <script type="text/javascript" src="<?= base_url('public/plugins/iCheck/icheck.min.js') ?>"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square',
                    radioClass: 'iradio_square',
                    increaseArea: '20%' // optional
                });
            });

            $(window).load(function () {
                $('input[name=login]').focus();
            });
        </script>
    </body>
</html>
