<?php foreach ($albuns as $a): ?>
    <div class="foto_click"  
         style="float: left; display: table;"
         onclick='carregaAlbumFooter(this, <?=$a->getId()?>)'>
             <?php
             $flickr = $a->getFlickr();
             $title = $a->getNomeAlbum();
             ?>
             <?= $flickr ?>
    </div>
        <input id="<?= 'titulo' . $a->getId() ?>" type='hidden' value="<?= $title ?>">
        <input id="<?= 'evento' . $a->getId() ?>" type='hidden' value="<?= $a->getNomeEvento() ?>">
<?php endforeach; ?>
