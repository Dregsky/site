<?php

Use enums\TipoPerfil;
Use enums\DepartamentoEnum;
Use Entities\AbstractEntity;

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

function imagemUrl($caminho, $foto, $default) {
    $path = $_SERVER['SCRIPT_FILENAME'];
    $path_parts = pathinfo($path);
    $diretorio = $path_parts['dirname'] . $caminho;
    if ($foto == null || !is_file($diretorio . $foto)) {
        $image = base_url($caminho.$default);
    }else{
        $image = base_url($caminho.$foto);
    }
    return $image;
}

function processaImagem($pathImage, $genero) {
    $path = $_SERVER['SCRIPT_FILENAME'];
    $path_parts = pathinfo($path);
    $base_path = $path_parts['dirname'];
    $image = base_url($pathImage);
    if (!is_file($base_path . $pathImage)) {
        if ($genero == GeneroEnum::FEMININO) {
            $image = base_url('public/images/membros/profile-woman.jpg');
        } else {
            $image = base_url('public/images/membros/profile-man.jpg');
        }
    }
    return $image;
}

if (!function_exists('verificarPermissaoDepartamento')) {

    function verificarPermissaoDepartamento($dados, $departamento, $redirect) {
        if ($dados['departamento'] == null) {
            error('Erro', 'Registro não existe');
            redirect($redirect);
        } else if ($departamento > 0 && $dados['departamento'] != $departamento) {
            error('Sem Permissão', 'Você não tem permissão para editar esse registro');
            redirect($redirect);
        }
    }

}

 function verificarExistencia($dados, $redirect) {
        if ($dados == null) {
            error('Erro', 'Registro não existe');
            redirect($redirect);
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

if (!function_exists('processNew')) {

    function processNew($new) {
        return '<h3 class = "box-title pull-right" style="margin-right: 15px;">'
        .'<a class = "btn btn-success" href ='. base_url($new). '>'
        .'<i class = "fa fa-plus-circle"></i>'
        .' Novo '
        .'</a>'
        .'</h3>';
    }

}
if (!function_exists('new')) {

    function newButton($new) {
        $CI = & get_instance();
        $CI->session->set_flashdata('new', $new);
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
            case TipoPerfil::MGD:
                return DepartamentoEnum::MGD;
            case TipoPerfil::LIV:
                return DepartamentoEnum::LIV;
            case TipoPerfil::SUPER_ADMINISTRADOR:
                return 0;
            case TipoPerfil::ADMINISTRADOR:
                return 0;
            case TipoPerfil::TESOUREIRO:
                return -1;
        }
    }

    function setDados(&$dados, $indexes) {
        foreach ($indexes as $index) {
            if (!isset($dados[$index])) {
                $dados[$index] = '';
            } else {
                if ($dados[$index] instanceof AbstractEntity) {
                    $dados[$index] = $dados[$index]->getId();
                }
            }
        }
    }

    function setDadosArray(&$dados, $indexes) {
        foreach ($indexes as $index) {
            if (!isset($dados[$index])) {
                $dados[$index] = array();
            } else {
                foreach ($dados[$index] as $i => $value) {
                    $dados[$index][$i] = is_array($value) ? $value['id'] :
                            (is_string($value) ? $value : $value->getId());
                }
            }
        }
    }

    function setDatasToString(&$dados, $indexes) {
        foreach ($indexes as $index) {
            if (!isset($dados[$index])) {
                $dados[$index] = '';
            } else {
                if ($dados[$index] instanceof DateTime) {
                    $dados[$index] = $dados[$index]->format('Y-m-d');
                }
            }
        }
    }

    function excluirImagem($foto) {
        if ($foto != '') {
            $caminho = pathRaiz() . $foto;
            if (is_file($caminho)) {
                unlink($caminho);
            }
        }
    }

}
