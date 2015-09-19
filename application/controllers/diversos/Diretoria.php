<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Diretoria extends Diversos_Controller {

    /**
     * Método Construtor
     */
    public function Diretoria() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function getCustomPage() {
        /**
         * Includes de models
         */
        /**
         * Includes de components
         */
        $this->load->component('page/SimplePage');
        /**
         * criação de panels
         */
        $dados['panel1'] = $this->diretoriaPage();

        return $this->load->view('components/page/simple_page', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    public function diretoriaPage() {
        $content = $this->load->view('diversos/diretoria_comp', '', true);
        $page = new SimplePage('Diretoria', $content);
        return $page->getComponent();
    }

    public function getMenuSelecionado() {
        return 'diretoria';
    }

}
