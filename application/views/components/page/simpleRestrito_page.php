<?php
$back = $this->session->flashdata('back');
if ($back != null) {
    echo processBack($back);
    $this->session->set_flashdata('back', null);
}
?>
<section class="content-header">
    <h1>
        <?= $title ?>
        <small>Deus seja louvado!</small>
    </h1>
    <ol class="breadcrumb">
        <?php
        foreach ($breadcrumbs as $i => $b):
            if ($i == 0) {
                ?>
                <li><a href="#">
                        <i class="fa fa-dashboard <?= $i == (count($breadcrumbs) - 1) ? 'active' : '' ?>">
                            <?= $b ?>
                        </i>
                    </a>
                </li>
            <?php } else { ?>
                <li class="<?= $i == (count($breadcrumbs) - 1) ? 'active' : '' ?>"><?= $b ?></li>
                <?php
            }
        endforeach;
        ?>
    </ol>
</section>

<section class="content">
    <?php
    $alert = $this->session->flashdata('alert');
    $message = $this->session->flashdata('message');
    if ($alert != null) :
        ?>
        <input id='alert' type='hidden' value="<?= $message ?>">
        <script>
            var a = $('#alert').val();
            bootbox.alert(a, function () {
            });
        </script>
        <p class="login-box-msg"><?= process_alert($alert); ?></p>
    <?php endif; ?>
    <?= $content ?>
</section><!-- /.content -->
