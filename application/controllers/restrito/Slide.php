<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Fotos.php';

Use Entities\Slide as S;

/**
 * @property Doctrine $doctrine Biblioteca ORM
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Slide extends Fotos {

    /**
     * Método Construtor
     */
    public function __construct() {
        parent::__construct();
    }

    protected function getContent() {
        /* Carregando Models */
        $this->load->model('EntitiesModels/SlideModel');
        $this->load->model('EntitiesModels/NoticiaModel', 'n');
        $this->load->model('EntitiesModels/ComunicadoModel', 'c');
        $this->load->model('EntitiesModels/DepartamentoModel', 'dep');
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
                $this->setMenuAtivoFilho('slides');
                return $this->lista();
            case 'slideMantem':
                $this->setMenuAtivoFilho('slides');
                back('restrito/slide/lista');
                $id = $this->uri->segment(4);
                $dados = array();
                if ($this->session->flashdata('slide')) {
                    $dados = $this->session->flashdata('slide');
                }
                if ($id != null) {
                    newButton('restrito/slide/slideMantem');
                    return $this->slideMantem($id, $dados);
                }
                return $this->slideMantem(0, $dados);
        }
    }

    public function index() {
        
    }

    public function lista() {
        $model = new SlideModel();
        $dados['slides'] = $model->retrieveAllByDepartamento($this->departamento);
        $content = $this->load->view('restrito/fotos/slidesLista_comp', $dados, true);
        $page = new SimpleRestritoPage('Slides', $content, array(
            array('glyphicon glyphicon-camera', 'Fotos'), 'Slides'));
        return $page->getComponent();
    }

    public function slideMantem($id = 0, $dados = array()) {

        if ($id != 0 && empty($dados)) {
            $model = new SlideModel();
            $dados = $model->retrieveArrayById($id);
            if ($dados['tipoSlide'] < 3) {
                $linkParts = explode("/", $dados['link']);
                $dados['idLink'] = $linkParts[1];
            }
            //Impede que usuários sem permissão editem o registro, caso passem o id pela url
            verificarPermissaoDepartamento($dados, $this->departamento, 'restrito/slide/lista');
        }
        $dados['id'] = $id > 0 ? $id : '';
        $dados['title'] = $id != 0 ? 'Edição' : 'Cadastro';
        $dados['departamentos'] = $this->dep->retrieveAll();
        $dados['noticias'] = $this->n->retrieveAtivas();
        $dados['comunicados'] = $this->c->retrieveAll();
        $dados['departamentoPerfil'] = $this->departamento;
        $content = $this->load->view('restrito/fotos/slideMantem_comp', $dados, true);
        $page = new SimpleRestritoPage('Mantem Slide', $content, array(
            array('glyphicon glyphicon-camera', 'Fotos'), 'Slides', 'Mantem'));
        return $page->getComponent();
    }

    /**
     * Salva slide e a foto.
     */
    public function salvarSlide() {
        try {
            $slide = new S();
            $model = new SlideModel();
            $dados = $this->input->post();
            $departamento = $this->dep->retrieve($dados['departamento']);
            $this->processaImagem($dados, 'foto', $departamento);
            unset($dados['fotoAtual']);
            $dados['departamento'] = $departamento;
            $dados['status'] = $this->stat->retrieve($dados['status']);
            if (!empty($dados['id'])) {
                $slide = $model->retrieve($dados['id']);
            }
            if(!empty($dados['dataSai'])){
                $dados['dataSai'] = new DateTime($dados['dataSai']);
            }else{
                unset($dados['dataSai']);
            }
            $slide->setAll($dados);
            $id = $model->saveOrUpdate($slide);
            success('Sucesso', 'Slide Salvo Com Sucesso');
            redirect('restrito/slide/slideMantem/' . $id);
        } catch (Exception $e) {
            error('ERRO', 'Erro ao tentar salvar! Tente Novamente mais tarde ou Contate o Administrador!');
            $this->session->set_flashdata('slide', $dados);
            $id = $dados['id'] != '' ? $dados['id'] : 0;
            redirect('restrito/slide/slideMantem/' . $id);
        }
    }

    public function slideInativar() {
        $id = $this->input->post('id');
        $model = new SlideModel();
        try {
            $model->inativarStatus($id);
            success('Sucesso', 'Registro Inativado com Sucesso');
        } catch (Exception $e) {
            error('Error', 'Erro ao tentar inativar registro<br>'
                    . 'Tente novamente ou contate o administrador.');
        }
        redirect('restrito/slide/lista');
    }

    public function slideAtivar() {
        $id = $this->input->post('id');
        $model = new SlideModel();
        try {
            $model->ativarStatus($id);
            success('Sucesso', 'Registro ativado com Sucesso');
        } catch (Exception $e) {
            error('Error', 'Erro ao tentar ativar registro<br>'
                    . 'Tente novamente ou contate o administrador.');
        }
        redirect('restrito/slide/lista');
    }

    /**
     * 
     * @param type referencia para $membro
     * @return path imagem salva
     */
    private function processaImagem(&$slide, $foto, $departamento) {
        $id = $slide['id'] != '' ? $slide['id'] : 0;
        if ($_FILES[$foto]['name'] != '') {
            $path = '/public/images/banner';
            $caminho = pathRaiz() . $path;
            $nomeImagem = $departamento->getApelido() . date('YmdHis');

            $config['upload_path'] = $caminho;
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $nomeImagem;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($foto)) {
                $dados['error'] = $this->upload->display_errors();
                error('Erro no Upload da Imagem', $dados['error']);
                $this->session->set_flashdata('slide', $slide);
                redirect('restrito/slide/slideMantem/' . $id);
            } else {
                $config1['source_image'] = $this->upload->data('full_path');
                $config1['maintain_ratio'] = FALSE;
                $config1['width'] = 960;
                $config1['height'] = 268;
                $this->load->library('image_lib', $config1);
                $this->image_lib->resize();
                excluirImagem($slide['fotoAtual']);
                $slide['foto'] = $path . '/' . $nomeImagem . $this->upload->data('file_ext');
            }
        }
    }

    protected function getController() {
        return $this->router->class;
    }

}
