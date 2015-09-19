<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Entities\AceitaJesus as Aceita;

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * @params $email Email
 */
abstract class Diversos_Controller extends Principal_Controller {

    /**
     * Método Construtor
     */
    public function Diversos_Controller() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function getMenuSelecionado() {
        return 'diversos';
    }

}
