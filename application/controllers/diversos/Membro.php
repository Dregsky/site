<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use enums\TipoPerfil;
use enums\TipoStatus;
use Entities\Pessoa;

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * @params $
 */
class Membro extends Principal_Controller {

    /**
     * Método Construtor
     */
    public function Membro() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function getCustomPage() {
        /**
         * Includes de models
         */
        $this->load->model('EntitiesModels/ProfissaoModel', 'prof');
        $this->load->model('EntitiesModels/EscolaridadeModel', 'esc');
        $this->load->model('EntitiesModels/EstadoCivilModel', 'est');
        $this->load->model('EntitiesModels/FuncaoMinisterialModel', 'func');
        $this->load->model('EntitiesModels/DepartamentoModel', 'dep');
        $this->load->model('EntitiesModels/PessoaModel', 'p');
        /**
         * Includes de components
         */
        $this->load->component('page/SimplePage');
        /**
         * criação de panels
         */
        $page = array();
        if ($this->session->flashdata('membros')) {
            $page = $this->session->flashdata('membros');
        }
        $dados['panel1'] = $this->cadastroPage($page);

        return $this->load->view('components/page/simple_page', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    public function cadastroPage(&$dados) {
        $this->retrieveSelectsList($dados);
        $this->initializeDados($dados);
        $content = $this->load->view('diversos/cadastroMembro_comp', $dados, true);
        $page = new SimplePage('Cadastro de Membro', $content);
        return $page->getComponent();
    }

    private function retrieveSelectsList(&$dados) {
        $dados['escolaridadeList'] = $this->esc->retrieveAll();
        $dados['profissoes'] = $this->prof->retrieveAll();
        $dados['estadoCivilList'] = $this->est->retrieveAll();
        $dados['funcaoList'] = $this->func->retrieveAll();
        $dados['departamentos'] = $this->dep->retrieveAll();
    }

    private function initializeDados(&$dados) {
        $indexes = array(
            'nome', 'cpf', 'rua',
            'bairro', 'cidade', 'email',
            'cidadeNatal', 'telefone', 'escolaridade',
            'profissao', 'rg', 'orgaoEmissor',
            'estadoCivil', 'funcaoMinisterial', 'departamento',
            'nomePai', 'nomeMae', 'nomeConjuge', 'qtdFilhos'
        );
        $datas = array(
            'dataNascimento', 'dataEmissao', 'dataChegada',
            'dataBatismoEspirito', 'dataBatismoAguas', 'dataChegada',
            'dataCasamento'
        );
        $this->setDados($dados, $indexes);
        $this->setDatasToString($dados, $datas);
    }

    private function setDados(&$dados, $indexes) {
        foreach ($indexes as $index) {
            if (!isset($dados[$index])) {
                $dados[$index] = '';
            } else {
                if ($dados[$index] instanceof Entities\AbstractEntity) {
                    $dados[$index] = $dados[$index]->getId();
                }
            }
        }
    }

    private function setDatasToString(&$dados, $indexes) {
        foreach ($indexes as $index) {
            if (!isset($dados[$index])) {
                $dados[$index] = '';
            } else {
                if ($dados[$index] instanceof DateTime) {
                    $dados[$index] = $dados[$index]->format('Y-m-d');
                }
            }
        }
    }

    public function cadastrar() {
        $dados = $this->input->post();
        $dados = $this->processaDados($dados);
        //var_dump($dados);
        $this->validaCPF($dados);
        $pessoa = new Pessoa();
        $pessoa->setAll($dados);
        $pessoaModel = new PessoaModel();
        //var_dump($pessoa);
        $pessoaModel->saveOrUpdate($pessoa);
        success('Sucesso', 'Membro cadastrado com sucesso. Obrigado!');
        redirect('diversos/membro/success');
    }

    private function processaDados($dados) {
        $dados = $this->processaDatas($dados, array('dataCasamento',
            'dataNascimento',
            'dataEmissao',
            'dataChegada',
            'dataBatismoAguas',
            'dataBatismoEspirito'
                )
        );
        $dados['cpf'] = preg_replace( '#[^0-9]#', '', $dados['cpf']);
        $dados['fotoPessoa'] = $this->processaImagem($dados, 'fotoPessoa');
        $dados['dataCadastro'] = new DateTime();
        $dados['escolaridade'] = $this->esc->retrieve($dados['escolaridade']);
        $dados['profissao'] = $this->prof->retrieve($dados['profissao']);
        $dados['estadoCivil'] = $this->est->retrieve($dados['estadoCivil']);
        $dados['funcaoMinisterial'] = $this->func->retrieve($dados['funcaoMinisterial']);
        $dados['departamento'] = $this->dep->retrieve($dados['departamento']);
        $dados['status'] = (new TipoStatus())->retrieveReferencedEntity(TipoStatus::ATIVO);
        $dados['perfil'] = (new TipoPerfil())->retrieveReferencedEntity(TipoPerfil::MEMBRO);
        return $dados;
    }

    private function processaDatas($dados, $array) {
        foreach ($array as $index) {
            $dados = $this->processaData($dados, $index);
        }
        return $dados;
    }

    private function processaData($dados, $index) {
        if (empty($dados[$index])) {
            unset($dados[$index]);
        } else {
            $dados[$index] = new DateTime($dados[$index]);
        }
        return $dados;
    }

    /**
     * 
     * @param type referencia para $membro
     * @return path imagem salva
     */
    private function processaImagem(&$membro, $foto) {
        if ($_FILES[$foto]['name'] != '') {
            $path = '/public/images/membros';
            $caminho = pathRaiz() . $path;
            $nomeImagem = 'membro' . date('YmdHis');

            $config['upload_path'] = $caminho;
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $nomeImagem;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($foto)) {
                $dados = $this->retrieveSelectsList();
                $dados['error'] = $this->upload->display_errors();
                error('Erro no Upload da Imagem', $dados['error']);
                $this->session->set_flashdata('membros', $membro);
                redirect('diversos/membro/error');
            } else {
                $config1['source_image'] = $this->upload->data('full_path');
                $config1['maintain_ratio'] = FALSE;
                $config1['width'] = 400;
                $config1['height'] = 300;
                $this->load->library('image_lib', $config1);
                $this->image_lib->resize();
                return $path . '/' . $nomeImagem . $this->upload->data('file_ext');
            }
        }
    }

    private function validaCPF(&$membro) {
        $model = new PessoaModel();
        if ($model->countCpf($membro['cpf']) > 0) {
            error('ERRO', 'CPF já cadastrado');
            $this->session->set_flashdata('membros', $membro);
            redirect('diversos/membro/error');
        }
    }

    public function error() {
        
    }

    public function success() {
        
    }

}
