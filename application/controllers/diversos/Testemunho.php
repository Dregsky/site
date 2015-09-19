<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use enums\TipoStatus;
use Entities\Testemunho as TestemunhoEntity;

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Testemunho extends Diversos_Controller {

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
        $this->load->model('EntitiesModels/TestemunhoModel');
        $this->load->model('EntitiesModels/StatusModel');
        /**
         * Includes de components
         */
        $this->load->component('page/SimplePage');
        /**
         * criação de panels
         */
        $dados['panel1'] = $this->testemunhoPage();

        if ($this->uri->segment(3) == 'cadastro') {
            $dados['panel1'] = $this->cadastro();
        }

        return $this->load->view('components/page/simple_page', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    public function testemunhoPage() {
        $dados = $this->getTestemunhos();

        $content = $this->load->view('diversos/testemunhoCorpo_comp', $dados, true);
        $content1 = $this->load->view('diversos/testemunho_comp', array('panel' => $content), true);
        $page = new SimplePage('Testemunhos', $content1);
        return $page->getComponent();
    }

    public function getTestemunhos($page = 0) {
        $testemunhoModel = new TestemunhoModel();
        $registrosPorPagina = 4;
        $dados['testemunhos'] = $testemunhoModel->retrieveUltimosByStatusAndPage(TipoStatus::LIBERADO, $registrosPorPagina, $page);
        $dados['next'] = $page + 1;
        $dados['prev'] = $page - 1;
        $dados['regPorPagina'] = $registrosPorPagina;
        $dados['total'] = $testemunhoModel->countByStatus() - 1;
        return $dados;
    }

    public function cadastro() {
        $content = $this->load->view('diversos/testemunhoCadastro_form', '', true);
        $page = new SimplePage('Postar Testemunho', $content);
        return $page->getComponent();
    }

    public function cadastrar() {
        $dados = $this->input->post();
        $dados['dataCadastro'] = new DateTime();
        $dados['status'] = (new TipoStatus())->retrieveReferencedEntity(TipoStatus::AGUARDANDO_LIBERACAO);
        $testemunho = new TestemunhoEntity();
        $testemunho->setAll($dados);
        $model = new TestemunhoModel();
        $model->saveOrUpdate($testemunho);
        success('Sucesso', 'Testemunho enviado com sucesso! Ele agora será avaliado para então ser postado.');
        redirect('diversos/testemunho/cadastro');
    }

}
