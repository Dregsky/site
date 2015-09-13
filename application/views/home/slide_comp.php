<div class="slider">
    <div id="coin-slider">
        <a href="http://www.comcad2013.com/" target="_blank">
            <img src="public/images/banner_seminario_discipulado_2013.jpg" alt="slide2" />
        </a>
        <a href="http://www.comcad2013.com/" target="_blank">
            <img src="public/images/banner_comcad_2013.jpg" alt="slide2" />
        </a>
        <a href="ebd">
            <img src="public/images/banner_ebd_1tri_2013.jpg" alt="slide2" />
        </a>
        <?php
        foreach ($noticias as $noticia) :
            if (!empty($noticia['fotoNoticia'])):
                ?>
                <a href="noticias.php?cod_noticia=<?php echo $noticia['id'] ?>">
                    <img src="<?php echo base_url('/public/images/noticias/' . $noticia['fotoNoticia']) ?>" width="960" height="268"/>
                </a>
                <?php
            endif;
        endforeach;
        ?>
        <a href="#">
            <img src="public/images/banner_doacao_adcruz.jpg" width="960" height="268" alt="slide2" />
        </a>
        <a href="#">
            <img src="public/images/projeto_epomenos_2013.jpg" width="960" height="268"/>
        </a>
    </div>				
    <div class="clr"></div>
</div>	
