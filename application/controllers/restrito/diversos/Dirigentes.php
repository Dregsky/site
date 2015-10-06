<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Use Entities\Dirigente;

/**
 * @property Doctrine $doctrine Biblioteca ORM
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Dirigentes extends Restrito_Controller {

    /**
     * Método Construtor
     */
    public function __construct() {
        parent::__construct();
    }

    protected function getContent() {
        /* Carregando Models */
        $this->load->model('EntitiesModels/DirigenteModel', 'd');
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
                $this->setMenuAtivoFilho('listaDirigente');
                return $this->lista();
            case 'dirigenteMantem':
                $this->setMenuAtivoFilho('listaDirigente');
                back('restrito/diversos/dirigentes/lista');
                $id = $this->uri->segment(5);
                $dados = array();
                if ($this->session->flashdata('dirigente')) {
                    $dados = $this->session->flashdata('dirigente');
                }
                if ($id != null) {
                    newButton('restrito/diversos/dirigentes/dirigenteMantem');
                    return $this->dirigenteMantem($id, $dados);
                }
                return $this->dirigenteMantem(0, $dados);
            case 'dirigenteOrdem':
                $this->setMenuAtivoFilho('listaDirigente');
                back('restrito/diversos/dirigentes/lista');
                return $this->dirigenteOrdem();
        }
    }

    public function index() {
        
    }

    public function lista() {
        $model = new DirigenteModel();
        $dados['dirigentes'] = $model->retrieveAll();
        $content = $this->load->view('restrito/diversos/dirigentesLista_comp', $dados, true);
        $page = new SimpleRestritoPage('Dirigentes', $content, array(
            array('glyphicon glyphicon-globe', 'Diversos'), 'Dirigente', 'Lista'));
        return $page->getComponent();
    }

    public function dirigenteMantem($id = 0, $dados = array()) {

        if ($id != 0 && empty($dados)) {
            $model = new DirigenteModel();
            $dados = $model->retrieveArrayById($id);
            //Impede que acesse pagina pela url cujo id não existe
            verificarExistencia($dados, 'restrito/diversos/dirigentes/lista');
        }
        $dados['id'] = $id > 0 ? $id : '';
        $dados['title'] = $id != 0 ? 'Edição' : 'Cadastro';
        $content = $this->load->view('restrito/diversos/dirigenteMantem_comp', $dados, true);
        $page = new SimpleRestritoPage('Mantem Dirigente', $content, array(
            array('glyphicon glyphicon-globe', 'Diversos'), 'Dirigente', 'Lista', 'Mantem'));
        return $page->getComponent();
    }

    /**
     * Salva um coordenador
     */
    public function salvarDirigente() {
        $dados = $this->input->post();
        $dirigente = new Dirigente();
        try {
            $dados['foto'] = $this->processaImagem($dados, 'foto');
            if ($dados['foto'] == null) {
                unset($dados['foto']);
            }
            unset($dados['fotoAtual']);
            $model = new DirigenteModel();
            if($dados['id'] != ''){
                $dirigente = $model->retrieve($dados['id']);
            }
            $dirigente->setAll($dados);
            $id = $model->saveOrUpdate($dirigente);
            success('Sucesso', 'Registro Salvo com Sucesso');
        } catch (Exception $e) {
            $this->session->set_flashdata('coordenador', $dados);
            error('Error', 'Erro ao tentar salvar registro<br>'
                    . 'Tente novamente ou contate o administrador.');
        }
        redirect('restrito/diversos/dirigentes/dirigenteMantem/' . $id);
    }

    /**
     * 
     * @param type referencia para $dirigente
     * @return path imagem salva
     */
    private function processaImagem(&$dirigente, $foto) {
        if ($_FILES[$foto]['name'] != '') {
            $path = '/public/images/pastores';
            $caminho = pathRaiz() . $path;
            $nomeImagem = 'dirigente' . date('YmdHis');

            $config['upload_path'] = $caminho;
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $nomeImagem;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($foto)) {
                $error = $this->upload->display_errors();
                error('Erro no Upload da Imagem', $error);
                $this->session->set_flashdata('dirigente', $dirigente);
                redirect('restrito/diversos/dirigentes/dirigenteMantem/' . $dirigente['id']);
            } else {
                $config1['source_image'] = $this->upload->data('full_path');
                $config1['maintain_ratio'] = FALSE;
                $config1['width'] = 400;
                $config1['height'] = 450;
                $this->load->library('image_lib', $config1);
                $this->image_lib->resize();
                excluirImagem($dirigente['fotoAtual']);
                return $path . '/' . $nomeImagem . $this->upload->data('file_ext');
            }
        }
    }
    
    public function dirigenteOrdem() {
        $model = new DirigenteModel();
        $dados['dirigentes'] = $model->retrieveAllByPosicao();
        $dados['title'] = 'Ordena Dirigentes ';
        $content = $this->load->view('restrito/diversos/dirigenteOrdemMantem_comp', $dados, true);
        $breadcrumbs = array(array('fa fa-cubes', 'Diversos'), 'Lista', 'Ordena');
        $page = new SimpleRestritoPage('Defini Ordem', $content, $breadcrumbs);
        return $page->getComponent();
    }
    
     /**
     * 
     */
    public function salvarOrdem() {
        $model = new DirigenteModel();
        $dados = $this->input->post();
        for ($i = 1; $i <= count($dados); $i++) {
            $id = array_search($i, $dados);
            $dirigente = $model->retrieve($id);
            $dirigente->setPosicao($i);
            $model->saveOrUpdate($dirigente);
        }
        success("Sucesso", "Ordem redefinida com sucesso!");
        redirect('restrito/diversos/dirigentes/dirigenteOrdem');
    }


    protected function getController() {
        return $this->router->class;
    }

    protected function getMenuAtivo() {
        return 'diversos';
    }

}
