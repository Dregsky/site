<?php

defined('BASEPATH') OR exit('No direct script access allowed');
Use Entities\Pessoa as Pessoa;
/**
 * @property Doctrine $doctrine Biblioteca ORM
 * @property home_model $homeModel Model
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Home extends Base_Controller {

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
        $estado = $this->homeModel->retrieve(Entities\EstadoCivil::name, 5);
        $dados['perfil'] = $estado;
        $this->load->view('welcome_message', $dados);
    }

}
