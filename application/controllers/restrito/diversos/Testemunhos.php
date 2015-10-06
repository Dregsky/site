<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Use Entities\Testemunho;

/**
 * @property Doctrine $doctrine Biblioteca ORM
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Testemunhos extends Restrito_Controller {

    /**
     * Método Construtor
     */
    public function __construct() {
        parent::__construct();
    }

    protected function getContent() {
        /* Carregando Models */
        $this->load->model('EntitiesModels/TestemunhoModel', 'n');
        $this->load->model('EntitiesModels/StatusModel', 'stat');
        $this->load->model('EntitiesModels/PessoaModel', 'p');
        /* Carregando Components */
        $this->load->component('page/SimpleRestritoPage');
        $this->departamento = getDepartamentoByPerfil($this->pessoa->getPerfil()->getId());
        $metodo = $this->router->method;
        return $this->pageControl($metodo);
    }

    public function pageControl($metodo) {
        switch ($metodo) {
            case 'lista':
                $this->setMenuAtivoFilho('listaTestemunhos');
                return $this->lista();
            case 'testemunhoView':
                $this->setMenuAtivoFilho('listaTestemunhos');
                back('restrito/diversos/testemunhos/lista');
                $id = $this->uri->segment(5);
                return $this->testemunhoView($id);
        }
    }

    public function index() {
        
    }

    public function lista() {
        $model = new TestemunhoModel();
        $dados['testemunhos'] = $model->retrieveAll();
        $content = $this->load->view('restrito/diversos/testemunhos/testemunhoLista_comp', $dados, true);
        $page = new SimpleRestritoPage('Testemunhos', $content, array(
            array('glyphicon glyphicon-globe', 'Diversos'),'Testemunhos', 'Lista'));
        return $page->getComponent();
    }

    public function testemunhoView($id) {

        $model = new TestemunhoModel();
        $dados['testemunho'] = $model->retrieve($id);
        //Impede que acesse pagina pela url cujo id não existe
        verificarExistencia($dados, 'restrito/testemunho/lista');
        $dados['title'] = '';
        $content = $this->load->view('restrito/diversos/testemunhos/testemunhoView_comp', $dados, true);
        $page = new SimpleRestritoPage('Testemunhos', $content, array(
            array('glyphicon glyphicon-globe', 'Diversos'),'Testemunhos', 'Visualizar'));
        return $page->getComponent();
    }

    public function testemunhoInativar() {
        $id = $this->input->post('id');
        $model = new TestemunhoModel();
        try {
            $model->inativarStatus($id);
            success('Sucesso', 'Registro Inativado com Sucesso');
        } catch (Exception $e) {
            error('Error', 'Erro ao tentar inativar registro<br>'
                    . 'Tente novamente ou contate o administrador.');
        }
        redirect('restrito/diversos/testemunhos/lista');
    }

    public function testemunhoLiberar() {
        $id = $this->input->post('id');
        $model = new TestemunhoModel();
        try {
            $model->liberar($id);
            success('Sucesso', 'Testemunho Liberado com Sucesso');
        } catch (Exception $e) {
            error('Error', 'Erro ao tentar liberar registro<br>'
                    . 'Tente novamente ou contate o administrador.');
        }
        redirect('restrito/diversos/testemunhos/lista');
    }

    protected function getController() {
        return $this->router->class;
    }

    protected function getMenuAtivo() {
        return 'diversos';
    }

}
