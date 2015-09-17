<?php

namespace Entities;
require_once APPPATH.'models\Entities\AbstractEntity.php';

/**
 * Pessoa
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_pessoa")
 */
class Pessoa extends AbstractEntity {

    const name = "Entities\Pessoa";

    /**
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_pessoa", type="integer", nullable=false)
     */
    private $id;

    /**
     *
     * @var Perfil
     * 
     * @ManyToOne(targetEntity="Perfil", fetch="EAGER")
     * @JoinColumn(name="cod_perfil", referencedColumnName="cod_perfil")
     */
    private $perfil;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=150, nullable=true)
     */
    private $nome;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=45, nullable=true)
     */
    private $login;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=80, nullable=true)
     */
    private $senha;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=100, nullable=true)
     */
    private $email;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=16, nullable=false)
     */
    private $telefone;

    /**
     *
     * @var \Datetime
     * 
     * @Column(type="datetime", nullable=true)
     */
    private $dataCadastro;

    /**
     *
     * @var \Datetime
     * 
     * @Column(type="datetime", nullable=true)
     */
    private $dataExclusao;

    /**
     *
     * @var date
     * 
     * @Column(type="date", nullable=true)
     */
    private $dataNascimento;

    /**
     *
     * @var Status
     * 
     * @ManyToOne(targetEntity="Status", fetch="EAGER")
     * @JoinColumn(name="cod_status", referencedColumnName="cod_status")
     */
    private $status;

    /**
     * @var integer
     * @Column(type="integer", nullable=true)
     */
    private $cartaoMembro;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=50, nullable=true)
     */
    private $fotoPessoa;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=11, nullable=false)
     */
    private $cpf;

    /**
     *
     * @var string
     * 
     * @Column(name="cidade_natal", type="string", length=100, nullable=false)
     */
    private $cidadeNatal;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=120, nullable=false)
     */
    private $rua;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=100, nullable=false)
     */
    private $bairro;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=100, nullable=false)
     */
    private $cidade;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=10, nullable=false)
     */
    private $rg;

    /**
     *
     * @var string
     * 
     * @Column(name="orgao_emissor", type="string", length=8, nullable=false)
     */
    private $orgaoEmissor;

    /**
     * @var date
     * 
     * @Column(name="data_emissao", type="date", nullable=false)
     */
    private $dataEmissao;

    /**
     *
     * @var FuncaoMinisterial
     * 
     * @ManyToOne(targetEntity="FuncaoMinisterial", fetch="EAGER")
     * @JoinColumn(name="cod_funcao_ministerial", referencedColumnName="cod_funcao_ministerial")
     */
    private $funcaoMinisterial;

    /**
     *
     * @var Profissao
     * 
     * @ManyToOne(targetEntity="Profissao", fetch="EAGER")
     * @JoinColumn(name="cod_profissao", referencedColumnName="cod_profissao")
     */
    private $profissao;

    /**
     *
     * @var Escolaridade
     * 
     * @ManyToOne(targetEntity="Escolaridade", fetch="EAGER")
     * @JoinColumn(name="cod_escolaridade", referencedColumnName="cod_escolaridade")
     */
    private $escolaridade;

    /**
     *
     * @var EstadoCivil
     * 
     * @ManyToOne(targetEntity="EstadoCivil", fetch="EAGER")
     * @JoinColumn(name="cod_estado_civil", referencedColumnName="cod_estado_civil")
     */
    private $estadoCivil;

    /**
     *
     * @var Departamento
     * 
     * @ManyToOne(targetEntity="Departamento", fetch="EAGER")
     * @JoinColumn(name="cod_departamento", referencedColumnName="cod_departamento")
     */
    private $departamento;

    /**
     *
     * @var date
     * 
     * @Column(name="data_chegada", type="date", nullable=false)
     */
    private $dataChegada;

    /**
     *
     * @var date
     * 
     * @Column(name="data_batismo_aguas", type="date", nullable=true)
     */
    private $dataBatismoAguas;

    /**
     *
     * @var date
     * 
     * @Column(name="data_batismo_espirito", type="date", nullable=true)
     */
    private $dataBatismoEspirito;

    /**
     *
     * @var string
     * 
     * @Column(name="nome_pai", type="string", length=100, nullable=false)
     */
    private $nomePai;

    /**
     *
     * @var string
     * 
     * @Column(name="nome_mae", type="string", length=100, nullable=false)
     */
    private $nomeMae;

    /**
     *
     * @var string
     * 
     * @Column(name="nome_conjuge", type="string", length=100, nullable=true)
     */
    private $nomeConjuge;

    /**
     *
     * @var date
     * 
     * @Column(name="data_casamento", type="date", nullable=true)
     */
    private $dataCasamento;

    /**
     *
     * @Column(name="qtd_filhos", type="integer", nullable=true)
     */
    private $qtdFilhos;

    /**
     * 
     * Getters and Setters
     */
    public function getId() {
        return $this->id;
    }

    public function getPerfil() {
        return $this->perfil;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getDataExclusao() {
        return $this->dataExclusao;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getCartaoMembro() {
        return $this->cartaoMembro;
    }

    public function getFotoPessoa() {
        return $this->fotoPessoa;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getCidadeNatal() {
        return $this->cidadeNatal;
    }

    public function getRua() {
        return $this->rua;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getRg() {
        return $this->rg;
    }

    public function getOrgaoEmissor() {
        return $this->orgaoEmissor;
    }

    public function getDataEmissao() {
        return $this->dataEmissao;
    }

    public function getFuncaoMinisterial() {
        return $this->funcaoMinisterial;
    }

    public function getProfissao() {
        return $this->profissao;
    }

    public function getEscolaridade() {
        return $this->escolaridade;
    }

    public function getEstadoCivil() {
        return $this->estadoCivil;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function getDataChegada() {
        return $this->dataChegada;
    }

    public function getDataBatismoAguas() {
        return $this->dataBatismoAguas;
    }

    public function getDataBatismoEspirito() {
        return $this->dataBatismoEspirito;
    }

    public function getNomePai() {
        return $this->nomePai;
    }

    public function getNomeMae() {
        return $this->nomeMae;
    }

    public function getNomeConjuge() {
        return $this->nomeConjuge;
    }

    public function getDataCasamento() {
        return $this->dataCasamento;
    }

    public function getQtdFilhos() {
        return $this->qtdFilhos;
    }

    public function setPerfil(Perfil $perfil) {
        $this->perfil = $perfil;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function setLogin($login) {
        $this->login = $login;
        return $this;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
        return $this;
    }

    public function setDataCadastro(\Datetime $dataCadastro) {
        $this->dataCadastro = $dataCadastro;
        return $this;
    }

    public function setDataExclusao(\Datetime $dataExclusao) {
        $this->dataExclusao = $dataExclusao;
        return $this;
    }

    public function setDataNascimento(\Datetime $dataNascimento) {
        $this->dataNascimento = $dataNascimento;
        return $this;
    }

    public function setStatus(Status $status) {
        $this->status = $status;
        return $this;
    }

    public function setCartaoMembro($cartaoMembro) {
        $this->cartaoMembro = $cartaoMembro;
        return $this;
    }

    public function setFotoPessoa($fotoPessoa) {
        $this->fotoPessoa = $fotoPessoa;
        return $this;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
        return $this;
    }

    public function setCidadeNatal($cidadeNatal) {
        $this->cidadeNatal = $cidadeNatal;
        return $this;
    }

    public function setRua($rua) {
        $this->rua = $rua;
        return $this;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
        return $this;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
        return $this;
    }

    public function setRg($rg) {
        $this->rg = $rg;
        return $this;
    }

    public function setOrgaoEmissor($orgaoEmissor) {
        $this->orgaoEmissor = $orgaoEmissor;
        return $this;
    }

    public function setDataEmissao($dataEmissao) {
        $this->dataEmissao = $dataEmissao;
        return $this;
    }

    public function setFuncaoMinisterial(FuncaoMinisterial $funcaoMinisterial) {
        $this->funcaoMinisterial = $funcaoMinisterial;
        return $this;
    }

    public function setProfissao(Profissao $profissao) {
        $this->profissao = $profissao;
        return $this;
    }

    public function setEscolaridade(Escolaridade $escolaridade) {
        $this->escolaridade = $escolaridade;
        return $this;
    }

    public function setEstadoCivil(EstadoCivil $estadoCivil) {
        $this->estadoCivil = $estadoCivil;
        return $this;
    }

    public function setDepartamento(Departamento $departamento) {
        $this->departamento = $departamento;
        return $this;
    }

    public function setDataChegada($dataChegada) {
        $this->dataChegada = $dataChegada;
        return $this;
    }

    public function setDataBatismoAguas($dataBatismoAguas) {
        $this->dataBatismoAguas = $dataBatismoAguas;
        return $this;
    }

    public function setDataBatismoEspirito($dataBatismoEspirito) {
        $this->dataBatismoEspirito = $dataBatismoEspirito;
        return $this;
    }

    public function setNomePai($nomePai) {
        $this->nomePai = $nomePai;
        return $this;
    }

    public function setNomeMae($nomeMae) {
        $this->nomeMae = $nomeMae;
        return $this;
    }

    public function setNomeConjuge($nomeConjuge) {
        $this->nomeConjuge = $nomeConjuge;
        return $this;
    }

    public function setDataCasamento($dataCasamento) {
        $this->dataCasamento = $dataCasamento;
        return $this;
    }

    public function setQtdFilho($qtdFilhos) {
        $this->qtdFilhos = $qtdFilhos;
        return $this;
    }

}
