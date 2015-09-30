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
        TipoPerfil::SUPER_ADMINISTRADOR
    );
    switch (strtolower($controller)) {
        case 'ang':
            array_push($permitidos, TipoPerfil::ANG);
            break;
        case 'jtv':
            array_push($permitidos, TipoPerfil::MTV);
            break;
        case 'cibe':
            array_push($permitidos, TipoPerfil::CIBE);
            break;
        case 'cvkids':
            array_push($permitidos, TipoPerfil::INFANTIL);
            break;
        case 'ebd':
            array_push($permitidos, TipoPerfil::EBD);
            break;
        case 'familia':
            array_push($permitidos, TipoPerfil::FAMILIA);
            break;
        case 'mgd':
            array_push($permitidos, TipoPerfil::MGD);
            break;
        case 'missoes':
            array_push($permitidos, TipoPerfil::MISSOES);
            break;
        case 'liv':
            array_push($permitidos, TipoPerfil::LIV);
            break;
        case 'orquestra':
            array_push($permitidos, TipoPerfil::ORQUESTRA);
            break;
        case 'diretoria':
            break;
        case 'adcruz':
            break;
        case 'usuarios':
            array_push($permitidos, TipoPerfil::PASTOR, TipoPerfil::SECRETARIO);
            break;
        case 'membros':
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
