<h2><a target="_blank" href="<?= base_url('departamento/' . $apelido) ?>"><?= $apelido ?></a></h2>
<p class="underh2"><?= $nomeCompleto ?>.</p>
<a href="ang"><img src="<?= base_url($foto) ?>" alt="<?= $nomeCompleto ?>" title="<?= $nomeCompleto ?>" /></a>
<?php
$contAng = 0;
$id = 0;
$dataHoje = date("Y-m-d");
if (sizeof($noticias)) {
    $id = $noticias[0]->getDepartamento()->getId();
    foreach ($noticias as $noticia):
        $data = $noticia->getDataEvento() != null ? $noticia->getDataEvento()->format('d/m/Y') : $noticia->getDataCadastro()->format('d/m/Y');
        ?>
        <p class="resumo">&bull;&nbsp;<?= $data ?> - 
            <a target="_blank" style="color:#BD1B1B;" href="<?= base_url('noticia/' . $noticia->getId()) ?>">
                <?= htmlentities(limitaTexto($noticia->getTitulo(), 22)) ?></a>
                <?php
            $saiNova = $noticia->getDataSaiNovo() != null ? $noticia->getDataSaiNovo()->format('Y-m-d') : $dataHoje;
            if ($dataHoje < $saiNova) :
                ?>
                <font color="red"><sup>nova</sup></font>
            <?php endif; ?>
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
<p><a href="<?= base_url('noticia/lista/') ?>" class="index_rm">Leia mais &raquo;</a></p>
