<h2>Mural de recados</h2>
<?php
foreach ($recados as $recado):
    $dataSaiRecado = $recado->getDataSaiNovo()->format('Y-m-d');
    ?>
    <div class="entry">
        <p>&bull;&nbsp;
            <?php echo htmlentities(limitaTexto($recado->getMensagem(), 73)) ?>
            <?php
            if ($dataHoje <= $dataSaiRecado) :
                ?>
                <sup><font color="red">novo</font></sup>
                <?php
            endif;
            ?>
        </p>
    </div>	
    <?php
endforeach;
?>
<p><a href="muralDeRecados.php" class="index_rm">Ver Todos &raquo;</a></p>