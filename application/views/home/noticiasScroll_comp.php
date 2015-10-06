<link rel="stylesheet" type="text/css" href="<?= base_url('public/css/site/swiper.min.css') ?>" media="screen" />
<script type="text/javascript" src="<?= base_url('public/js/swiper.min.js') ?>"><!-- ajax custom scripts --></script>

<div class="swiper-container">    
    <div class="swiper-wrapper">
        <?php foreach ($noticias as $n) : ?>
            <div class="swiper-slide">
                <div class="col-noticia">
                    <?= $n ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next" style="display:none"></div>
    <div class="swiper-button-prev" style="display:none"></div>
</div>
<script type="text/javascript">

var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    autoplay: 8000,
    autoplayDisableOnInteraction: false,
    loop: true,
    coverflow: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true
    }
});

$('.swiper-container').mouseover(function(){
    $('.swiper-button-prev').show();
    $('.swiper-button-next').show();
});
$('.swiper-container').mouseout(function(){
    $('.swiper-button-prev').hide();
    $('.swiper-button-next').hide();
});
</script>

