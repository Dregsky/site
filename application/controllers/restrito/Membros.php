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
class Membros extends Restrito_Controller {

    /**
     * Método Construtor
     */
    public function __construct() {
        parent::__construct();
    }

    protected function getContent() {
        /* Carregando Models */
        $this->load->model('EntitiesModels/ProfissaoModel', 'prof');
        $this->load->model('EntitiesModels/EscolaridadeModel', 'esc');
        $this->load->model('EntitiesModels/EstadoCivilModel', 'est');
        $this->load->model('EntitiesModels/FuncaoMinisterialModel', 'func');
        $this->load->model('EntitiesModels/DepartamentoModel', 'dep');
        $this->load->model('EntitiesModels/PessoaModel', 'p');
        /* Carregando Components */
        $this->load->component('page/SimpleRestritoPage');
        $metodo = $this->router->method;
        return $this->pageControl($metodo);
    }

    private function pageControl($metodo) {
        switch ($metodo) {
            case 'lista':
                $this->setMenuAtivoFilho('listaMembro');
                return $this->lista();

            case 'membroMantem':
                $this->setMenuAtivoFilho('mantemMembro');
                $id = $this->uri->segment(4);
                $dados = array();
                if ($this->session->flashdata('membros')) {
                    $dados = $this->session->flashdata('membros');
                }
                if ($id != null) {
                    back('restrito/membros/lista');
                    return $this->membroMantem($id, $dados);
                }
                return $this->membroMantem(0, $dados);
            default :
                break;
        }
    }

    public function index() {
        
    }

    protected function getMenuAtivo() {
        return 'membros';
    }

    public function lista() {
        $model = new PessoaModel();
        //die(var_dump($departamento));
        $dados['pessoas'] = $model->retrieveAll();
        $content = $this->load->view('restrito/membros/membrosLista_comp', $dados, true);
        $page = new SimpleRestritoPage('Lista', $content, array(array('fa fa-users', 'Membros'), 'Lista'));
        return $page->getComponent();
    }

    public function membroMantem($id = 0, $dados = array()) {
        $title = $id == 0 ? 'Cadastro' : 'Edição';
        $breadcrumbs = $id == 0 ? array(array('fa fa-users', 'Membros'), 'Mantem') : array(array('fa fa-users', 'Membros'), 'Lista', 'Mantem');
        if ($id != 0 && empty($dados)) {
            $model = new PessoaModel();
            $p = $model->retrieveArray($id);
            $p['departamentos'] = $model->CI_buscarDepartamentos($id);
            $dados = $p;
            /* Não deixa que pessoa sem permissão edite páginas e nem que seja acessado páginas de
             * edição com id inexistente;
             */
        }
        $this->retrieveSelectsList($dados);
        $this->initializeDados($dados);
        $content = $this->load->view('restrito/membros/membroMantem_comp', $dados, true);
        $page = new SimpleRestritoPage($title . ' Membro', $content, $breadcrumbs);
        return $page->getComponent();
    }

    private function retrieveSelectsList(&$dados) {
        $dados['escolaridadeList'] = $this->esc->retrieveAll();
        $dados['estadoCivilList'] = $this->est->retrieveAll();
        $dados['funcaoList'] = $this->func->retrieveAll();
        $dados['departamentosList'] = $this->dep->retrieveAllSemIgreja();
    }

    private function initializeDados(&$dados) {
        $indexes = array(
            'nome', 'cpf', 'rua', 'genero',
            'bairro', 'cidade', 'email',
            'cidadeNatal', 'telefone', 'escolaridade',
            'profissao', 'rg', 'orgaoEmissor',
            'estadoCivil', 'funcaoMinisterial',
            'nomePai', 'nomeMae', 'nomeConjuge', 'qtdFilhos', 'prof'
        );
        $datas = array(
            'dataNascimento', 'dataEmissao', 'dataChegada',
            'dataBatismoEspirito', 'dataBatismoAguas', 'dataChegada',
            'dataCasamento'
        );

        $indexesArray = array('departamentos');
        setDadosArray($dados, $indexesArray);
        setDados($dados, $indexes);
        setDatasToString($dados, $datas);
    }

