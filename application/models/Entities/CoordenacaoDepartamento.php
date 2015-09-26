<?php

namespace Entities;

/**
 * Pessoa
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_coordenacao_departamento")
 */
class CoordenacaoDepartamento extends AbstractEntity {

    const name = "Entities\CoordenacaoDepartamento";

    /**
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(type="integer", nullable=false)
     */
    private $id;

    /**
     *
     * @var Status
     * 
     * @ManyToOne(targetEntity="Pessoa", fetch="LAZY")
     * @JoinColumn(name="cod_pessoa", referencedColumnName="cod_pessoa", nullable=true)
     */
    private $pessoa;

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
     * @var string
     * 
     * @Column(type="string", length=50, nullable=false)
     */
    private $nomeCargo;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=50, nullable=false)
     */
    private $nomePessoa;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=600, nullable=true)
     */
    private $foto;

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
     * @var integer
     * 
     * @Column(type="integer", nullable=false)
     */
    private $ano;

    /**
     *
     * @var integer
     * 
     * @Column(type="integer",length=2, nullable=false)
     */
    private $posicao;

    /**
     * 
     * Getters and Setters
     */
    public function getId() {
        return $this->id;
    }

    public function getPessoa() {
        return $this->pessoa;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function getNomeCargo() {
        return $this->nomeCargo;
    }

    public function getNomePessoa() {
        return $this->nomePessoa;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getAno() {
        return $this->ano;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setPessoa(Status $pessoa) {
        $this->pessoa = $pessoa;
        return $this;
    }

    public function setDepartamento(Departamento $departamento) {
        $this->departamento = $departamento;
        return $this;
    }

    public function setNomeCargo($nomeCargo) {
        $this->nomeCargo = $nomeCargo;
        return $this;
    }

    public function setNomePessoa($nomePessoa) {
        $this->nomePessoa = $nomePessoa;
        return $this;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
        return $this;
    }

    public function setStatus(Status $status) {
        $this->status = $status;
        return $this;
    }

    public function setAno($ano) {
        $this->ano = $ano;
        return $this;
    }
    public function getPosicao() {
        return $this->posicao;
    }

    public function setPosicao($posicao) {
        $this->posicao = $posicao;
        return $this;
    }


}
