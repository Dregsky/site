<?php

namespace Entities;

/**
 * Pessoa
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_dirigentes")
 */
class Dirigente extends AbstractEntity {

    const name = "Entities\Dirigente";

    /**
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_dirigente", type="integer", nullable=false)
     */
    private $id;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=50, nullable=false)
     */
    private $nomeDirigente;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=50, nullable=false)
     */
    private $periodoDirigido;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=600, nullable=true)
     */
    private $foto;

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
    function getId() {
        return $this->id;
    }

    function getNomeDirigente() {
        return $this->nomeDirigente;
    }

    function getPeriodoDirigido() {
        return $this->periodoDirigido;
    }

    function getFoto() {
        return $this->foto;
    }
    
    function getPosicao() {
        return $this->posicao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNomeDirigente($nomeDirigente) {
        $this->nomeDirigente = $nomeDirigente;
    }

    function setPeriodoDirigido($periodoDirigido) {
        $this->periodoDirigido = $periodoDirigido;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setPosicao($posicao) {
        $this->posicao = $posicao;
    }

}
