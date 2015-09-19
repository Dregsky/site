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

    /**
     * Recebe uma requisiaçãoa ajax.
     * Criar uma nova pagina e retorna ela em forma de
     * string concatenando com um script contido no custom_helper
     */
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
        $dados['total'] = $testemunhoModel->countByStatus() - 1;
        return $dados;
    }
    
    /**
     * Recebe uma requisiaçãoa ajax.
     * Criar uma nova pagina e retorna ela em forma de
     * string concatenando com um script contido no custom_helper
     */
    public function ajaxNoticiaNewPage() {
        $data = $this->input->post();
        $dados = $this->getNoticias($data['pagina']);
        $content = $this->load->view('diversos/noticiasCorpo_comp', $dados, true);
        echo $content.scriptSetasScroll();
    }
    
    public function getNoticias($page = 0) {
        $this->load->model('EntitiesModels/NoticiaModel');
        $model = new NoticiaModel();
        $registrosPorPagina = 10;
        $dados['noticias'] = $model->retrieveUltimosByStatusAndPage(TipoStatus::ATIVO, $registrosPorPagina, $page);
        $dados['next'] = $page + 1;
        $dados['prev'] = $page - 1;
        $dados['regPorPagina'] = $registrosPorPagina;
        $dados['total'] = $model->countByStatus() - 1;
        return $dados;
    }


}
