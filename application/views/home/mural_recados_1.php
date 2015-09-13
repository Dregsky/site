<div id="columns">
    <div class="index-cols">
        <div class="index-col-1">
            <a href="faleComPastor.php"><img src="<?php echo base_url('public/images/home/fale_com_pastor.png') ?>" /></a>
            <!--iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fassembleiadedeusdocruzeiro&amp;width=280&amp;height=300&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=true&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:280px; height:300px;" allowTransparency="true"></iframe-->
        </div>
        <div class="index-col2">
            <h2>Comunicados</h2>
            <?php
            foreach ($comunicados as $comunicado):
                $dataSaiComunicado = $comunicado->getDataSaiNovo()->format('Y-m-d');
                ?>
                <p>&bull;&nbsp;
                    <?php echo $comunicado->getDataCadastro()->format('d/m/Y'); ?> - 
                    <a href="comunicados.php?cod_comunicado=<?php echo $comunicado->getId(); ?>">
                        <font color="#2e2e2e"><?php echo htmlentities($comunicado->getAssunto()); ?></font>
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
            ?>
        </div>
        <div class="index-col3">
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
        </div>
    </div>
</div>