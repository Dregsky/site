<body>
    <header id="header">
        <div id="header_site">
            <div class="header_banner">
                <div class="logo_left">
                    <a title="ADCruz" href="<?= base_url() ?>"><img src="<?= base_url('public/images/logo/logo_adcruz_final.png') ?>">
                    </a>	
                </div>
                <div class="logo_right">
                    <a title="Catedral Baleia" target="_blanck" href="http://www.catedralbaleia.com.br/">
                        <img src="<?= base_url('public/images/logo/KtDraw.png') ?>">
                    </a>
                </div>
            </div>
            <?php echo html_entity_decode($menu); ?>
        </div>
    </header>
    <div id="page">
        <?php echo html_entity_decode($customPage); ?>
    </div>
</body>

