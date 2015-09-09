<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use Entities\Perfil;
use enums\TipoPerfil;
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
        entityLoad(array("Departamento", "Perfil", "Escolaridade"));
        $this->load->model('home_model', 'homeModel');
    }

    /**
     *
     */
    public function index() {
        $perfil = $this->homeModel->retrieve(Perfil::name, TipoPerfil::EBD);
        $dados['perfil'] = $perfil;
        $this->load->view('welcome_message', $dados);
    }

}
