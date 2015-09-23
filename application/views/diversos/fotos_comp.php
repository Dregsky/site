<div class="index-cols_fotos">
    <?php
    $year = '';
    foreach ($albuns as $a):

        if (($a->getAnoAlbum() != $year)) {
            $year = $a->getAnoAlbum();
            echo '<div class="clr"></div>';
            echo '<h2>' . $year . '</h2>';
        }
        ?>
        <div class="index-col1_fotos">
            <?php $flickr = $a->getFlickr(); 
                   $title = $a->getNomeAlbum();
            ?>
            <div title="<?=$title?>" class="foto_click" onclick='carregaAlbum(this, <?=$a->getId()?>)'>
                <p class="titulo_fotos"> <?= limitaTexto($title, 25) ?></p>
                <?= $flickr ?>
                <p></p>
                <p></p>
            </div>
            <input id="<?= 'titulo' . $a->getId() ?>" type='hidden' value="<?= $title ?>">
                <input id="<?= 'evento' . $a->getId() ?>" type='hidden' value="<?= $a->getNomeEvento() ?>">
        </div>
    <?php endforeach; ?>
</div>