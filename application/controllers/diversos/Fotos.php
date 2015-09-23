<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Fotos extends Diversos_Controller {

    /**
     * Método Construtor
     */
    public function Fotos() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function getCustomPage() {

        /**
         * Includes de models
         */
        $this->load->model('EntitiesModels/AlbumModel');
        $this->load->model('EntitiesModels/StatusModel');
        /**
         * Includes de components
         */
        $this->load->component('page/SimplePage');
        /**
         * criação de panels
         */
        $dados['panel1'] = $this->fotosPage();

        if ($this->uri->segment(3) == 'cadastro') {
            $dados['panel1'] = $this->cadastro();
        }

        return $this->load->view('components/page/simple_page', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    public function fotosPage() {
        //$dados = $this->getTestemunhos();
        $model = new AlbumModel();
        $dados['albuns'] = $model->retrieveAllAtivos();
        $content1 = $this->load->view('diversos/fotos_comp', $dados, true);
        $page = new SimplePage('Álbum de Fotos ADCruz', $content1);
        return $page->getComponent();
    }

    public function getMenuSelecionado() {
        return 'fotos';
    }

}
