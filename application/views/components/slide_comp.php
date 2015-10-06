<?php

use enums\TipoSlide; ?>
<div class="slider">
    <div id="coin-slider">
        <?php
        foreach ($banners as $banner):
            if ($banner->getTipoSlide() == TipoSlide::COMUNICADO || $banner->getTipoSlide() == TipoSlide::NOTICIA) {
                $banner->setLink(base_url($banner->getLink()));
            }
            ?>
            <a href="<?= $banner->getLink() ?>" <?=$banner->getLink()!= '#'? ' target="_blank"' : ''?>>
                <img src="<?= base_url($banner->getFoto()) ?>"  alt="slide2" />
            </a>
<?php endforeach; ?>
    </div>				
    <div class="clr"></div>
</div>	