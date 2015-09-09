<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of LoadHelper
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */

/**
 * Método que carrega todas as entidades
 * @param void
 * @return void
 */
function entitiesLoadAll() {
    $diretorio = APPPATH . "models\Entities";
    $arrayExcecoes = array();
    if ($handle = opendir($diretorio)) {
        while (false !== ($file = readdir($handle))) {
            if (strpos($file, ".php")) { // * Só inclui arquivos PHP
                if (!in_array($file, $arrayExcecoes)) {
                    include($diretorio . "\\" . $file);
                }
            }
        }
        closedir($handle);
    }
}

/**
 * Método que carrega todos os Enums
 * @param void
 * @return void
 */
function enumLoad() {
    $diretorio = APPPATH . "models\Enums";
    $arrayExcecoes = array();
    if ($handle = opendir($diretorio)) {
        while (false !== ($file = readdir($handle))) {
            if (strpos($file, ".php")) { // * Só inclui arquivos PHP
                if (!in_array($file, $arrayExcecoes)) {
                    include($diretorio . "\\" . $file);
                }
            }
        }
        closedir($handle);
    }
}

/**
 * Metodo que recebe um array com o nome das classes
 * a serem carregada.
 * @param type string $entity
 */
function entityLoad($entities) {
    foreach ($entities as $e) {
        if (file_exists(APPPATH . 'models\Entities\\' . $e . '.php')) {
            include_once(APPPATH . 'models\Entities\\' . $e . '.php');
        }
    }
}
