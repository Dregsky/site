<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @property Doctrine $doctrine Biblioteca ORM
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class AceitaJesus extends Restrito_Controller {

    /**
     * Método Construtor
     */
    public function __construct() {
        parent::__construct();
    }

    protected function getContent() {
        /* Carregando Models */
        $this->load->model('EntitiesModels/AceitaJesusModel', 'aj');
        /* Carregando Components */
        $this->load->component('page/SimpleRestritoPage');
        $this->departamento = getDepartamentoByPerfil($this->pessoa->getPerfil()->getId());
        $metodo = $this->router->method;
        return $this->pageControl($metodo);
    }

    public function pageControl($metodo) {
        switch ($metodo) {
            case 'lista':
                $this->setMenuAtivoFilho('listaAceitaJesus');
                return $this->lista();
            case 'aceitaJesusView':
                $this->setMenuAtivoFilho('listaAceitaJesus');
                back('restrito/diversos/AceitaJesus/lista');
                $id = $this->uri->segment(5);
                return $this->aceitaJesusView($id);
        }
    }

    public function index() {
        
    }

    public function lista() {
        $model = new AceitaJesusModel();
        $dados['aceitaList'] = $model->retrieveAll();
        $content = $this->load->view('restrito/diversos/aceitajesus/aceitajesusLista_comp', $dados, true);
        $page = new SimpleRestritoPage('Aceita Jesus', $content, array(
            array('glyphicon glyphicon-globe', 'Diversos'),'Aceita Jesus', 'Lista'));
        return $page->getComponent();
    }

    public function aceitaJesusView($id) {

        $model = new AceitaJesusModel();
        $dados['aceita'] = $model->retrieve($id);
        //Impede que acesse pagina pela url cujo id não existe
        verificarExistencia($dados, 'restrito/aceitajesus/lista');
        $dados['title'] = '';
        $content = $this->load->view('restrito/diversos/aceitajesus/aceitajesusView_comp', $dados, true);
        $page = new SimpleRestritoPage('Aceita Jesus', $content, array(
            array('glyphicon glyphicon-globe', 'Diversos'),'Aceita Jesus', 'Visualizar'));
        return $page->getComponent();
    }

    protected function getController() {
        return $this->router->class;
    }

    protected function getMenuAtivo() {
        return 'diversos';
    }

}
