<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Tesouraria extends Principal_Controller {

    /**
     * Método Construtor
     */
    public function Tesouraria() {
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
        $dados['panel1'] = $this->tesourariaPage();

        return $this->load->view('components/page/simple_page', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    public function tesourariaPage() {
        $content = $this->load->view('diversos/tesouraria_comp', '', true);
        $page = new SimplePage('Tesouraria', $content);
        return $page->getComponent();
    }

}
