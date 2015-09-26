<?php

namespace Entities;

/**
 * Album
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_slide")
 */
class Slide extends AbstractEntity {

    const name = "Entities\Slide";

    /**
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_slide", type="integer", nullable=false)
     */
    private $id;

    /**
     *
     * @var integer
     * 
     * @Column(type="integer", length=1, nullable=false)
     */
    private $tipoSlide;

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
     * @var boolean
     * 
     * @Column(type="boolean" , nullable=false)
     */
    private $exibirPrincipal;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=300, nullable=false)
     */
    private $link;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=100, nullable=false)
     */
    private $nome;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=300, nullable=false)
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
     * Getters and Setters
     */
    public function getId() {
        return $this->id;
    }

    public function getTipoSlide() {
        return $this->tipoSlide;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function getExibirPrincipal() {
        return $this->exibirPrincipal;
    }

    public function getLink() {
        return $this->link;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setTipoSlide($tipoSlide) {
        $this->tipoSlide = $tipoSlide;
        return $this;
    }

    public function setDepartamento(Departamento $departamento) {
        $this->departamento = $departamento;
        return $this;
    }

    public function setExibirPrincipal($exibirPrincipal) {
        $this->exibirPrincipal = $exibirPrincipal;
        return $this;
    }

    public function setLink($link) {
        $this->link = $link;
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

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

}
