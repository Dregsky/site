<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Fotos.php';

Use Entities\Noticia as N;

/**
 * @property Doctrine $doctrine Biblioteca ORM
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Noticia extends Restrito_Controller {

    /**
     * Método Construtor
     */
    public function __construct() {
        parent::__construct();
    }

    protected function getContent() {
        /* Carregando Models */
        $this->load->model('EntitiesModels/NoticiaModel', 'n');
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
                $this->setMenuAtivoFilho('listaNoticia');
                return $this->lista();
            case 'noticiaMantem':
                $this->setMenuAtivoFilho('mantemNoticia');
                back('restrito/noticia/lista');
                $id = $this->uri->segment(4);
                $dados = array();
                if ($this->session->flashdata('noticia')) {
                    $dados = $this->session->flashdata('noticia');
                }
                if ($id != null) {
                    newButton('restrito/noticia/noticiaMantem');
                    return $this->noticiaMantem($id, $dados);
                }
                return $this->noticiaMantem(0, $dados);
        }
    }

    public function index() {
        
    }

    public function lista() {
        $model = new NoticiaModel();
        $dados['noticias'] = $model->retrieveAllByDepartamento($this->departamento);
        $content = $this->load->view('restrito/noticia/noticiasLista_comp', $dados, true);
        $page = new SimpleRestritoPage('Notícias', $content, array(
            array('fa fa-newspaper-o', 'Notícia'), 'Lista'));
        return $page->getComponent();
    }

    public function noticiaMantem($id = 0, $dados = array()) {

        if ($id != 0 && empty($dados)) {
            $model = new NoticiaModel();
            $dados = $model->retrieveArrayById($id);
            //Impede que usuários sem permissão editem o registro, caso passem o id pela url
            verificarPermissaoDepartamento($dados, $this->departamento, 'restrito/noticia/lista');
        }
        $dados['id'] = $id > 0 ? $id : '';
        $dados['title'] = $id != 0 ? 'Edição' : 'Cadastro';
        $dados['departamentos'] = $this->dep->retrieveAll();
        $dados['statusList'] = $this->stat->retrieveAll();
        $dados['departamentoPerfil'] = $this->departamento;
        $content = $this->load->view('restrito/noticia/noticiaMantem_comp', $dados, true);
        $page = new SimpleRestritoPage('Mantem Notícia', $content, array(
            array('fa fa-newspaper-o', 'Notícia'), 'Mantem'));
        return $page->getComponent();
    }

    /**
     * Salva noticia e a foto.
     */
    public function salvarNoticia() {
        $dados = $this->input->post();
        try {
            $noticia = new N();
            $model = new NoticiaModel();
            //O editir de texto wysihtml5, passa por post esse parametro
            unset($dados['_wysihtml5_mode']);
            $departamento = $this->dep->retrieve($dados['departamento']);
            $this->processaImagem($dados, 'fotoNoticia', $departamento);
            unset($dados['fotoAtual']);
            $dados['departamento'] = $departamento;
            $dados['status'] = $this->stat->retrieve($dados['status']);
            if (!empty($dados['id'])) {
                $noticia = $model->retrieve($dados['id']);
            } else {
                $dados['pessoaCadastro'] = $this->pessoa;
                $dados['dataCadastro'] = new DateTime();
                $interval = new DateInterval('P7D');
                $dados['dataSaiNovo'] = (new DateTime())->add($interval);
            }
            
            if(!empty($dados['dataEvento'])){
                $dados['dataEvento'] = new DateTime($dados['dataEvento']);
            }else{
                unset($dados['dataEvento']);
            }
            $noticia->setAll($dados);
            $id = $model->saveOrUpdate($noticia);
            success('Sucesso', 'Notícia Salvo Com Sucesso');
            redirect('restrito/noticia/noticiaMantem/' . $id);
        } catch (Exception $e) {
            error('ERRO', 'Erro ao tentar salvar! Tente Novamente mais tarde ou Contate o Administrador!');
            $this->session->set_flashdata('noticia', $dados);
            $id = $dados['id'] != '' ? $dados['id'] : 0;
            redirect('restrito/noticia/noticiaMantem/' . $id);
        }
    }

    public function noticiaInativar() {
        $id = $this->input->post('id');
        $model = new NoticiaModel();
        try {
            $model->inativarStatus($id);
            success('Sucesso', 'Registro Inativado com Sucesso');
        } catch (Exception $e) {
            error('Error', 'Erro ao tentar inativar registro<br>'
                    . 'Tente novamente ou contate o administrador.');
        }
        redirect('restrito/noticia/lista');
    }

    public function noticiaAtivar() {
        $id = $this->input->post('id');
        $model = new NoticiaModel();
        try {
            $model->ativarStatus($id);
            success('Sucesso', 'Registro ativado com Sucesso');
        } catch (Exception $e) {
            error('Error', 'Erro ao tentar ativar registro<br>'
                    . 'Tente novamente ou contate o administrador.');
        }
        redirect('restrito/noticia/lista');
    }

    /**
     * 
     * @param type referencia para $membro
     * @return path imagem salva
     */
    private function processaImagem(&$noticia, $foto, $departamento) {
        $id = $noticia['id'] != '' ? $noticia['id'] : 0;
        if ($_FILES[$foto]['name'] != '') {
            $path = '/public/images/noticias';
            $caminho = pathRaiz() . $path;
            $nomeImagem = $departamento->getApelido() . date('YmdHis');

            $config['upload_path'] = $caminho;
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $nomeImagem;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($foto)) {
                $dados['error'] = $this->upload->display_errors();
                error('Erro no Upload da Imagem', $dados['error']);
                $this->session->set_flashdata('noticia', $noticia);
                redirect('restrito/noticia/noticiaMantem/' . $id);
            } else {
                excluirImagem($noticia['fotoAtual']);
                $noticia['fotoNoticia'] = $nomeImagem . $this->upload->data('file_ext');
            }
        }
    }

    protected function getController() {
        return $this->router->class;
    }

    protected function getMenuAtivo() {
        return 'noticias';
    }

}
