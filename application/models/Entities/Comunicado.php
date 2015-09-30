<?php

namespace Entities;

/**
 * Pessoa
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_comunicado")
 */
class Comunicado extends AbstractEntity {

    const name = "Entities\Comunicado";

    /**
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_comunicado", type="integer", nullable=false)
     */
    private $id;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=400, nullable=true)
     */
    private $descricao;

    /**
     *
     * @var text
     * 
     * @Column(type="text", nullable=true)
     */
    private $assunto;

    /**
     *
     * @var \DateTime
     * 
     * @Column(type="datetime", nullable=true)
     */
    private $dataCadastro;

    /**
     *
     * @var \DateTime
     * 
     * @Column(type="datetime", nullable=false)
     */
    private $dataSaiNovo;

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
     * @var Perfil
     * 
     * @ManyToOne(targetEntity="Perfil", fetch="EAGER")
     * @JoinColumn(name="cod_perfil", referencedColumnName="cod_perfil")
     */
    private $perfil;

    /**
     *
     * @var \DateTime
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
     * Getters and Setters
     */
    public function getId() {
        return $this->id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getAssunto() {
        return $this->assunto;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getDataSaiNovo() {
        return $this->dataSaiNovo;
    }

    public function getPessoaCadastro() {
        return $this->pessoaCadastro;
    }

    public function getPerfil() {
        return $this->perfil;
    }

    public function getDataExclusao() {
        return $this->dataExclusao;
    }

    public function getPessoaExclusao() {
        return $this->pessoaExclusao;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }

    public function setAssunto($assunto) {
        $this->assunto = $assunto;
        return $this;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
        return $this;
    }

    public function setDataSaiNovo($dataSaiNovo) {
        $this->dataSaiNovo = $dataSaiNovo;
        return $this;
    }

    public function setPessoaCadastro(Pessoa $pessoaCadastro) {
        $this->pessoaCadastro = $pessoaCadastro;
        return $this;
    }

    public function setPerfil(Perfil $perfil) {
        $this->perfil = $perfil;
        return $this;
    }

    public function setDataExclusao($dataExclusao) {
        $this->dataExclusao = $dataExclusao;
        return $this;
    }

    public function setPessoaExclusao(Pessoa $pessoaExclusao) {
        $this->pessoaExclusao = $pessoaExclusao;
        return $this;
    }

    function getStatus() {
        return $this->status;
    }

    function setStatus(Status $status) {
        $this->status = $status;
    }


}
