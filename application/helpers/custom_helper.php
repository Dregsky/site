<?php

Use enums\TipoPerfil;
Use enums\DepartamentoEnum;

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

function addClassImgFlickr($imagem) {
    $p = explode("class", $imagem);
    if (count($p) == 1) {
        $parts = explode("alt", $imagem);
        $imagemNova = $parts[0] . ' class="flickr-small" ' . 'alt' . $parts[1];
        $imagemNova = str_replace("[removed]", "", $imagemNova);
        return $imagemNova;
    }
    return $imagem;
}

Use enums\GeneroEnum;

function imagemProfileRestrito($genero, $foto) {
    $path = $_SERVER['SCRIPT_FILENAME'];
    $path_parts = pathinfo($path);
    $diretorio = $path_parts['dirname'] . '/public/images/membros/';
    $imageProfile = base_url('public/images/membros/' . $foto);
    if (!is_file($diretorio . $foto)) {
        if ($genero == GeneroEnum::FEMININO) {
            $imageProfile = base_url('public/images/membros/profile-woman.jpg');
        } else {
            $imageProfile = base_url('public/images/membros/profile-man.jpg');
        }
    }
    return $imageProfile;
}

if (!function_exists('verificarPermissaoDepartamento')) {

    function verificarPermissaoDepartamento($dados, $departamento, $redirect) {
        if ($dados == null) {
            error('Erro', 'Registro não existe');
            redirect($redirect);
        } else if ($departamento > 0 && $dados['departamento'] != $departamento) {
            error('Sem Permissão', 'Você não tem permissão para editar esse registro');
            redirect($redirect);
        }
    }

}

if (!function_exists('processBack')) {

    function processBack($back) {
        return '<a title="Voltar" href=' . base_url($back) . ' class="back glyphicon glyphicon-arrow-left">'
                . '</a>';
    }

}
if (!function_exists('back')) {

    function back($back) {
        $CI = & get_instance();
        $CI->session->set_flashdata('back', $back);
    }

}
if (!function_exists('pathImages')) {

    function pathImages() {
        $path = $_SERVER['SCRIPT_FILENAME'];
        $path_parts = pathinfo($path);
        $diretorio = $path_parts['dirname'] . '/public/images/';
        return $diretorio;
    }

}

if (!function_exists('getDepartamentoByPerfil')) {

    function getDepartamentoByPerfil($perfil) {
        switch ($perfil) {
            case TipoPerfil::ANG:
                return DepartamentoEnum::ANG;
            case TipoPerfil::CIBE:
                return DepartamentoEnum::CIBE;
            case TipoPerfil::EBD:
                return DepartamentoEnum::EBD;
            case TipoPerfil::FAMILIA:
                return DepartamentoEnum::FAMILIA;
            case TipoPerfil::INFANTIL:
                return DepartamentoEnum::CVKIDS;
            case TipoPerfil::JORNALISTA:
                return 0;
            case TipoPerfil::MEMBRO:
                return -1;
            case TipoPerfil::MISSOES:
                return DepartamentoEnum::MISSOES;
            case TipoPerfil::MTV:
                return DepartamentoEnum::JTV;
            case TipoPerfil::OBREIROS:
                return DepartamentoEnum::OBREIROS;
            case TipoPerfil::ORQUESTRA:
                return DepartamentoEnum::ORQUESTRA;
            case TipoPerfil::SECRETARIO:
                return DepartamentoEnum::SECRETARIA;
            case TipoPerfil::SUPER_ADMINISTRADOR:
                return 0;
            case TipoPerfil::ADMINISTRADOR:
                return 0;
            case TipoPerfil::TESOUREIRO:
                return -1;
        }
    }

}
