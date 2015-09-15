<?php
switch ($type):
    case 'word':
        ?>
        <?php foreach ($docs as $d): ?>
            <p>
                <img src="<?= base_url('public/images/icons/word.png'); ?>" width="32" height="32" style="float: left" />
                <a href="<?= base_url("public/estudos/" . $d->arquivo) ?>" target="_blank">
                    <?= $d->nome ?>
                </a>
            </p>
            <p></p>
            <?php
        endforeach;
        break;

    case 'pdf':
        ?>

        <?php foreach ($docs as $d): ?>
            <p>
                <img src="<?= base_url('public/images/icons/pdf.png'); ?>" width="32" height="32" style="float: left" />
                <a href="<?= base_url("public/estudos/" . $d->arquivo) ?>" target="_blank">
                    <?= $d->nome ?>
                </a>
            </p>
            <p></p>
            <?php
        endforeach;
        break;
endswitch;
?>