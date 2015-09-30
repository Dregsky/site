<div class="index-cols_dirigentes wrapper1">
    <?php $i = 1 ?>
    <?php foreach ($pessoas as $p): ?>
        <?php if ($i == 1) : echo '<div class="row">';
        endif; ?>
        <div class="col_coordenacao">
            <a href="#"><img src="<?= processaImagem($p['foto'], $p['genero']) ?>" alt="image" /></a>
            <h4><?= $p['nomePessoa'] ?></h4>
            <p class="underh4"><?= $p['nomeCargo'] ?></p>
            <p></p>
        </div>
        <?php
        if ($i == 5) {
            echo '</div>';
            $i = 0;
        }
        $i++;
        ?>
<?php endforeach; echo '</div>'?>
</div>