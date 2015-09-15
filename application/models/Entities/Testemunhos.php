<?php

namespace Entities;

/**
 * Pessoa
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_testemunho")
 */
class Testemunhos extends AbstractEntity {

    const name = "Entities\Testemunhos";

    /**
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_testemunho", type="integer", nullable=false)
     */
    private $id;

    /**
     *
     * @var string
     * 
     * @Column(name="nome_pessoa", type="string", length=50, nullable=true)
     */
    private $nomePessoa;

    /**
     *
     * @var string
     * 
     * @Column(name="nome_testemunho", type="string", length=50, nullable=true)
     */
    private $nomeTestemunho;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=2000, nullable=true)
     */
    private $descricao;

    /**
     *
     * @var \DateTime
     * 
     * @Column(type="datetime", nullable=true)
     */
    private $dataCadastro;

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

    public function getNomePessoa() {
        return $this->nomePessoa;
    }

    public function getNomeTestemunho() {
        return $this->nomeTestemunho;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getDataExclusao() {
        return $this->dataExclusao;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNomePessoa($nomePessoa) {
        $this->nomePessoa = $nomePessoa;
        return $this;
    }

    public function setNomeTestemunho($nomeTestemunho) {
        $this->nomeTestemunho = $nomeTestemunho;
        return $this;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
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

    public function setStatus(Status $status) {
        $this->status = $status;
        return $this;
    }

}
