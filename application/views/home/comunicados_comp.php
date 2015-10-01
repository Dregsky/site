<h2>Comunicados</h2>
<?php
foreach ($comunicados as $comunicado):
    $dataSaiComunicado = $comunicado->getDataSaiNovo()->format('Y-m-d');
    ?>
    <p class="comunicado-line">&bull;&nbsp;
        <?php echo $comunicado->getDataCadastro()->format('d/m/Y'); ?> - 
        <a href="<?=base_url('comunicado/'.$comunicado->getId()) ?>">
            <font color="#2e2e2e"><?php echo limitaTexto($comunicado->getAssunto(),19); ?></font>
        </a>
        <?php
        if ($dataHoje <= $dataSaiComunicado) :
            ?>
            <sup><font color="red">novo</font></sup>
            <?php
        endif;
        ?>
        <br />
    </p>
    <?php
endforeach;
