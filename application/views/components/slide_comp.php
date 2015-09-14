<div class="slider">
    <div id="coin-slider">
        <?php foreach($banners as $banner):?>
        <a href="<?= $banner['link']?>" target="_blank">
            <img src="<?= base_url('public/images/banner/'.$banner['path']); ?>"  alt="slide2" />
        </a>
        <?php endforeach;?>
    </div>				
    <div class="clr"></div>
</div>	