    public function salvarMembro() {
        try {
            $dados = $this->processaDados($this->input->post());
//var_dump($dados);
            $fotoAtual = $dados['fotoAtual'];
            unset($dados['fotoAtual']);
            $pessoa = $dados['id'] == '' ? new Pessoa() : $this->p->retrieve($dados['id']);
            $pessoa->setAll($dados);
            $pessoaModel = new PessoaModel();
            $id = $pessoaModel->saveOrUpdate($pessoa);
            success('Sucesso', 'Membro salvo com sucesso. Obrigado!');
            redirect('restrito/membros/membroMantem/' . $id);
        } catch (Exception $e) {
            error('ERRO', 'Erro ao tentar salvar! Tente Novamente mais tarde ou Contate o Administrador!');
            $dados['fotoAtual'] = $fotoAtual;
            $this->session->set_flashdata('membros', $dados);
            $id = $dados['id'] != '' ? $dados['id'] : 0;
            redirect('restrito/membros/membroMantem/' . $id);
        }
    }

    public function membroInativar() {
        $id = $this->input->post('id');
        $model = new PessoaModel();
        try {
            $model->inativarStatus($id);

            success('Sucesso', 'Registro Inativado com Sucesso');
        } catch (Exception $e) {
            error('Error', 'Erro ao tentar inativar registro<br>'
                    . 'Tente novamente ou contate o administrador.');
        }
        redirect('restrito/membros/lista');
    }

    private function processaDados($dados) {
        $this->processaDatas($dados, array('dataCasamento',
            'dataNascimento',
            'dataEmissao',
            'dataChegada',
            'dataBatismoAguas',
            'dataBatismoEspirito'
                )
        );
        $dados['cpf'] = preg_replace('#[^0-9]#', '', $dados['cpf']);
        $dados['fotoPessoa'] = $dados['fotoAtual'];
        $this->validaCPF($dados);
        $this->processaImagem($dados, 'fotoPessoa');
        $dados['dataCadastro'] = new DateTime();
        $dados['escolaridade'] = $this->esc->retrieve($dados['escolaridade']);
        $dados['estadoCivil'] = $this->est->retrieve($dados['estadoCivil']);
        $dados['funcaoMinisterial'] = $this->func->retrieve($dados['funcaoMinisterial']);
        array_push($dados['departamentos'], enums\DepartamentoEnum::IGREJA);
        $dados['departamentos'] = $this->dep->retrieveByIds($dados['departamentos']);
        $dados['status'] = (new TipoStatus())->retrieveReferencedEntity(TipoStatus::ATIVO);
        if ($dados['id'] == '') {
            $dados['perfil'] = (new TipoPerfil())->retrieveReferencedEntity(TipoPerfil::MEMBRO);
        }
        return $dados;
    }

    private function processaDatas(&$dados, $array) {
        foreach ($array as $index) {
            $this->processaData($dados, $index);
        }
    }

    private function processaData(&$dados, $index) {
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
                $id = $membro['id'] != '' ? $membro['id'] : 0;
                redirect('restrito/membros/membroMantem/' . $id);
            } else {
                $config1['source_image'] = $this->upload->data('full_path');
                $config1['maintain_ratio'] = FALSE;
                $config1['width'] = 400;
                $config1['height'] = 450;
                $this->load->library('image_lib', $config1);
                $this->image_lib->resize();
                excluirImagem($membro['fotoAtual']);
                $membro['fotoPessoa'] = $path . '/' . $nomeImagem . $this->upload->data('file_ext');
            }
        }
    }

    private function validaCPF(&$membro) {
        $model = new PessoaModel();
        $indicador = $membro['id'] != '' ? $model->cpfsCadastrados($membro['cpf'], $membro['id']) :
                $model->countCpf($membro['cpf']);
        if ($membro['cpf'] != null && $membro['cpf'] != ''  
                && $indicador > 0) {
            error('ERRO', 'CPF já cadastrado');
            $this->session->set_flashdata('membros', $membro);
            $id = $membro['id'] != '' ? $membro['id'] : 0;
            redirect('restrito/membros/membroMantem/' . $id);
        }
    }

    public function membroAtivar() {
        $id = $this->input->post('id');
        $model = new PessoaModel();
        try {
            $model->ativarStatus($id);
            success('Sucesso', 'Registro ativado com Sucesso');
        } catch (Exception $e) {
            error('Error', 'Erro ao tentar ativar registro<br>'
                    . 'Tente novamente ou contate o administrador.');
        }
        redirect('restrito/membros/lista');
    }

    protected function getController() {
        return $this->router->class;
    }

}
