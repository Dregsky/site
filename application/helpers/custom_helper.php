<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('embedVideo')) {

    function embedVideoYoutube($link) {
        if (preg_match("#http://(.*)\.youtube\.com/watch\?v=(.*)(&(.*))?#", $link, $matches)) {
            $dados['match'] = $matches[2];
            return $dados;
        } else {
            die('Function embedVideo Link fornecido não é um link do youtube válido.');
        }
    }

}


if (!function_exists('limitaTexto')) {

    function limitaTexto($var, $limite) {
        if (strlen($var) > $limite) {
            $var = substr($var, 0, $limite);
            $var = trim($var) . "...";
        }
        return $var;
    }

}

if (!function_exists('linkPath')) {

    function linkPath($link, $path) {
        return array(
            'link' => $link,
            'path' => $path
        );
    }

}

if (!function_exists('scriptSetasScroll')) {

    function scriptSetasScroll() {
        return
                "<script>" .
                "$(function () {
                var nav = $('.setas');
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 250) {
                        nav.addClass('setas-fixas');
                    } else {
                        nav.removeClass('setas-fixas');
                    }
                    });
                });"
                ;
    }

}

if (!function_exists('pathRaiz')) {

    function pathRaiz() {
        $path = $_SERVER['SCRIPT_FILENAME'];
        $path_parts = pathinfo($path);
        return $path_parts['dirname'];
    }

}

function addClassImgFlickr($imagem){
    $parts = explode("alt", $imagem);
    $imagemNova = $parts[0].' class="flickr-small" ' . 'alt'.$parts[1];
    return $imagemNova;
}