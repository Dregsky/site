<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Use Entities\Pessoa as Pessoa;
Use Entities\Album;

/**
 * @property Doctrine $doctrine Biblioteca ORM
 * @property home_model $homeModel Model
 * @property Pessoa $album 
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Fotos extends Restrito_Controller {

    /**
     * Método Construtor
     */
    public function __construct() {
        parent::__construct();
    }

    protected function getContent() {
        /* Carregando Models */
        $this->load->model('EntitiesModels/AlbumModel');
        $this->load->model('EntitiesModels/DepartamentoModel', 'dep');
        $this->load->model('EntitiesModels/StatusModel', 'stat');
        $this->load->model('EntitiesModels/PessoaModel', 'p');
        /* Carregando Components */
        $this->load->component('page/SimpleRestritoPage');
        $this->departamento = getDepartamentoByPerfil($this->pessoa->getPerfil()->getId());
        $metodo = $this->router->method;
        switch ($metodo) {
            case 'albuns':
                $this->setMenuAtivoFilho('albuns');
                return $this->albuns();
            case 'albumMantem':
                $this->setMenuAtivoFilho('albuns');
                back('restrito/fotos/albuns');
                $id = $this->uri->segment(4);
                if ($id != null) {
                    return $this->albumMantem($id);
                }
                return $this->albumMantem();
        }
    }

    public function index() {
        
    }

    protected function getMenuAtivo() {
        return 'fotos';
    }

    public function albuns() {
        $model = new AlbumModel();
        //die(var_dump($departamento));
        $dados['albuns'] = $model->retrieveAllByDepartamento($this->departamento);
        $content = $this->load->view('restrito/fotos/albunsLista_comp', $dados, true);
        $page = new SimpleRestritoPage('Albuns', $content, array(
            array('glyphicon glyphicon-picture','Fotos'), 'Albuns'));
        return $page->getComponent();
    }

    public function albumMantem($id = 0) {
        $dados = array();
        $dados['title'] = 'Cadastro';
        if ($id != 0) {
            $model = new AlbumModel();
            $dados = $model->retrieveArrayById($id);
            verificarPermissaoDepartamento($dados, $this->departamento, 'restrito/fotos/albuns');
            $dados['title'] = 'Edição';
        }
        $dados['id'] = $id > 0 ? $id : '';
        $dados['dataCadastro'] = isset($dados['dataCadastro']) ? $dados['dataCadastro'] : new DateTime();
        $dados['departamentos'] = $this->dep->retrieveAll();
        $dados['statusList'] = $this->stat->retrieveAll();
        $dados['departamentoPerfil'] = $this->departamento;
        $content = $this->load->view('restrito/fotos/albunsMantem_comp', $dados, true);
        $page = new SimpleRestritoPage('Mantem Album', $content, array(
            array('glyphicon glyphicon-picture','Fotos'), 'Albuns', 'Mantem'));
        return $page->getComponent();
    }

    public function salvarAlbum() {
        $album = new Album();
        $model = new AlbumModel();
        $dados = $this->input->post();
        $dados['departamento'] = $this->dep->retrieve($dados['departamento']);
        $dados['status'] = $this->stat->retrieve($dados['status']);
        $dados['flickr'] = addClassImgFlickr($dados['flickr']);
        $dados['dataCadastro'] = new DateTime($dados['dataCadastro']);
        if (empty($dados['id'])) {
            $dados['pessoaCadastro'] = $this->pessoa;
        } else {
            $album = $model->retrieve($dados['id']);
            $dados['pessoaCadastro'] = $album->getPessoaCadastro() == null ? $this->pessoa : $album->getPessoaCadastro();
        }
        $album->setAll($dados);
        $id = $model->saveOrUpdate($album);
        success('Sucesso', 'Album Salvo Com Sucesso');
        redirect('restrito/Fotos/albumMantem/' . $id);
    }

    public function albumInativar() {
        $id = $this->input->post('id');
        $model = new AlbumModel();
        try {
            $model->inativarStatus($id);
            success('Sucesso', 'Registro Inativado com Sucesso');
        } catch (Exception $e) {
            error('Error', 'Erro ao tentar inativar registro<br>'
                    . 'Tente novamente ou contate o administrador.');
        }
        redirect('restrito/fotos/albuns');
    }

    public function albumAtivar() {
        $id = $this->input->post('id');
        $model = new AlbumModel();
        try {
            $model->ativarStatus($id);
            success('Sucesso', 'Registro ativado com Sucesso');
        } catch (Exception $e) {
            error('Error', 'Erro ao tentar ativar registro<br>'
                    . 'Tente novamente ou contate o administrador.');
        }
        redirect('restrito/fotos/albuns');
    }
    
    protected function getController() {
        return $this->router->class;
    }

}
