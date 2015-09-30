<div class="fcol1" >
    <div class="title-noticia">
        <h3>
            <?= htmlentities($noticia->getTitulo()) ?>
        </h3>
        <h5>
            <?= htmlentities($noticia->getSubTitulo()) ?>
        </h5>
    </div>
    <div class="redes_sociais_botoes">
        <?= $redesSociais ?>
    </div>
    <div class="fnews">
        <?php if ($noticia->getFotoNoticia() != null): ?>
            <div>
                <img class="img_noticia"
                     src="<?= base_url('public/images/noticias/' . $noticia->getFotoNoticia()) ?>" 
                     width="304" height="240" alt="<?= $noticia->getFotoNoticia() ?>" />
            </div>
        <?php endif; ?>
        <div class="texto_interno_noticias">
            <?= $noticia->getDescricao() ?>
        </div>
        <p class="texto_interno_noticias noticia_fonte">
            <b>Fonte: <i><?= $noticia->getFonte() ?></i></b>
        </p>
        <p style="font-size:8pt" class="texto_interno_noticias">
            Data Notícia: <?= $noticia->getDataCadastro()->format('d/m/Y') ?></p>

    </div>

    <table>
        <tr><td height="135"></td></tr>
    </table>
    <!-- cole o código da sua caixa aqui -->
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.4&appId=835074536612924";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <div class="fb-comments" data-href="http://www.adcruz.net/site/noticia/<?= $noticia->getId() ?>" data-width="930" data-numposts="10"></div>
</div>