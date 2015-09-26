<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use enums\TipoPerfil;

function permissaoController($controller, $perfil) {

    $permitidos = permissoes($controller);
    if (is_array($permitidos)) {
        processaPermissao($permitidos, $perfil);
    }
}

function processaPermissao($permitidos, $perfil) {
    if (!in_array($perfil, $permitidos)) {
        error('Sem Permissão', 'Você não tem permissão para acessar essa página');
        redirect('restrito/home');
    }
}

function permissoes($controller) {
    $permitidos = array(
        TipoPerfil::ADMINISTRADOR,
        TipoPerfil::SUPER_ADMINISTRADOR);
    switch ($controller) {
        case 'ANG':
            array_push($permitidos, TipoPerfil::ANG);
            break;
        case 'JTV':
            array_push($permitidos, TipoPerfil::MTV);
            break;
        case 'CIBE':
            array_push($permitidos, TipoPerfil::CIBE);
            break;
        case 'CVKIDS':
            array_push($permitidos, TipoPerfil::INFANTIL);
            break;
        case 'EBD':
            array_push($permitidos, TipoPerfil::EBD);
            break;
        case 'Familia':
            array_push($permitidos, TipoPerfil::FAMILIA);
            break;
        case 'MGD':
            array_push($permitidos, TipoPerfil::MGD);
            break;
        case 'Missoes':
            array_push($permitidos, TipoPerfil::MISSOES);
            break;
        case 'Orquestra':
            array_push($permitidos, TipoPerfil::ORQUESTRA);
            break;
        case 'Diretoria':
            break;
        case 'ADCRUZ':
            break;
        case 'Membros':
            array_push($permitidos, TipoPerfil::PASTOR, TipoPerfil::SECRETARIO);
            break;
        default:
            return 0;
    }
    return $permitidos;
}

function menuPermissao($controller, $perfil) {
    $permitidos = permissoes($controller);
    if (is_array($permitidos)) {
        return in_array($perfil, $permitidos);
    }
}
