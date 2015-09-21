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
    
    public $menuAtivoFilho = '';
    abstract protected function getMenuAtivo();
    abstract protected function getContent();

    /**
     * Constructor of Base Controller
     */
    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');
        enumLoad();
        $usuario = $this->session->userdata('id');
        if ($usuario != null) {
            $this->load->model('EntitiesModels/PessoaModel', 'p');
            $this->pessoa = $this->p->retrieve($usuario);
            $dados['content'] = $this->getContent();
            $dados['menuAtivo'] = $this->getMenuAtivo();
            $dados['menuAtivoFilho'] = $this->menuAtivoFilho;
            $this->load->view('restrito/template/template_admin', $dados);
        } else {
            redirect('restrito/login');
        }
    }

    protected function setMenuAtivoFilho($menu) {
        $this->menuAtivoFilho = $menu;
    }
    

}
