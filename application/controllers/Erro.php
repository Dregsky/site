<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Erro extends Principal_Controller {

    /**
     * Método Construtor
     */
    public function Erro() {
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
        $dados['panel1'] = $this->page();

        return $this->load->view('components/page/simple_page', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    public function page() {
        $panel = new RowPanel('<h2 align="center">Essa página não existe!</h2>');
        $page = new SimplePage('Página Não Econtrada', $panel->getComponent());
        return $page->getComponent();
    }

    public function getMenuSelecionado() {
        return 'nenhum';
    }

}
