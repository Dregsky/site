<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Use Entities\Pessoa as Pessoa;
Use Entities\Departamento;
Use Entities\Status;
Use Entities\Album;
Use enums\TipoPerfil;
Use enums\DepartamentoEnum;

/**
 * @property Doctrine $doctrine Biblioteca ORM
 * @property home_model $homeModel Model
 * @property Pessoa $album 
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Fotos extends Restrito_Controller {

    private $departamento;

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

        $this->departamento = $this->getDepartamentoByPerfil($this->pessoa->getPerfil()->getId());
        $metodo = $this->router->method;
        switch ($metodo) {
            case 'albuns':
                $this->setMenuAtivoFilho('albuns');
                return $this->albuns();
            case 'albumMantem':
                $this->setMenuAtivoFilho('albuns');
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
        $dados['albuns'] = $model->retrieveByDepartamento($this->departamento);
        return $this->load->view('restrito/albunsLista_comp', $dados, true);
    }

    public function albumMantem($id = 0) {
        $dados = array();
        if ($id != 0) {
            $model = new AlbumModel();
            $dados = $model->retrieveArrayById($id);
        }
        $dados['id'] = $id > 0 ? $id : '';
        $dados['dataCadastro'] = isset($dados['dataCadastro']) ? $dados['dataCadastro'] : new DateTime();
        $dados['departamentos'] = $this->dep->retrieveAll();
        $dados['statusList'] = $this->stat->retrieveAll();
        $dados['departamentoPerfil'] = $this->departamento;
        return $this->load->view('restrito/albunsMantem_comp', $dados, true);
    }

    public function salvarAlbum() {
        $album = new Album();
        $model = new AlbumModel();
        $dados = $this->input->post();
        $dados['departamento'] = $this->dep->retrieve($dados['departamento']);
        $dados['status'] = $this->stat->retrieve($dados['status']);
        $dados['flickr'] = addClassImgFlickr($dados['flickr']);
        $dados['dataCadastro'] = new DateTime($dados['dataCadastro']);
        if(empty($dados['id'])){
            $dados['pessoaCadastro'] = $this->pessoa;
            $album->setAll($dados);
            $id = $model->saveOrUpdate($album);
        }else{
            $ab = $model->retrieve($dados['id']);
            $dados['pessoaCadastro'] = $ab->getPessoaCadastro() == null ? $this->pessoa : $ab->getPessoaCadastro();
            $ab->setAll($dados);
            $model->saveOrUpdate($ab);
            $id = $dados['id'];
        }
        success('Sucesso', 'Album Salvo Com Sucesso');
        redirect('restrito/Fotos/albumMantem/' . $id);
    }

    private function getDepartamentoByPerfil($perfil) {
        switch ($perfil) {
            case TipoPerfil::ANG:
                return DepartamentoEnum::ANG;
            case TipoPerfil::CIBE:
                return DepartamentoEnum::CIBE;
            case TipoPerfil::EBD:
                return DepartamentoEnum::EBD;
            case TipoPerfil::FAMILIA:
                return DepartamentoEnum::FAMILIA;
            case TipoPerfil::INFANTIL:
                return DepartamentoEnum::CVKIDS;
            case TipoPerfil::JORNALISTA:
                return 0;
            case TipoPerfil::MEMBRO:
                return -1;
            case TipoPerfil::MISSOES:
                return DepartamentoEnum::MISSOES;
            case TipoPerfil::MTV:
                return DepartamentoEnum::MTV;
            case TipoPerfil::OBREIROS:
                return DepartamentoEnum::OBREIROS;
            case TipoPerfil::ORQUESTRA:
                return DepartamentoEnum::ORQUESTRA;
            case TipoPerfil::SECRETARIO:
                return DepartamentoEnum::SECRETARIA;
            case TipoPerfil::SUPER_ADMINISTRADOR:
                return 0;
            case TipoPerfil::ADMINISTRADOR:
                return 0;
            case TipoPerfil::TESOUREIRO:
                return -1;
        }
    }

}
