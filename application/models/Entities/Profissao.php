<?php

namespace Entities;

/**
 * Description of Profissao
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_profissao")
 */
class Profissao extends AbstractEntity {

    const name = "Entities\Profissao";

    /**
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_profissao", type="integer", nullable=false)
     */
    private $id;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=100, nullable=false)
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
