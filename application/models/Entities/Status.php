<?php

namespace Entities;

/**
 * Description of Status
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_status")
 */
class Status {

    const name = "Entities\Status";

    /**
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_status", type="integer", nullable=false)
     */
    private $id;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=40, nullable=true)
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
