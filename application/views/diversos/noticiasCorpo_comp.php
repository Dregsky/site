
<div class="fcol1" style="margin-top: 45px;">

    <div class="fnews">
        <p>
        </p>
        <center id="paginas">
            <?php
            for ($i = 0; ($i * $regPorPagina) <= $total; $i++):
                if ($i == ($next - 1)) {
                    ?>
                    <strong class='texto_paginacao_pgatual'><?= ($i + 1) ?></strong>
                <?php } else { ?>
                    <a onclick="carregarPaginaNoticia(<?= $i ?>)" class='texto_paginacao'><?= ($i + 1) ?></a>
                <?php } endfor; ?>
        </center>
        <p></p>
        <div id="noticias_body">
            <?php foreach ($noticias as $i => $n) : ?>
                <div class="fnews wrapper1" style="margin-bottom: 10px; height: 100px; width: 930px;"> 
                    <p>
                        <?php $foto = ($n->getFotoNoticia()!= null)? $n->getFotoNoticia(): 'news.png'; ?>
                        <img style="float:left; margin-top: 25px;" class="img_noticia" 
                             src="<?=  base_url('public/images/noticias/'.$foto) ?>" 
                             width="154" height="68" alt="<?=$foto?>" />
                    </p>

                    <a href="<?=  base_url('noticia/'.$n->getId()) ?>">
                        <p class="texto_interno_noticias" style="line-height:170%; text-indent:20px;">
                            <font color="#2e2e2e"><?=$n->getTitulo() ?></font>
                        </p>
                    </a>
                    <div class="texto_interno_noticias" style="line-height:170%; text-indent:20px;">
                        <?php $fonte = $n->getFonte() != null ? $n->getFonte() : 'Nenhuma fonte'; ?>
                        <b>Fonte: <?= htmlentities(trim($fonte)) ?></b>
                    <p>(<?= $n->getDataCadastro()->format('d/m/Y') ?>)</p>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <input id="total" type="hidden" value="<?= $total ?>"/>
    <input id="paginaAnterior" type="hidden" value="<?= ($next - 1) ?>"/>
    <input id="regPorPag" type="hidden" value="<?= $regPorPagina ?>"/>
</div>