<?php

namespace Entities;

/**
 * Description of Departamento
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_departamento")
 */
class Departamento {

    const name = "Entities\Departamento";

    /**
     *
     * 
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_departamento", type="integer", nullable=false)
     */
    private $id;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=50, nullable=true)
     */
    private $nomeDepartamento;

    /**
     * Getters and Setters
     */
    public function getId() {
        return $this->id;
    }

    public function getNomeDepartamento() {
        return $this->nomeDepartamento;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNomeDepartamento($nomeDepartamento) {
        $this->nomeDepartamento = $nomeDepartamento;
        return $this;
    }


}
