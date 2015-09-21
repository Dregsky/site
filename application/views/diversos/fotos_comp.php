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
            <div class="foto_click" onclick='carregaAlbum(this)'>
                <p class="titulo_fotos"> <?= limitaTexto($title, 25) ?></p>
                <?= $flickr ?>
                <input type='hidden' value="<?=$title?>">
                <p></p>
                <p></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>