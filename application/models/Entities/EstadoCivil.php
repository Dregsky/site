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
class EstadoCivil extends AbstractEntity {

    const name = "Entities\EstadoCivil";

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
     * Getters and Setters
     */
    public function getId() {
        return $this->id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }

}
