<?php

defined('BASEPATH') OR exit('No direct script access allowed');
Use Entities\Pessoa as Pessoa;
/**
 * @property Doctrine $doctrine Biblioteca ORM
 * @property home_model $homeModel Model
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class ANG extends Departamento_Controller {

    /**
     * Método Construtor
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('home_model', 'homeModel');
    }

    /**
     * @property Pessoa $pessoa 
     */
    public function index() {
        //$estado = $this->homeModel->retrieve(Entities\EstadoCivil::name, 2);
        $dados['perfil'] = 'teste';
        $this->load->view('welcome_message', $dados);
    }
    

}
