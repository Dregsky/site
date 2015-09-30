/**
 * Paginação testemunhos
 */

function carregarPaginaTestemunho(pagina) {
    $.ajax({
        url: BASE_URL + "ajax/AjaxController/ajaxTestemunhoNewPage",
        type: 'POST',
        data: {'pagina': pagina},
        success: function (data) {
            var result = data;
            var setas = $('.setas');
            var next = $('.next');
            var prev = $('.prev');
            var total = $('#total').val();
            var regPorPag = $('#regPorPag').val();
            if (!(prev.length)) {
                prev = "<div class='prev'></div>"
                        + "<script>"
                        + "$('.prev').on('click', function () {"
                        + " var page = parseInt($('.texto_paginacao_pgatual').text()) - 2;"
                        + 'carregarPaginaTestemunho(page);'
                        + '});'
                        + '</script>';
                setas.append(prev);
            } else if (pagina <= 0) {
                prev.remove();
            }

            if (next.length && ((pagina + 1) * regPorPag) >= total) {
                next.remove();
            } else if (!next.length) {
                next = "<div class='next'></div>"
                        + "<script>"
                        + "$('.next').on('click', function () {"
                        + " var page = parseInt($('.texto_paginacao_pgatual').text());"
                        + 'carregarPaginaTestemunho(page);'
                        + '});'
                        + '</script>';
                setas.append(next);
            }
            var test = $('#testemunhos');
            var paginaAnterior = $('#paginaAnterior').val();
            test.empty();
            test.append(result);
            var corpo = $('#testemunhos_body');
            
            if(pagina > paginaAnterior){
                corpo.addClass('bounceInLeft');
            }else{
                corpo.addClass('bounceInRight');
            }
            //corpo.css({'position': 'relative',
              //  'left': '-160px',
                //'opacity': '0.1'});
            //corpo.animate({'left': '0', 'opacity': '1'});
        }
    });

}

function carregarPaginaNoticia(pagina) {
    $.ajax({
        'url': BASE_URL + "/ajax/AjaxController/ajaxNoticiaNewPage",
        'type': 'POST',
        'data': {'pagina': pagina},
        'success': function (data) {
            var result = data;
            var setas = $('.setas');
            var next = $('.next');
            var prev = $('.prev');
            var total = $('#total').val();
            var regPorPag = $('#regPorPag').val();
            if (!(prev.length)) {
                prev = "<div class='prev' style='margin: 101px 0px 0px -59px;'></div>"
                        + "<script>"
                        + "$('.prev').on('click', function () {"
                        + " var page = parseInt($('.texto_paginacao_pgatual').text()) - 2;"
                        + 'carregarPaginaNoticia(page);'
                        + '});'
                        + '</script>';
                setas.append(prev);
            } else if (pagina <= 0) {
                prev.remove();
            }

            if (next.length && ((pagina + 1) * regPorPag) >= total) {
                next.remove();
            } else if (!next.length) {
                next = "<div class='next' style='margin: 100px -65px 0px 0px;'></div>"
                        + "<script>"
                        + "$('.next').on('click', function () {"
                        + " var page = parseInt($('.texto_paginacao_pgatual').text());"
                        + 'carregarPaginaNoticia(page);'
                        + '});'
                        + '</script>';
                setas.append(next);
            }
            var test = $('#noticias');
            var paginaAnterior = $('#paginaAnterior').val();
            test.empty();
            test.append(result);
            var corpo = $('#noticias_body');
            
            if(pagina > paginaAnterior){
                corpo.addClass('bounceInLeft');
            }else{
                corpo.addClass('bounceInRight');
            }
            //corpo.css({'position': 'relative',
              //  'left': '-160px',
                //'opacity': '0.1'});
            //corpo.animate({'left': '0', 'opacity': '1'});
        }
    });

}