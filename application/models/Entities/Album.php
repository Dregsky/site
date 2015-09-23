<?php

namespace Entities;

/**
 * Album
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_album")
 */
class Album extends AbstractEntity {

    const name = "Entities\Album";

    /**
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_album", type="integer", nullable=false)
     */
    private $id;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=80, nullable=false)
     */
    private $nomeAlbum;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=80, nullable=false)
     */
    private $nomeEvento;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=80, nullable=true)
     */
    private $diretorio;

    /**
     *
     * @var string
     * 
     * @Column(name="link_flickr", type="string", length=600, nullable=true)
     */
    private $flickr;

    /**
     *
     * @var integer
     * 
     * @Column(type="integer", length=4, nullable=false)
     */
    private $anoAlbum;

    /**
     *
     * @var \DateTime
     * 
     * @Column(type="date", nullable=false)
     */
    private $dataCadastro;

    /**
     *
     * @var \DateTime
     * 
     * @Column(type="date", nullable=true)
     */
    private $dataExclusao;

    /**
     *
     * @var integer
     * 
     * @Column(type="integer", length=3, nullable=false)
     */
    private $quantidadeFotos;

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
     * @var Pessoa
     * 
     * @ManyToOne(targetEntity="Pessoa", fetch="EAGER")
     * @JoinColumn(name="codPessoaCadastro", referencedColumnName="cod_pessoa")
     */
    private $pessoaCadastro;

    /**
     *
     * @var Pessoa
     * 
     * @ManyToOne(targetEntity="Pessoa", fetch="LAZY")
     * @JoinColumn(name="codPessoaExclusao", referencedColumnName="cod_pessoa")
     */
    private $pessoaExclusao;

    /**
     *
     * @var Departamento
     * 
     * @ManyToOne(targetEntity="Departamento", fetch="EAGER")
     * @JoinColumn(name="codDepartamento", referencedColumnName="cod_departamento")
     */
    private $departamento;

    /**
     *
     * @var boolean
     * 
     * @Column(type="boolean" , nullable=false)
     */
    private $exibirPrincipal;

    /**
     * 
     * Getters and Setters
     */
    public function getId() {
        return $this->id;
    }

    public function getNomeAlbum() {
        return $this->nomeAlbum;
    }

    public function getNomeEvento() {
        return $this->nomeEvento;
    }

    public function getDiretorio() {
        return $this->diretorio;
    }

    public function getFlickr() {
        return $this->flickr;
    }

    public function getAnoAlbum() {
        return $this->anoAlbum;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getDataExclusao() {
        return $this->dataExclusao;
    }

    public function getQuantidadeFotos() {
        return $this->quantidadeFotos;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getPessoaCadastro() {
        return $this->pessoaCadastro;
    }

    public function getPessoaExclusao() {
        return $this->pessoaExclusao;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNomeAlbum($nomeAlbum) {
        $this->nomeAlbum = $nomeAlbum;
        return $this;
    }

    public function setNomeEvento($nomeEvento) {
        $this->nomeEvento = $nomeEvento;
        return $this;
    }

    public function setDiretorio($diretorio) {
        $this->diretorio = $diretorio;
        return $this;
    }

    public function setFlickr($flickr) {
        $this->flickr = $flickr;
        return $this;
    }

    public function setAnoAlbum($anoAlbum) {
        $this->anoAlbum = $anoAlbum;
        return $this;
    }

    public function setDataCadastro(\DateTime $dataCadastro) {
        $this->dataCadastro = $dataCadastro;
        return $this;
    }

    public function setDataExclusao(\DateTime $dataExclusao) {
        $this->dataExclusao = $dataExclusao;
        return $this;
    }

    public function setQuantidadeFotos($quantidadeFotos) {
        $this->quantidadeFotos = $quantidadeFotos;
        return $this;
    }

    public function setStatus(Status $status) {
        $this->status = $status;
        return $this;
    }

    public function setPessoaCadastro(Pessoa $pessoaCadastro) {
        $this->pessoaCadastro = $pessoaCadastro;
        return $this;
    }

    public function setPessoaExclusao(Pessoa $pessoaExclusao) {
        $this->pessoaExclusao = $pessoaExclusao;
        return $this;
    }

    public function setDepartamento(Departamento $departamento) {
        $this->departamento = $departamento;
        return $this;
    }

    public function getExibirPrincipal() {
        return $this->exibirPrincipal;
    }

    public function setExibirPrincipal($exibirPrincipal) {
        $this->exibirPrincipal = $exibirPrincipal;
        return $this;
    }

}
