<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Use Entities\Pessoa as Pessoa;

/**
 * @property Doctrine $doctrine Biblioteca ORM
 * @property home_model $homeModel Model
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Login extends CI_Controller {

    /**
     * Método Construtor
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('EntitiesModels/PessoaModel');
    }

    /**
     * @property Pessoa $pessoa 
     */
    public function index() {
        $this->load->view('restrito/login_page');
    }

    public function logar() {
        $dados = $this->input->post();
        $model = new PessoaModel();
        $pessoa = $model->login($dados['login'], $dados['senha']);
        if (!empty($pessoa)) {
            $this->session->set_userdata($pessoa[0]);
            redirect('restrito');
        } else {
            error('Usuario ou Senha não encontrado', 'Digite Novamente!');
            redirect('restrito/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('restrito/login');
    }

}
