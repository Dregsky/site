<?php

namespace Entities;

/**
 * Description of EstadoCivil
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_estado_civil")
 */
class EstadoCivil {

    const name = "EstadoCivil";

    /**
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_estado_civil", type="integer", nullable=false)
     */
    private $id;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=50, nullable=false)
     */
    private $descricao;

    /**
     *
     * @Column(type="integer", nullable=false)
     */
    private $situacao;

    /**
     * Getters and Setters
     */
    public function getId() {
        return $this->id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function setId(integer $id) {
        $this->id = $id;
        return $this;
    }

    public function setDescricao(string $descricao) {
        $this->descricao = $descricao;
        return $this;
    }

    public function setSituacao(integer $situacao) {
        $this->situacao = $situacao;
        return $this;
    }

}
