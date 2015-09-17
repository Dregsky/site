<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use enums\TipoStatus;
use Entities\Status;
use Entities\Testemunho as TestemunhoEntity;

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Fotos extends Principal_Controller {

    /**
     * Método Construtor
     */
    public function Testemunho() {
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
        $dados['albuns'] = $model->retrieveAllByYearAndData();
        $content1 = $this->load->view('diversos/fotos_comp', $dados, true);
        $page = new SimplePage('Álbum de Fotos ADCruz', $content1);
        return $page->getComponent();
    }

    public function getTestemunhos($page = 0) {
        $testemunhoModel = new TestemunhoModel();
        $registrosPorPagina = 4;
        $dados['testemunhos'] = $testemunhoModel->retrieveUltimosByStatusAndPage(TipoStatus::LIBERADO, $registrosPorPagina, $page);
        $dados['next'] = $page + 1;
        $dados['prev'] = $page - 1;
        $dados['regPorPagina'] = $registrosPorPagina;
        $dados['total'] = $testemunhoModel->countByStatus();
        return $dados;
    }

    public function cadastro() {
        $content = $this->load->view('diversos/testemunhoCadastro_comp', '', true);
        $page = new SimplePage('Postar Testemunho', $content);
        return $page->getComponent();
    }

}
