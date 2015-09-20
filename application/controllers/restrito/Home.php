<?php

defined('BASEPATH') OR exit('No direct script access allowed');
Use Entities\Pessoa as Pessoa;
/**
 * @property Doctrine $doctrine Biblioteca ORM
 * @property home_model $homeModel Model
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Home extends Restrito_Controller {

    /**
     * Método Construtor
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * @property Pessoa $pessoa 
     */
    public function index() {
    }

    protected function getMenuAtivo() {
        return 'home';
    }

    protected function getContent() {
        return $this->load->view('restrito/home','',true);
    }

}
