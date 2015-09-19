<footer id="page_bottom">
    <div id="footer">
        <div class="fcols">
            <div class="fcol1">
                <h2>Colaboradores</h2>

                <div class="fnews"> 
                    <a href="http://www.telashow.com" target="_blank">
                        <img src="<?= base_url('public/images/footer/telashow.jpg') ?>" width="64" height="44" alt="icon" class="lefticon" />
                    </a> 
                    <font color="#ffffff" style="font-size:18px">
                    <a href="http://www.telashow.com" target="_blank">TelaShow</a>
                    </font>
                    <br/>
                    <font color="#ffffff">Telões Elétricos para Projeção.</font>
                </div>

                <div class="fnews"> 
                    <img src="<?= base_url('public/images/footer/namuchila.jpg') ?>" width="64" height="44" alt="icon" class="lefticon" />
                    <font color="#ffffff" style="font-size:18px">
                    <a href="http://www.namuchila.com" target="_blank">Na Muchila</a>
                    </font>
                    <br/>
                    <font color="#ffffff">Com você pelos caminhos.</font>
                </div>

            </div>

            <div class="fcol2">
                <h2>Links Úteis</h2>
                <ul>
                    <li><a href="http://www.google.com" target="_blank">Google</a></li>
                    <li><a href="http://www.bb.com.br" target="_blank">Banco do Brasil</a></li>
                    <li><a href="http://www.caixa.gov.br" target="_blank">Caixa Econômica Federal</a></li>
                    <li><a href="http://www.catedralbaleia.com.br" target="_blank">Catedral</a></li>
                    <li><a href="http://www.telashow.com" target="_blank">TelaShow</a></li>
                    <li><a href="estudos_biblicos.php">Estudos Bíblicos</a></li>
                    <li><a href="faleComPastor.php">Fale com o Pastor</a></li>
                    <li><a href="http://twitter.com/adcruzJesus" target="_blank">Twitter</a></li>
                    <li><a href="http://www.youtube.com/user/adcruznet" target="_blank">YouTube</a></li>
                </ul>
            </div>

            <div class="fcol3">
                <a href="<?= base_url('diversos/fotos') ?>"><h2>Galeria de Fotos</h2></a>
                <?= $fotos ?>
                <!--p>Sed sit amet turpis nisl. Mauris digim euismod nibh <a href="#" class="readmore">more ...</a></p-->
            </div>
            <div class="clr"></div>
        </div>

        <div class="text1">
            &copy; Copyright <a href="#">ADCruz 2011</a>. Todos os direitos reservados.
            <br/>
            QD 07 - Área Especial 01 
            <br/>
            Cruzeiro Velho
            <br/>
            Fone: (61) 3964-8624 / 3233-2527
        </div>
        <div class="redes-sociais">
            <table style="text-align: left; width: 200px;" border="0"
                   cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td style="text-align: left;" valign="undefined">
                            <a href="LINK_DO_FACEBOOK" target="_blank">
                                <img style="" alt=""
                                     src="<?= base_url('public/images/icons/icon-face.png') ?>" title="Facebook" />
                            </a >
                        </td>
                        <td style="text-align: left;" valign="undefined">
                            <a href="LINK_DO_TWITTER" target="_blank">
                                <img src="<?= base_url('public/images/icons/icon-twitter.png') ?>" title="Twitter" />
                            </a>
                        </td>
                        <td style="text-align: left;" valign="undefined">
                            <a href="LINK_DO_YOUTUBE" target="_blank">
                                <img src="<?= base_url('public/images/icons/icon-youtube.png') ?>" title="YouTube" />
                            </a>
                        </td>
                        <!--
                        <td style="text-align: left;" valign="undefined">
                            <a href="LINK_DO_INSTAGRAM" target="_blank">
                                <img src="<?= base_url('public/images/icons/icon-insta.png') ?>" title="Instagram" />
                            </a>
                        </td>
                        -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="clr"></div>

</footer>
<input id="menuSelecionado" type="hidden" value="<?= $menuSelecionado ?>">
<script>
    $(document).ready(function () {
        var menu = $("#menuSelecionado").val();
        $("#"+menu).addClass('active');
        
    });
</script>

<?= $this->load->view('components/modalSlide_comp', '', true) ?>




