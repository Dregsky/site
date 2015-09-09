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
class FuncaoMinisterial {

    const name = "FuncaoMinisterial";

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
     * 
     * @Column(type="string", length=80, nullable=false)
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
