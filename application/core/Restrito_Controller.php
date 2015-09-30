<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Restrito_Controller
 * @category Restrito_Controller
 * @package  CodeIgniter
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
abstract class Restrito_Controller extends CI_Controller {

    public $pessoa;
    public $departamento;
    public $menuAtivoFilho = '';
    public $menuAtivoNeto = '';

    abstract protected function getMenuAtivo();

    abstract protected function getContent();

    abstract protected function getController();

    /**
     * Constructor of Base Controller
     */
    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');
        enumLoad();
        $usuario = $this->session->userdata('id');
        if ($usuario != null) {
            $perfil = $this->session->userdata('perfil');
            permissaoController($this->getController(), $perfil);
            $this->load->model('EntitiesModels/PessoaModel', 'p');
            $this->pessoa = $this->p->retrieve($usuario);
            $this->departamento = getDepartamentoByPerfil($this->pessoa->getPerfil()->getId());
            $dados['content'] = $this->getContent();
            $dados['menuAtivo'] = $this->getMenuAtivo();
            $dados['menuAtivoFilho'] = $this->menuAtivoFilho;
            $dados['menuAtivoNeto'] = $this->menuAtivoNeto;
            $this->load->view('restrito/template/template_admin', $dados);
        } else {
            redirect('restrito/login');
        }
    }

    protected function setMenuAtivoFilho($menu) {
        $this->menuAtivoFilho = $menu;
    }

    protected function setMenuAtivoNeto($menu) {
        $this->menuAtivoNeto = $menu;
    }

}
