<?php

namespace Entities;

/**
 * Pessoa
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_pessoa")
 */
class Pessoa {

    const name = "Pessoa";

    /**
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_pessoa", type="integer", unique=true, nullable=false)
     */
    private $id;

    /**
     *
     * @var Perfil
     * 
     * @ManyToOne(targetEntity="Perfil", fetch="EAGER")
     * @JoinColumn(name="cod_perfil")
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
     * @var datetime
     * 
     * @Column(type="datetime", nullable=true)
     */
    private $dataCadastro;

    /**
     *
     * @var datetime
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
     * @var Pessoa
     * 
     * @OneToOne(targetEntity="Pessoa", fetch="EAGER")
     * @JoinColumn(name="codPessoaExclusao", referencedColumnName="cod_pessoa")
     */
    private $pessoaExclusao;

    /**
     *
     * @var Status
     * 
     * @ManyToOne(targetEntity="Status", fetch="EAGER")
     * @JoinColumn(name="cod_status")
     */
    private $status;

    /**
     *
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
     *
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
     * @JoinColumn(name="cod_funcao_ministerial")
     */
    private $funcaoMinisterial;

    /**
     *
     * @var Profissao
     * 
     * @ManyToOne(targetEntity="Profissao", fetch="EAGER")
     * @JoinColumn(name="cod_profissao")
     */
    private $profissao;

    /**
     *
     * @var Escolariade
     * 
     * @ManyToOne(targetEntity="Escolaridade", fetch="EAGER")
     * @JoinColumn(name="cod_escolaridade")
     */
    private $escolaridade;

    /**
     *
     * @var EstadoCivil
     * 
     * @ManyToOne(targetEntity="EstadoCivil", fetch="EAGER")
     * @JoinColumn(name="cod_estado_civil")
     */
    private $estadoCivil;

    /**
     *
     * @var Departamento
     * 
     * @ManyToOne(targetEntity="Departamento", fetch="EAGER")
     * @JoinColumn(name="cod_departamento")
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
     * @Column(name="data_batismo_aguas", type="date", nullable=false)
     */
    private $dataBatismoAguas;

    /**
     *
     * @var date
     * 
     * @Column(name="data_batismo_espirito", type="date", nullable=false)
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
     * @Column(name="nome_conjugue", type="string", length=100, nullable=false)
     */
    private $nomeConjugue;

    /**
     *
     * @var date
     * 
     * @Column(name="data_casamento", type="date", nullable=false)
     */
    private $dataCasamento;

    /**
     *
     * @var integer
     * @Column(name="qtd_filhos", type="integer", nullable=true)
     *      
     */
    private $qtdFilho;

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

    public function getPessoaExclusao() {
        return $this->pessoaExclusao;
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

    public function getNomeConjugue() {
        return $this->nomeConjugue;
    }

    public function getDataCasamento() {
        return $this->dataCasamento;
    }

    public function getQtdFilho() {
        return $this->qtdFilho;
    }

    public function setPerfil(Perfil $perfil) {
        $this->perfil = $perfil;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setDataCadastro(datetime $dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function setDataExclusao(datetime $dataExclusao) {
        $this->dataExclusao = $dataExclusao;
    }

    public function setDataNascimento(date $dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function setPessoaExclusao(Pessoa $pessoaExclusao) {
        $this->pessoaExclusao = $pessoaExclusao;
    }

    public function setStatus(Status $status) {
        $this->status = $status;
    }

    public function setCartaoMembro($cartaoMembro) {
        $this->cartaoMembro = $cartaoMembro;
    }

    public function setFotoPessoa($fotoPessoa) {
        $this->fotoPessoa = $fotoPessoa;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setCidadeNatal($cidadeNatal) {
        $this->cidadeNatal = $cidadeNatal;
    }

    public function setRua($rua) {
        $this->rua = $rua;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function setOrgaoEmissor($orgaoEmissor) {
        $this->orgaoEmissor = $orgaoEmissor;
    }

    public function setDataEmissao(date $dataEmissao) {
        $this->dataEmissao = $dataEmissao;
    }

    public function setFuncaoMinisterial(FuncaoMinisterial $funcaoMinisterial) {
        $this->funcaoMinisterial = $funcaoMinisterial;
    }

    public function setProfissao(Profissao $profissao) {
        $this->profissao = $profissao;
    }

    public function setEscolaridade(Escolariade $escolaridade) {
        $this->escolaridade = $escolaridade;
    }

    public function setEstadoCivil(EstadoCivil $estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }

    public function setDepartamento(Departamento $departamento) {
        $this->departamento = $departamento;
    }

    public function setDataChegada(date $dataChegada) {
        $this->dataChegada = $dataChegada;
    }

    public function setDataBatismoAguas(date $dataBatismoAguas) {
        $this->dataBatismoAguas = $dataBatismoAguas;
    }

    public function setDataBatismoEspirito(date $dataBatismoEspirito) {
        $this->dataBatismoEspirito = $dataBatismoEspirito;
    }

    public function setNomePai($nomePai) {
        $this->nomePai = $nomePai;
    }

    public function setNomeMae($nomeMae) {
        $this->nomeMae = $nomeMae;
    }

    public function setNomeConjugue($nomeConjugue) {
        $this->nomeConjugue = $nomeConjugue;
    }

    public function setDataCasamento(date $dataCasamento) {
        $this->dataCasamento = $dataCasamento;
    }

    public function setQtdFilho($qtdFilho) {
        $this->qtdFilho = $qtdFilho;
    }

}
