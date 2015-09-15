<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Use enums\TipoStatus;

/**
 * @property Doctrine $doctrine Biblioteca ORM
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class AjaxController extends CI_Controller {

    /**
     * Método Construtor
     */
    public function AjaxController() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function ajaxTestemunhoNewPage() {
        $data = $this->input->post();
        $dados = $this->getTestemunhos($data['pagina']);
        $content = $this->load->view('diversos/testemunhoCorpo_comp', $dados, true);
        echo $content.scriptSetasScroll();
    }

    public function getTestemunhos($page = 0) {
        $this->load->model('EntitiesModels/TestemunhoModel');
        $testemunhoModel = new TestemunhoModel();
        $registrosPorPagina = 4;
        $dados['testemunhos'] = $testemunhoModel->retrieveUltimosByStatusAndPage(TipoStatus::LIBERADO, 
                $registrosPorPagina, $page);
        $dados['next'] = $page + 1;
        $dados['prev'] = $page - 1;
        $dados['regPorPagina'] = $registrosPorPagina;
        $dados['total'] = $testemunhoModel->countByStatus();
        return $dados;
    }


}
