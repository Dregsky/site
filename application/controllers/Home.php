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
        $this->load->view('welcome_message', array('perfil' => 2));
    }

    /**
     * @property Pessoa $pessoa 
     */
    public function index() {
        $estado = $this->homeModel->retrieve(Entities\EstadoCivil::name, 2);
        $dados['perfil'] = \enums\TipoPerfil::ADMINISTRADOR_1;
        $this->load->view('welcome_message', $dados);
    }

}
