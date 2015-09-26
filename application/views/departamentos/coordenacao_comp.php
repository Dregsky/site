<div class="index-cols_dirigentes wrapper1">
    <?php foreach ($pessoas as $p): ?>
        <div class="col_coordenacao">
            <a href="#"><img src="<?= processaImagem($p['foto'], $p['genero']) ?>" alt="image" /></a>
            <h4><?= $p['nomePessoa'] ?></h4>
            <p class="underh4"><?= $p['nomeCargo'] ?></p>
            <p></p>
        </div>
    <?php endforeach; ?>
    <div class="clr"></div>

</div>