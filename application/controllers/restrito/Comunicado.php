<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Fotos.php';

Use Entities\Comunicado as C;

/**
 * @property Doctrine $doctrine Biblioteca ORM
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Comunicado extends Restrito_Controller {

    /**
     * Método Construtor
     */
    public function __construct() {
        parent::__construct();
    }

    protected function getContent() {
        /* Carregando Models */
        $this->load->model('EntitiesModels/ComunicadoModel', 'n');
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
                $this->setMenuAtivoFilho('listaComunicado');
                return $this->lista();
            case 'comunicadoMantem':
                $this->setMenuAtivoFilho('mantemComunicado');
                back('restrito/comunicado/lista');
                $id = $this->uri->segment(4);
                $dados = array();
                if ($this->session->flashdata('comunicado')) {
                    $dados = $this->session->flashdata('comunicado');
                }
                if ($id != null) {
                    newButton('restrito/comunicado/comunicadoMantem');
                    return $this->comunicadoMantem($id, $dados);
                }
                return $this->comunicadoMantem(0, $dados);
        }
    }

    public function index() {
        
    }

    public function lista() {
        $model = new ComunicadoModel();
        $dados['comunicados'] = $model->retrieveAll();
        $content = $this->load->view('restrito/comunicado/comunicadoLista_comp', $dados, true);
        $page = new SimpleRestritoPage('Comunicados', $content, array(
            array('fa fa-bullhorn', 'Comunicado'), 'Lista'));
        return $page->getComponent();
    }

    public function comunicadoMantem($id = 0, $dados = array()) {

        if ($id != 0 && empty($dados)) {
            $model = new ComunicadoModel();
            $dados = $model->retrieveArrayById($id);
            //Impede que acesse pagina pela url cujo id não existe
            verificarExistencia($dados, 'restrito/comunicado/lista');
        }else if(!empty($dados)){
            $dados['status'] = $dados['status']->getId();
        }
        $dados['id'] = $id > 0 ? $id : '';
        $dados['title'] = $id != 0 ? 'Edição' : 'Cadastro';
        $dados['statusList'] = $this->stat->retrieveAll();
        $content = $this->load->view('restrito/comunicado/comunicadoMantem_comp', $dados, true);
        $page = new SimpleRestritoPage('Mantem Comunicado', $content, array(
            array('fa fa-bullhorn', 'Comunicado'), 'Mantem'));
        return $page->getComponent();
    }

    /**
     * Salva comunicado e a foto.
     */
    public function salvarComunicado() {
        $dados = $this->input->post();
        try {
            $comunicado = new C();
            $model = new ComunicadoModel();
            //O editir de texto wysihtml5, passa por post esse parametro
            unset($dados['_wysihtml5_mode']);
            $dados['status'] = $this->stat->retrieve($dados['status']);
            if (!empty($dados['id'])) {
                $comunicado = $model->retrieve($dados['id']);
            } else {
                $dados['pessoaCadastro'] = $this->pessoa;
                $dados['dataCadastro'] = new DateTime();
                $interval = new DateInterval('P7D');
                $dados['dataSaiNovo'] = (new DateTime())->add($interval);
                $dados['perfil'] = $this->pessoa->getPerfil();
            }
            $comunicado->setAll($dados);
            $id = $model->saveOrUpdate($comunicado);
            success('Sucesso', 'Comunicado Salvo Com Sucesso');
            redirect('restrito/comunicado/comunicadoMantem/' . $id);
        } catch (Exception $e) {
            error('ERRO', 'Erro ao tentar salvar! Tente Novamente mais tarde ou Contate o Administrador!');
            $this->session->set_flashdata('comunicado', $dados);
            $id = $dados['id'] != '' ? $dados['id'] : 0;
            redirect('restrito/comunicado/comunicadoMantem/' . $id);
        }
    }

    public function comunicadoInativar() {
        $id = $this->input->post('id');
        $model = new ComunicadoModel();
        try {
            $model->inativarStatus($id);
            success('Sucesso', 'Registro Inativado com Sucesso');
        } catch (Exception $e) {
            error('Error', 'Erro ao tentar inativar registro<br>'
                    . 'Tente novamente ou contate o administrador.');
        }
        redirect('restrito/comunicado/lista');
    }

    public function comunicadoAtivar() {
        $id = $this->input->post('id');
        $model = new ComunicadoModel();
        try {
            $model->ativarStatus($id);
            success('Sucesso', 'Registro ativado com Sucesso');
        } catch (Exception $e) {
            error('Error', 'Erro ao tentar ativar registro<br>'
                    . 'Tente novamente ou contate o administrador.');
        }
        redirect('restrito/comunicado/lista');
    }

    protected function getController() {
        return $this->router->class;
    }

    protected function getMenuAtivo() {
        return 'comunicados';
    }

}
