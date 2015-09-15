<?php

namespace Entities;

/**
 * Description of FuncaoMinisterial
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_funcao_ministerial")
 */
class FuncaoMinisterial extends AbstractEntity {

    const name = "Entities\FuncaoMinisterial";

    /**
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_funcao_ministerial", type="integer", nullable=false)
     */
    private $id;

    /**
     *
     * @var string
     * @Column(type="string", length=80, nullable=false)
     */
    private $descricao;

    /**
     * @var boolean
     * @Column(type="boolean", nullable=false)
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

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
        return $this;
    }


}
