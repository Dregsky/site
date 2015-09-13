<h2><a href="ang"><?= $apelido ?></a></h2>
<p class="underh2">&bull;&nbsp; <?= $nomeCompleto ?>.</p>
<a href="ang"><img src="images/ang.png" width="283" height="102" alt="<?= $nomeCompleto ?>" title="<?= $nomeCompleto ?>" /></a>
<?php
$cod_perfil = 7;
$codPerfil = addslashes($cod_perfil);
$sqlAng = "SELECT * FROM tbl_noticia WHERE cod_perfil = {$cod_perfil} ORDER BY cod_noticia DESC LIMIT 2";
$consultaAng = mysql_query($sqlAng);
$contAng = 0;
if (sizeof($noticias)) {
    foreach ($noticias as $noticia):
    ?>
    <p>&bull;&nbsp;<?= $noticia->getDataCadastro()->format('d/m/Y'); ?> - 
        <a href="ang/noticias.php?cod_noticia=<?= $noticia->getId() ?>">
        <?= htmlentities(limitaTexto($noticia->getTitulo(), 27)) ?></a>
    </p>
    <?php
    $contAng++;
    endforeach;
    if ($contAng == 1) {
        echo "<p>&nbsp;</p>";
    }
} else {
    echo "<p>&nbsp;</p>";
    echo "<p>&nbsp;</p>";
}
?>
<p><a href="#" class="index_rm">Leia mais &raquo;</a></p>
