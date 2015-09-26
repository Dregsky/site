<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Home
        <small>Deus seja Louvado!</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="glyphicon glyphicon-home"></i>Home</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
 <?php
    $message = $this->session->flashdata('message');
    if ($message != null) :
        ?>
        <input id='alert' type='hidden' value="<?= $message ?>">
        <script>
            var a = $('#alert').val();
            bootbox.alert(a, function () {
            });
        </script>
    <?php endif; ?>
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Bem-vindo</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <h1>GERENCIADOR DE CONTEÚDO SITE ADCRUZ!</h1>
        </div><!-- /.box-body -->
        <div class="box-footer">
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->