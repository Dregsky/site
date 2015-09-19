<div class="fcol1">
    <div class="title-noticia">
        <h3>
            <?= htmlentities($comunicado->getAssunto()) ?>
        </h3>
    </div>
    <div class="fnews">
            <div>
                <img class="img_noticia"
                     src="<?= base_url('public/images/megafone.png') ?>" 
                     width="304" height="240" alt="Comunicado" />
            </div>
        <div class="texto_interno_noticias">
            <?= $comunicado->getDescricao() ?>
        </div>
        <p class="texto_interno_noticias noticia_fonte">
            <b>Data de inclusão do comunicado: <i><?= $comunicado->getDataCadastro()->format('d/m/Y'); ?></i></b>
        </p>
    </div>

    <table>
        <tr><td height="135"></td></tr>
    </table>
</div>