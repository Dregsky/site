<footer id="page_bottom">
    <div id="footer">
        <div class="fcols">
            <div class="fcol1">
                <h2>Colaboradores</h2>

                <div class="fnews"> 
                    <a href="#" class="colaborador">
                        <img class="img-colaborador"src="<?= base_url('public/images/footer/terapia_susy.JPG') ?>" width="64" height="44" alt="icon" class="lefticon" />
                    </a> 
                    <font color="#ffffff" style="font-size:18px">
                    <a href="#" class="colaborador">Spaço Terapia</a>
                    </font>
                    <br/>
                    <font color="#ffffff">Sueli Massoterapeuta</font>
                </div>
                <div class="fnews"> 
                    <a href="http://renatamyracosmeticos.boxloja.com/" target="_blank">
                        <img src="<?= base_url('public/images/footer/renatamyracosmeticos.jpg') ?>" width="64" height="44" alt="icon" class="lefticon" />
                    </a> 
                    <font color="#ffffff" style="font-size:18px">
                    <a href="http://renatamyracosmeticos.boxloja.com/" target="_blank">Renata Myra Cosméticos</a>
                    </font>
                    <br/>
                    <font color="#ffffff" style="font-size:12px" >Revendedora, Consultora. Pronta Entrega.</font>
                </div>
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
            &copy; Copyright <a href="#">ADCruz 2015</a>. Todos os direitos reservados.
            <br/>
            <a href="<?= base_url('diversos/localizacao') ?>">Mapa</a>
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
                            <a href="https://www.facebook.com/assembleiadedeusadcruz" target="_blank">
                                <img style="" alt=""
                                     src="<?= base_url('public/images/icons/icon-face.png') ?>" title="Facebook" />
                            </a >
                        </td>
                        <td style="text-align: left;" valign="undefined">
                            <a href="http://twitter.com/adcruzJesus" target="_blank">
                                <img src="<?= base_url('public/images/icons/icon-twitter.png') ?>" title="Twitter" />
                            </a>
                        </td>
                        <td style="text-align: left;" valign="undefined">
                            <a href="https://www.youtube.com/channel/UC1YqXqu9V6fjHoSPqMUNeyw/videos" target="_blank">
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
        $("#" + menu).addClass('active');

    });

    $('.colaborador').on('click', function () {
        var conteudoModal = $('#conteudoModal');
        conteudoModal.empty();
        img = $('.img-colaborador').clone();
        img.addClass('flickr-medium');
        conteudoModal.append(img);
        $('#modalSlide h4').empty();
        $('#modalSlide h4').append('Colaborador');
        $('.content-footer').hide();
        $('#modalSlide').modal('show');
        return false;
    });
</script>

<?= $this->load->view('components/modalSlide_comp', '', true) ?>
<script async src="//embedr.flickr.com/assets/client-code.js" charset="utf-8"></script>


