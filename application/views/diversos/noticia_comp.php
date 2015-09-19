<div class="fcol1" >
    <div class="title-noticia">
        <h3>
            <?= htmlentities($noticia->getTitulo()) ?>
        </h3>
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
    </div>

    <table>
        <tr><td height="135"></td></tr>
    </table>
</div>