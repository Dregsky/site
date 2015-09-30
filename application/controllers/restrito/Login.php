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
        $pessoa = $model->login($dados['login'], md5($dados['senha']));
        if (!empty($pessoa)) {
            $this->session->set_userdata($pessoa[0]);
            redirect('restrito');
        } else {
            error('Usuario ou Senha não encontrado', 'Digite Novamente!');
            redirect('restrito/login');
        }
    }

    public function recuperarSenha() {
        $this->load->view('restrito/esqueciSenha_page');
    }

    public function enviarSenha() {
        $dados = $this->input->post();
        $model = new PessoaModel();
        $dados['cpf'] = preg_replace('#[^0-9]#', '', $dados['cpf']);
        $pessoa = $model->retrieveEmailAndCpf($dados['email'], $dados['cpf']);
        if (!empty($pessoa)) {
            $p = $pessoa[0];
            $pe = $model->retrieve($p['id']);
            $novaSenha = date('mYiHsd');
            $pe->setSenha(md5($novaSenha));
            $model->saveOrUpdate($pe);
            $this->load->library('email');
            $this->email->from('adcruz@adcruz.org', 'Site ADCruz');
            $this->email->to($p['email']);

            $this->email->subject('Nova Senha');
            $this->email->message('Sua nova senha é : ' . $novaSenha);

            if ($this->email->send()) {
                success("Sua nova senha foi enviada para o Email:", $p['email']);
                redirect('restrito/login');
            }
            error('Erro ao enviar email', 'Tente Novamente!');
            redirect('restrito/login/recuperarSenha');
        } else {
            error('CPF e/ou Email não encontrados', 'Digite Novamente!');
            redirect('restrito/login/recuperarSenha');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('restrito/login');
    }

}
