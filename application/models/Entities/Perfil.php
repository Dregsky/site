<?php

namespace Entities;

/**
 * Description of Perfil
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_perfil")
 */
class Perfil {

    const name = "Entities\Perfil";

    /**
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_perfil", type="integer", nullable=false)
     */
    private $id;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=30, nullable=true)
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
