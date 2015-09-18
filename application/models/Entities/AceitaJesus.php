<?php

namespace Entities;

/**
 * Pessoa
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_aceitajesus")
 */
class AceitaJesus extends AbstractEntity {

    const name = "Entities\AceitaJesus";

    /**
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_aceitajesus", type="integer", nullable=false)
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
     * @Column(type="string", length=80, nullable=true)
     */
    private $email;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=15, nullable=true)
     */
    private $telefone;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=100, nullable=true)
     */
    private $aceitaJesus;

    /**
     *
     * @var \DateTime
     * 
     * @Column(type="datetime", nullable=true)
     */
    private $dataAceitaJesus;

    /**
     *
     * @var \DateTime
     * 
     * @Column(type="datetime", nullable=true)
     */
    private $dataNascimento;

    /**
     *
     * @var integer
     * 
     * @Column(type="integer", length=1, nullable=true)
     */
    private $situacao;

    /**
     *
     * @var \DateTime
     * 
     * @Column(type="datetime", nullable=true)
     */
    private $dataExclusao;

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

    public function getEmail() {
        return $this->email;
    }

    public function getAceitaJesus() {
        return $this->aceitaJesus;
    }

    public function getDataAceitaJesus() {
        return $this->dataAceitaJesus;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function getDataExclusao() {
        return $this->dataExclusao;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setAceitaJesus($aceitaJesus) {
        $this->aceitaJesus = $aceitaJesus;
        return $this;
    }

    public function setDataAceitaJesus(\DateTime $dataAceitaJesus) {
        $this->dataAceitaJesus = $dataAceitaJesus;
        return $this;
    }

    public function setDataNascimento(\DateTime $dataNascimento) {
        $this->dataNascimento = $dataNascimento;
        return $this;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
        return $this;
    }

    public function setDataExclusao(\DateTime $dataExclusao) {
        $this->dataExclusao = $dataExclusao;
        return $this;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
        return $this;
    }

}
