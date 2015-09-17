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
                <h2>Galeria de Fotos</h2>
                <a href="images/album/virada_de_ano/exibir_fotos.php?cod_album=14" title="" target="_blank">
                    <img src="<?= base_url('public/images/album/virada_de_ano/exibir.jpg') ?>" alt="Sign of the times" width="75" height="75"/>
                </a>
                <a href="images/album/cruzada_15052010/exibir_fotos.php?cod_album=2" title="" target="_blank">
                    <img src="<?= base_url('public/images/album/cruzada_15052010/exibir.jpg') ?>" alt="Another City Sunrise" width="75" height="75"/>
                </a>
                <a href="images/album/dia_com_Deus/exibir_fotos.php?cod_album=12" title="City Girl" target="_blank">
                    <img src="<?= base_url('public/images/album/dia_com_Deus/exibir.jpg') ?>" alt="" width="75" height="75"/>
                </a>
                <a href="images/album/160_almas/exibir_fotos.php?cod_album=11" title="We Still Care" target="_blank">
                    <img src="<?= base_url('public/images/album/160_almas/exibir.jpg') ?>" alt="" width="75" height="75"/>
                </a>
                <a href="images/album/orquestra_abertura_2010/exibir_fotos.php?cod_album=5" title="Artwork for Advanced Photoshop" target="_blank">
                    <img src="<?= base_url('public/images/album/orquestra_abertura_2010/exibir.jpg') ?>" alt="" width="75" height="75"/>
                </a>
                <a href="images/album/cantata_2009/exibir_fotos.php?cod_album=1" title="shaun white" target="_blank">
                    <img src="<?= base_url('public/images/album/cantata_2009/exibir.jpg') ?>" alt="" width="75" height="75"/>
                </a>					
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
<?= $this->load->view('components/modalSlide_comp','',true) ?>




