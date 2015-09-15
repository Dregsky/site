<?php

namespace Entities;

/**
 * Pessoa
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_mural")
 */
class Mural extends AbstractEntity {

    const name = "Entities\Mural";

    /**
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_mural", type="integer", nullable=false)
     */
    private $id;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=100, nullable=true)
     */
    private $nome;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=50, nullable=true)
     */
    private $assunto;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=80, nullable=true)
     */
    private $email;

    /**
     *
     * @var text
     * 
     * @Column(type="text", nullable=true)
     */
    private $mensagem;

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
     * @var \DateTime
     * 
     * @Column(type="datetime", nullable=true)
     */
    private $dataExclusao;

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
     * @var string
     * 
     * @Column(name="ip_usuario", type="string", length=30, nullable=false)
     */
    private $ipUsuario;

    /**
     * 
     * Getters and Setters
     */
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getAssunto() {
        return $this->assunto;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMensagem() {
        return $this->mensagem;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getDataSaiNovo() {
        return $this->dataSaiNovo;
    }

    public function getDataExclusao() {
        return $this->dataExclusao;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getIpUsuario() {
        return $this->ipUsuario;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function setAssunto($assunto) {
        $this->assunto = $assunto;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setMensagem(text $mensagem) {
        $this->mensagem = $mensagem;
        return $this;
    }

    public function setDataCadastro(\DateTime $dataCadastro) {
        $this->dataCadastro = $dataCadastro;
        return $this;
    }

    public function setDataSaiNovo(\DateTime $dataSaiNovo) {
        $this->dataSaiNovo = $dataSaiNovo;
        return $this;
    }

    public function setDataExclusao(\DateTime $dataExclusao) {
        $this->dataExclusao = $dataExclusao;
        return $this;
    }

    public function setStatus(Status $status) {
        $this->status = $status;
        return $this;
    }

    public function setIpUsuario($ipUsuario) {
        $this->ipUsuario = $ipUsuario;
        return $this;
    }

}
