
<div class="fcol1">

    <div class="fnews">
        <p>
        </p>

        <h2 style="padding: 0 0 0 3%"><?php echo htmlentities("Aqui você confere o que Deus tem feito na vida dos irmãos da ADCRUZ.") ?></h2>

        <p></p>

        <p class="texto_interno_noticias">
            <a href="<?= base_url('diversos/testemunho/cadastro') ?>"><?php echo htmlentities("Deixe seu testemunho aqui.") ?></a>
        </p>
        <center id="paginas">
            <?php
            for ($i = 0; ($i * $regPorPagina) <= $total; $i++):
                if ($i == ($next - 1)) {
                    ?>
                    <strong class='texto_paginacao_pgatual'><?= ($i + 1) ?></strong>
                <?php } else { ?>
                    <a onclick="carregarPaginaTestemunho(<?= $i ?>)" class='texto_paginacao'><?= ($i + 1) ?></a>
                <?php } endfor; ?>
        </center>
        <p></p>
        <div id="testemunhos_body">
            <?php foreach ($testemunhos as $i => $t) : ?>
                <div class="<?= ($i % 2) == 0 ? 'div_testemunho' : 'div_testemunho2' ?>">
                    <h2 class="nome_testemunho">
                        <?= $t->getNomeTestemunho() ?> - <span class="nome_irmao_testemunho"><?php echo htmlentities("Irmão (ã):") ?> 
                            <?= $t->getNomePessoa() ?></span>
                    </h2>
                    <p class="descricao_testemunho">
                        <?= $t->getDescricao() ?>
                    </p>
                    <p class="descricao_testemunho">
                        <span class="postadoEm">Postado em: <?= $t->getDataCadastro()->format('d/m/Y') ?></span>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <input id="total" type="hidden" value="<?= $total ?>"/>
    <input id="paginaAnterior" type="hidden" value="<?= ($next-1) ?>"/>
    <input id="regPorPag" type="hidden" value="<?= $regPorPagina ?>"/>
</div>