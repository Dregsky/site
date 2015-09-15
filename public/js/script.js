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



