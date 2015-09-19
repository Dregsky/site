<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Use enums\TipoStatus;

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Noticia extends Diversos_Controller {

    const LISTA = 'lista';

    /**
     * Método Construtor
     */
    public function Noticia() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function getCustomPage() {
        /**
         * Includes de models
         */
        $this->load->model('EntitiesModels/NoticiaModel');
        /**
         * Includes de components
         */
        $this->load->component('page/SimplePage');
        $this->load->component('panels/integrados/RowWrapper1Panel');
        $this->load->component('CurtirCompartilharFacebook');
        $this->load->component('TwitterButton');
        /**
         * criação de panels
         */
        $dados['panel1'] = '';
        switch ($this->uri->segment(2)) {
            case $this::LISTA:
                $dados['panel1'] = $this->lista();
                break;
            default :
                $id = $this->uri->segment(2);
                $this->verificaExistencia($id);
                $dados['panel1'] = $this->noticiaPage($id);
                break;
        }

        return $this->load->view('components/page/simple_page', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    public function noticiaPage($id) {
        $model = new NoticiaModel();
        $noticia = $model->retrieve($id);
        $this->verificaExistencia($noticia);
        $dados['noticia'] = $noticia;

        $face = new CurtirCompartilharFacebook();
        $twitter = new TwitterButton();
        $dados['redesSociais'] = $twitter->getComponent() . $face->getComponent();

        $content = $this->load->view('diversos/noticia_comp', $dados, true);
        $panel = new RowWrapper1Panel($content);
        $page = new SimplePage('Notícia', $panel->getComponent());
        return $page->getComponent();
    }

    /**
     * Verifica se entidade igual a null
     * retorna página 404
     * @param type $entidade
     */
    private function verificaExistencia($entidade) {
        if ($entidade == null) {
            redirect('erro/page');
        }
    }

    public function lista() {
        $dados = $this->getNoticias();

        $content = $this->load->view('diversos/noticiasCorpo_comp', $dados, true);
        $content1 = $this->load->view('diversos/noticias_comp', array('panel' => $content), true);
        $page = new SimplePage('Notícias', $content1);
        return $page->getComponent();
    }

    public function getNoticias($page = 0) {
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
