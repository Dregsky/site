// <![CDATA[
$(function () {
    // Slider
    $('#coin-slider').coinslider({width: 960, height: 268, opacity: 1});

    // radius Box
    //$('.menusm .top_level, .topnav li a').css({"border-radius": "15px", "-moz-border-radius": "15px", "-webkit-border-radius": "15px"});
    $('.topnav ul').css({"border-radius": "19px", "-moz-border-radius": "19px", "-webkit-border-radius": "19px"});
    $('.topnav ul li ul').css({"border-top-left-radius": "0px", "border-top-right-radius": "0px", "-moz-border-radius-topleft": "0px", "-moz-border-radius-topright": "0px", "-webkit-border-top-left-radius": "0px", "-webkit-border-top-right-radius": "0px"});
    $('.topnav ul li ul li ul').css({"border-top-left-radius": "19px", "border-top-right-radius": "19px", "-moz-border-radius-topleft": "19px", "-moz-border-radius-topright": "19px", "-webkit-border-top-left-radius": "19px", "-webkit-border-top-right-radius": "19px"});
    $('.post-date, .post-leav a, #rightcol, .wp-pagenavi a, .wp-pagenavi .current, .index-cols .underh2, .index_rm').css({"border-radius": "6px", "-moz-border-radius": "6px", "-webkit-border-radius": "6px"});
});


// ]]>

$(function () {
    var nav = $('#nav1');
    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) {
            nav.addClass("menu-fixo");
        } else {
            nav.removeClass("menu-fixo");
        }
    });
});

$(function () {
    var nav = $('.setas');
    $(window).scroll(function () {
        if ($(this).scrollTop() > 250) {
            nav.addClass('setas-fixas');
        } else {
            nav.removeClass('setas-fixas');
        }
    });
});


/**
 * Telefone validação e máscara
 */
/* Máscaras ER */
function mascara(o, f) {
    v_obj = o;
    v_fun = f;
    setTimeout("execmascara()", 1);
}
function execmascara() {
    v_obj.value = v_fun(v_obj.value);
}
function mtel(v) {
    v = v.replace(/\D/g, "");             //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v = v.replace(/(\d)(\d{4})$/, "$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id(el) {
    return document.getElementById(el);
}
window.onload = function () {
    id('telefone').onkeyup = function () {
        mascara(this, mtel);
    }
}

/**
 * Validação data maior
 */

function validaDataMaiorAtual() {
    var hoje = new Date();
    var data = new Date($('input[name=data]').val());
    if (data < hoje) {
        alert('A Data inserida não pode ser menor que a data de hoje!');
        return false;
    }
    return true;
}

/**
 * Scripts CPF
 */

/*
 Valida CPF
 
 Valida se for CPF
 
 @param  string cpf O CPF com ou sem pontos e traço
 @return bool True para CPF correto - False para CPF incorreto
 */
function valida_cpf(valor) {

    valor = valor.value;
    // Garante que o valor é uma string
    valor = valor.toString();

    // Remove caracteres inválidos do valor
    valor = valor.replace(/[^0-9]/g, '');


    // Captura os 9 primeiros dígitos do CPF
    // Ex.: 02546288423 = 025462884
    var digitos = valor.substr(0, 9);

    // Faz o cálculo dos 9 primeiros dígitos do CPF para obter o primeiro dígito
    var novo_cpf = calc_digitos_posicoes(digitos, 10);

    // Faz o cálculo dos 10 dígitos do CPF para obter o último dígito
    var novo_cpf = calc_digitos_posicoes(novo_cpf, 11);

    // Verifica se o novo CPF gerado é idêntico ao CPF enviado
    if (novo_cpf === valor || valor.length === 0) {
        // CPF válido
        return true;
    } else {
        // CPF inválido
        alert('CPF Inválido');
    }

} // valida_cpf

/*
 calc_digitos_posicoes
 
 Multiplica dígitos vezes posições
 
 @param string digitos Os digitos desejados
 @param string posicoes A posição que vai iniciar a regressão
 @param string soma_digitos A soma das multiplicações entre posições e dígitos
 @return string Os dígitos enviados concatenados com o último dígito
 */
function calc_digitos_posicoes(digitos, posicoes) {

    var soma_digitos = 0;
    // Garante que o valor é uma string
    digitos = digitos.toString();

    // Faz a soma dos dígitos com a posição
    // Ex. para 10 posições:
    //   0    2    5    4    6    2    8    8   4
    // x10   x9   x8   x7   x6   x5   x4   x3  x2
    //   0 + 18 + 40 + 28 + 36 + 10 + 32 + 24 + 8 = 196
    for (var i = 0; i < digitos.length; i++) {
        // Preenche a soma com o dígito vezes a posição
        soma_digitos = soma_digitos + (digitos[i] * posicoes);

        // Subtrai 1 da posição
        posicoes--;

        // Parte específica para CNPJ
        // Ex.: 5-4-3-2-9-8-7-6-5-4-3-2
        if (posicoes < 2) {
            // Retorno a posição para 9
            posicoes = 9;
        }
    }

    // Captura o resto da divisão entre soma_digitos dividido por 11
    // Ex.: 196 % 11 = 9
    soma_digitos = soma_digitos % 11;

    // Verifica se soma_digitos é menor que 2
    if (soma_digitos < 2) {
        // soma_digitos agora será zero
        soma_digitos = 0;
    } else {
        // Se for maior que 2, o resultado é 11 menos soma_digitos
        // Ex.: 11 - 9 = 2
        // Nosso dígito procurado é 2
        soma_digitos = 11 - soma_digitos;
    }

    // Concatena mais um dígito aos primeiro nove dígitos
    // Ex.: 025462884 + 2 = 0254628842
    var cpf = digitos + soma_digitos;

    // Retorna
    return cpf;

}
// calc_digitos_posicoes
function formataCpf(v) {
    v.value = v.value.replace(/\D/g, "");
    v.value = v.value.replace(/(\d{3})(\d)/, "$1.$2");
    v.value = v.value.replace(/(\d{3})(\d)/, "$1.$2");
    v.value = v.value.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

    return v;
}
/**
 * 
 * @param {type} $src
 * @param {type} $mask
 * @param {boolean} $number
 * @returns {undefined}
 */
function formatar($src, $mask) {
    $i = $src.value.length;
    $saida = $mask.substr(0, 1);
    $texto = $mask.substr($i)
    if ($texto.substr(0, 1) != $saida) {
        $src.value += $texto.substr(0, 1);
    }
}

function carregaAlbum(foto) {
    var conteudoModal = $('#conteudoModal');
    conteudoModal.empty();
    var link = $(foto).children().first().next();
    var conteudo = link.clone();
    var img = conteudo.children().first();
    img.removeClass();
    img.addClass('flickr-medium');
    conteudoModal.append(conteudo);
    $('#modalSlide h4').empty();
    $('#modalSlide h4').append(link.next().next().val());
    $('#modalSlide').modal('show');
}
