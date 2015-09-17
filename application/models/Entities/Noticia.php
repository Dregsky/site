<?php

namespace Entities;

/**
 * Pessoa
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_noticia")
 */
class Noticia extends AbstractEntity {

    const name = "Entities\Noticia";

    /**
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_noticia", type="integer", nullable=false)
     */
    private $id;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=100, nullable=true)
     */
    private $titulo;

    /**
     *
     * @var text
     * 
     * @Column(type="text", nullable=true)
     */
    private $descricao;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=100, nullable=true)
     */
    private $subTitulo;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=100, nullable=true)
     */
    private $fonte;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=50, nullable=true)
     */
    private $fotoNoticia;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=50, nullable=true)
     */
    private $fotoNoticiaPequena;

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
    private $dataSaiNovo;

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
     * @var Pessoa
     * 
     * @ManyToOne(targetEntity="Pessoa", fetch="EAGER")
     * @JoinColumn(name="codPessoaCadastro", referencedColumnName="cod_pessoa")
     */
    private $pessoaCadastro;

    /**
     *
     * @var TipoNoticia
     * 
     * @ManyToOne(targetEntity="TipoNoticia", fetch="EAGER")
     * @JoinColumn(name="cod_tipo", referencedColumnName="cod_tipo")
     */
    private $tipo;

    /**
     *
     * @var \Datetime
     * 
     * @Column(type="datetime", nullable=true)
     */
    private $dataExclusao;

    /**
     *
     * @var Pessoa
     * 
     * @ManyToOne(targetEntity="Pessoa", fetch="EAGER")
     * @JoinColumn(name="codPessoaExclusao", referencedColumnName="cod_pessoa")
     */
    private $pessoaExclusao;

    /**
     *
     * @var Status
     * 
     * @ManyToOne(targetEntity="Status", fetch="EAGER")
     * @JoinColumn(name="cod_status", referencedColumnName="cod_status")
     */
    private $status;

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
     * @Column(type="string", length=50, nullable=true)
     */
    private $path;

    /**
     * 
     * Getters and Setters
     */
    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getSubTitulo() {
        return $this->subTitulo;
    }

    public function getFonte() {
        return $this->fonte;
    }

    public function getFotoNoticia() {
        return $this->fotoNoticia;
    }

    public function getFotoNoticiaPequena() {
        return $this->fotoNoticiaPequena;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getDataSaiNovo() {
        return $this->dataSaiNovo;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function getPessoaCadastro() {
        return $this->pessoaCadastro;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getDataExclusao() {
        return $this->dataExclusao;
    }

    public function getPessoaExclusao() {
        return $this->pessoaExclusao;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getPerfil() {
        return $this->perfil;
    }

    public function getPath() {
        return $this->path;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }

    public function setSubTitulo($subTitulo) {
        $this->subTitulo = $subTitulo;
        return $this;
    }

    public function setFonte($fonte) {
        $this->fonte = $fonte;
        return $this;
    }

    public function setFotoNoticia($fotoNoticia) {
        $this->fotoNoticia = $fotoNoticia;
        return $this;
    }

    public function setFotoNoticiaPequena($fotoNoticiaPequena) {
        $this->fotoNoticiaPequena = $fotoNoticiaPequena;
        return $this;
    }

    public function setDataCadastro(\Datetime $dataCadastro) {
        $this->dataCadastro = $dataCadastro;
        return $this;
    }

    public function setDataSaiNovo(\Datetime $dataSaiNovo) {
        $this->dataSaiNovo = $dataSaiNovo;
        return $this;
    }

    public function setDepartamento(Departamento $departamento) {
        $this->departamento = $departamento;
        return $this;
    }

    public function setPessoaCadastro(Pessoa $pessoaCadastro) {
        $this->pessoaCadastro = $pessoaCadastro;
        return $this;
    }

    public function setTipo(TipoNoticia $tipo) {
        $this->tipo = $tipo;
        return $this;
    }

    public function setDataExclusao(\Datetime $dataExclusao) {
        $this->dataExclusao = $dataExclusao;
        return $this;
    }

    public function setPessoaExclusao(Pessoa $pessoaExclusao) {
        $this->pessoaExclusao = $pessoaExclusao;
        return $this;
    }

    public function setStatus(Status $status) {
        $this->status = $status;
        return $this;
    }

    public function setPerfil(Perfil $perfil) {
        $this->perfil = $perfil;
        return $this;
    }

    public function setPath($path) {
        $this->path = $path;
        return $this;
    }

}
