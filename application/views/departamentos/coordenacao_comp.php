<div class="index-cols_dirigentes wrapper1">
    <?php foreach($pessoas as $p): ?>
    <div class="col_coordenacao">
        <a href="#"><img src="<?= base_url('public/images/membros/'.$p['foto']) ?>" alt="image" /></a>
        <h4><?= $p['nome'] ?></h4>
        <p class="underh4"><?= $p['cargo'] ?></p>
        <p></p>
    </div>
    <?php endforeach;?>
    <div class="clr"></div>

</div>