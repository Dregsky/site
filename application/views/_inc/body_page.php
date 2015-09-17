<body>
    <header id="header">
        <div id="header_site">
            <div class="header_banner">
                <div class="logo">
                    <a href="<?=base_url()?>"><img src="<?= base_url('public/images/logo/logo_adcruz_final.png') ?>">
                    </a>	
                </div>
                <div class="header_right">
                </div>
            </div>
            <?php echo html_entity_decode($menu); ?>
        </div>
    </header>
    <div id="page">
        <?php echo html_entity_decode($customPage); ?>
    </div>
</body>

