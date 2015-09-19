<?php foreach ($albuns as $a): ?>
<div class="foto_click"  
     style="float: left; display: table;"
     onclick='carregaAlbumFooter(this)'>
    <?php
    $flickr = $a->getFlickr();
    $title = utf8_decode($a->getNomeAlbum());
    ?>
<?= $flickr ?>
    <input type='hidden' value="<?= $title ?>">
</div>
<?php endforeach; ?>
