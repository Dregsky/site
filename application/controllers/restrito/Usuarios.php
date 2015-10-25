<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Use Entities\Pessoa as Pessoa;
Use enums\TipoPerfil;
Use enums\TipoStatus;

/**
 * @property Doctrine $doctrine Biblioteca ORM
 * @property home_model $homeModel Model
 * @property Pessoa $album 
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Usuarios extends Restrito_Controller {

    /**
     * Método Construtor
     */
    public function __construct() {
        parent::__construct();
    }

    protected function getContent() {
        /* Carregando Models */
        $this->load->model('EntitiesModels/PessoaModel', 'p');
        $this->load->model('EntitiesModels/PerfilModel', 'pe');
        /* Carregando Components */
        $this->load->component('page/SimpleRestritoPage');
        $metodo = $this->router->method;
        return $this->pageControl($metodo);
    }

    private function pageControl($metodo) {
        switch ($metodo) {
            case 'lista':
                $this->setMenuAtivoFilho('listaUsuario');
                return $this->lista();

            case 'mantemUsuario':
                $this->setMenuAtivoFilho('mantemUsuario');
                $id = $this->uri->segment(4);
                $dados = array();
                back('restrito/usuarios/lista');
                if ($this->session->flashdata('usuario')) {
                    $dados = $this->session->flashdata('usuario');
                }
                if ($id != null) {
                    newButton('restrito/usuarios/mantemUsuario');
                    return $this->mantemUsuario($id, $dados);
                }
                return $this->mantemUsuario(0, $dados);
            default :
                break;
        }
    }

    public function index() {
        
    }

    protected function getMenuAtivo() {
        return 'usuarios';
    }

    public function lista() {
        $model = new PessoaModel();
        //die(var_dump($departamento));
        $dados['pessoas'] = $model->retrieveAllMembrosUsuarios();
        $content = $this->load->view('restrito/usuarios/usuarioLista_comp', $dados, true);
        $page = new SimpleRestritoPage('Lista', $content, array(array('glyphicon glyphicon-lock', 'Usuarios'), 'Lista'));
        return $page->getComponent();
    }

    public function mantemUsuario($id = 0, $dados = array()) {
        $title = $id == 0 ? 'Criar' : 'Edição';
        $breadcrumbs = $id == 0 ? array(array('glyphicon glyphicon-lock', 'Usuarios'), 'Mantem') : array(array('fa fa-users', 'Usuarios'), 'Lista', 'Mantem');
        $model = new PessoaModel();
        $pessoas = $model->retrieveAllMembrosNotUsuarios();
        if ($id != 0 && empty($dados)) {
            $p = $model->retrieveLoginById($id);
            if ($p == null) {
                error('Usuario não existe', 'Esse Usuário Não Existe');
                redirect('restrito/usuarios/lista');
            }
            $dados = $p;
            $dados['perfil'] = $this->p->retrieve($id)->getPerfil()->getId();
        }
        if($id !=0){
            $pessoas = $model->retrieveAllMembrosUsuarios();
        }
        $dados['pessoas'] = $pessoas;
        $dados['perfis'] = $this->pe->retrieveAll();
        $dados['id'] = $id == 0 ? '' : $id;
        $dados['title'] = $title;
        $content = $this->load->view('restrito/usuarios/usuarioMantem_comp', $dados, true);
        $page = new SimpleRestritoPage($title . ' Usuario', $content, $breadcrumbs);
        return $page->getComponent();
    }

    public function salvarUsuario() {
        $dados = $this->input->post();
        try {
//var_dump($dados);
            $pessoa = $this->p->retrieve($dados['id']);
            $this->verificaExistenciaLogin($dados);
            $pessoa->setLogin($dados['login']);
            $pessoa->setSenha(md5($dados['senha']));
            $pessoa->setPerfil($this->pe->retrieve($dados['perfil']));
            $pessoaModel = new PessoaModel();
            $id = $pessoaModel->saveOrUpdate($pessoa);
            success('Sucesso', 'Usuario salvo com sucesso. Obrigado!');
            redirect('restrito/usuarios/mantemUsuario/' . $id);
        } catch (Exception $e) {
            error('ERRO', 'Erro ao tentar salvar! Tente Novamente mais tarde ou Contate o Administrador!');
            $this->session->set_flashdata('usuario', $dados);
            $id = $dados['id'] != '' ? $dados['id'] : 0;
            redirect('restrito/usuarios/mantemUsuario/' . $id);
        }
    }
    
    protected function verificaExistenciaLogin($dados){
        $indicador = $this->p->verificaExistenciaLogin($dados['login'], $dados['id']);
        if($indicador>0){
            error('ERRO', 'O Login '."'".$dados['login']."'".' já esta atribuído a um usuário, escolha outro.');
            $this->session->set_flashdata('usuario', $dados);
            $p = $this->p->retrieveLoginById($dados['id']);
            $id = $p == null ? '' : $dados['id'];
            redirect('restrito/usuarios/mantemUsuario/' . $id);
        }
    }

    public function retirarLoginEsenha() {
        $id = $this->input->post('id');
        $model = new PessoaModel();
        $pessoa = $model->retrieve($id);
        $pessoa->setLogin(null);
        $pessoa->setSenha(null);
        try {
            $model->saveOrUpdate($pessoa);
            success('Sucesso', 'Login e Senha Removidos com Sucesso');
        } catch (Exception $e) {
            error('Error', 'Erro ao tentar remover login e senha do registro<br>'
                    . 'Tente novamente ou contate o administrador.');
        }
        redirect('restrito/usuarios/lista');
    }

    protected function getController() {
        return $this->router->class;
    }

}
