<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Historia extends Diversos_Controller {

    /**
     * Método Construtor
     */
    public function Historia() {
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
        $dados['panel1'] = $this->historiaPage();

        return $this->load->view('components/page/simple_page', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    public function historiaPage() {
        $content = $this->load->view('historia/historia_comp', '', true);
        $page = new SimplePage('História', $content);
        return $page->getComponent();
    }

    public function getMenuSelecionado() {
        return 'historia';
    }

}
