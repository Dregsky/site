<?php

namespace Entities;

/**
 * Description of Escolaridade
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_escolaridade")
 */
class Escolaridade {

    const name = "Entities\Escolaridade";

    /**
     *
     * 
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_escolaridade", type="integer", nullable=false)
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

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }

}
