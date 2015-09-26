<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

Use enums\DepartamentoEnum;

/**
 * Restrito_Controller
 * @category RestritoDepartamento_Controller
 * @package  CodeIgniter
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
abstract class RestritoDepartamento_Controller extends Restrito_Controller {

    abstract function getDepartamentoOfPage();

    private $departamentoNome = '';

    /**
     * Constructor of Base Controller
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * Toda requisição via url aos controllers que extendem ess
     * caem aqui. Tem um switch para gerencia qual página será
     * carregada.
     * @return conteudo 
     * 
     */
    protected function getContent() {
        /* Carregando Models */
        $this->load->model('EntitiesModels/DepartamentoModel', 'dep');
        $this->load->model('EntitiesModels/CoordenacaoDepartamentoModel', 'cd');
        $this->load->model('EntitiesModels/PessoaModel', 'pes');
        $this->load->model('EntitiesModels/StatusModel', 'stat');
        $this->load->model('EntitiesModels/PessoaModel', 'p');
        /* Carregando Components */
        $this->load->component('page/SimpleRestritoPage');
        $this->departamento = getDepartamentoByPerfil($this->pessoa->getPerfil()->getId());
        $this->departamentoNome = $this->getDepartamentoOfPage()->getApelido();
        $metodo = $this->router->method;
        switch ($metodo) {
            case 'coordenacao':
                $this->setMenuAtivoFilho($this->departamentoNome);
                $this->setMenuAtivoNeto('coordenacao');
                return $this->coordenacao();
            case 'coordenadorMantem':
                $this->setMenuAtivoFilho($this->departamentoNome);
                $this->setMenuAtivoNeto('coordenacao');
                back('restrito/departamento/' . $this->departamentoNome . '/coordenacao');
                $id = $this->uri->segment(5);
                if ($id != null) {
                    newButton('restrito/departamento/' . $this->departamentoNome . '/coordenadorMantem');
                    return $this->coordenadorMantem($id);
                }
                return $this->coordenadorMantem();
            case 'agenda':
                $this->setMenuAtivoFilho($this->departamentoNome);
                $this->setMenuAtivoNeto('agenda');
                return $this->agenda();
            case 'coordenacaoOrdem':
                $this->setMenuAtivoFilho($this->departamentoNome);
                $this->setMenuAtivoNeto('coordenacao');
                back('restrito/departamento/' . $this->departamentoNome . '/coordenacao');
                return $this->coordenacaoOrdem();
        }
    }

    /*
     *
     * Coordenação
     *   
     */

    /**
     * 
     * @return pagina com a listagem dos coordenadores
     */
    public function coordenacao() {
        $model = new CoordenacaoDepartamentoModel();
        $dados['coordenacao'] = $model->retrieveAllByDepartamento($this->getDepartamentoOfPage()->getId());
        $dados['departamento'] = $this->departamentoNome;
        $content = $this->load->view('restrito/departamento/coordenacaoLista_comp', $dados, true);
        $breadcrumbs = array(array('fa fa-cubes', 'Departamento'), $this->departamentoNome, 'Coordenação');
        $page = new SimpleRestritoPage('Coordenação ' . $this->departamentoNome, $content, $breadcrumbs);
        return $page->getComponent();
    }

    /**
     * 
     * @param integer $id 
     * @return pagina para edição
     */
    public function coordenadorMantem($id = 0) {
        if ($this->session->flashdata('coordenador')) {
            $dados = $this->session->flashdata('coordenador');
            return $this->processaDadosMantem($dados, $id);
        } else if ($id != 0) {
            $model = new CoordenacaoDepartamentoModel();
            $coordenador = $model->CI_buscarById($id);
            return $this->processaDadosMantem($coordenador, $id);
        }
        return $this->processaDadosMantem(array(), $id);
    }

    /*
     * Processa dados do coordenador
     * @return pagina de cadastro/edição
     */

    private function processaDadosMantem($dados, $id) {
        $dados['id'] = $id > 0 ? $id : '';
        $dados['title'] = $id > 0 ? 'Edição' : 'Cadastro';
        $dados['departamentos'] = $this->dep->retrieveAll();
        $dados['statusList'] = $this->stat->retrieveAll();
        $dados['pessoas'] = $this->pes->retrieveAll();
        $dados['departamento'] = $this->departamentoNome;
        $dados['cod_departamento'] = $this->getDepartamentoOfPage()->getId();
        $content = $this->load->view('restrito/departamento/coordenacaoMantem_comp', $dados, true);
        $breadcrumbs = array(array('fa fa-cubes', 'Departamento'), $this->departamentoNome, 'Coordenação', 'Mantem');
        $page = new SimpleRestritoPage('Mantem Coordenador', $content, $breadcrumbs);
        return $page->getComponent();
    }

    /**
     * Salva um coordenador
     */
    public function salvarCoordenador() {
        $dados = $this->input->post();
        try {
            $dados['cod_departamento'] = $this->getDepartamentoOfPage()->getId();
            $dados['posicao'] = 0;
            $dados['foto'] = $this->processaImagem($dados, 'foto');
            if ($dados['foto'] == null) {
                unset($dados['foto']);
            }
            unset($dados['fotoAtual']);
            if ($dados['cod_pessoa'] == 0) {
                unset($dados['cod_pessoa']);
            }
            $model = new CoordenacaoDepartamentoModel();
            $id = $model->CI_saveOrUpdate($dados, 'id');
            success('Sucesso', 'Registro Salvo com Sucesso');
        } catch (Exception $e) {
            $this->session->set_flashdata('coordenador', $dados);
            error('Error', 'Erro ao tentar salvar registro<br>'
                    . 'Tente novamente ou contate o administrador.');
        }
        redirect('restrito/departamento/' . $this->departamentoNome . '/coordenadorMantem/' . $id);
    }

    /**
     * 
     * @param type referencia para $coordenador
     * @return path imagem salva
     */
    private function processaImagem(&$coordenador, $foto) {
        if ($_FILES[$foto]['name'] != '') {
            $path = '/public/images/departamentos/' . $this->departamentoNome . '/coordenacao';
            $caminho = pathRaiz() . $path;
            $nomeImagem = 'coordenacao' . date('YmdHis');

            $config['upload_path'] = $caminho;
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $nomeImagem;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($foto)) {
                $error = $this->upload->display_errors();
                error('Erro no Upload da Imagem', $error);
                $this->session->set_flashdata('coordenador', $coordenador);
                redirect('restrito/departamento/' . $this->departamentoNome . '/coordenadorMantem/' . $coordenador['id']);
            } else {
                $config1['source_image'] = $this->upload->data('full_path');
                $config1['maintain_ratio'] = FALSE;
                $config1['width'] = 400;
                $config1['height'] = 450;
                $this->load->library('image_lib', $config1);
                $this->image_lib->resize();
                excluirImagem($coordenador['fotoAtual']);
                return $path . '/' . $nomeImagem . $this->upload->data('file_ext');
            }
        }
    }

    /**
     * Inativa coordenador
     */
    public function inativarCoordenador() {
        $id = $this->input->post('id');
        $model = new CoordenacaoDepartamentoModel();
        try {
            $model->inativarStatus($id);
            success('Sucesso', 'Registro Inativado com Sucesso');
        } catch (Exception $e) {
            error('Error', 'Erro ao tentar inativar registro<br>'
                    . 'Tente novamente ou contate o administrador.');
        }
        redirect('restrito/departamento/' . $this->departamentoNome . '/coordenacao/');
    }

    /**
     * Ativa Coordenador
     */
    public function ativarCoordenador() {
        $id = $this->input->post('id');
        $model = new CoordenacaoDepartamentoModel();
        try {
            $model->ativarStatus($id);
            success('Sucesso', 'Registro ativado com Sucesso');
        } catch (Exception $e) {
            error('Error', 'Erro ao tentar ativar registro<br>'
                    . 'Tente novamente ou contate o administrador.');
        }
        redirect('restrito/departamento/' . $this->departamentoNome . '/coordenacao/');
    }

    /**
     * AGENDA
     */

    /**
     * 
     * @return pagina manter agenda
     */
    public function agenda() {
        $dados['departamento'] = $this->getDepartamentoOfPage();
        $agenda = json_decode($dados['departamento']->getAgendaGoogle());
        $dados['agenda'] = isset($agenda->agenda) ? $agenda->agenda : $dados['departamento']->getAgendaGoogle();
        $dados['tipo'] = isset($agenda->tipo) ? $agenda->tipo : '';
        $dados['title'] = 'Agenda';
        $content = $this->load->view('restrito/departamento/agendaMantem_comp', $dados, true);
        $breadcrumbs = array(array('fa fa-cubes', 'Departamento'), $this->departamentoNome, 'Agenda');
        $page = new SimpleRestritoPage('Agenda ' . $this->departamentoNome, $content, $breadcrumbs);
        return $page->getComponent();
    }

    public function salvarAgenda() {
        $departamento = $this->getDepartamentoOfPage();
        $agenda = $this->input->post();
        $dados = json_encode($agenda);
        $departamento->setAgendaGoogle($dados);
        $model = new DepartamentoModel();
        $model->saveOrUpdate($departamento);
        success("Sucesso", "Agenda Salva Com Sucesso");
        redirect('restrito/departamento/' . $this->departamentoNome . '/agenda');
    }

    public function coordenacaoOrdem() {
        $model = new CoordenacaoDepartamentoModel();
        $dados['pessoas'] = $model->retrieveByDepartamentoAndYear2($this->getDepartamentoOfPage()->getId());
        $dados['title'] = 'Ordena coordenação ' . $this->departamentoNome;
        $dados['departamento'] = $this->getDepartamentoOfPage();
        $content = $this->load->view('restrito/departamento/ordemMantem_comp', $dados, true);
        $breadcrumbs = array(array('fa fa-cubes', 'Departamento'), $this->departamentoNome, 'Coordenação', 'Ordena');
        $page = new SimpleRestritoPage('Defini Ordem', $content, $breadcrumbs);
        return $page->getComponent();
    }

    /**
     * 
     */
    public function salvarOrdem() {
        $model = new CoordenacaoDepartamentoModel();
        $dados = $this->input->post();
//        die(var_dump($dados));
        for ($i = 1; $i <= count($dados); $i++) {
            $id = array_search($i, $dados);
            $pessoa = $model->retrieve($id);
            $pessoa->setPosicao($i);
            $model->saveOrUpdate($pessoa);
        }
        success("Sucesso", "Ordem redefinida com sucesso!");
        redirect('restrito/departamento/' . $this->departamentoNome . '/coordenacaoOrdem');
    }

    /**
     * @override
     */
    protected function getMenuAtivo() {
        return 'departamentos';
    }

}
