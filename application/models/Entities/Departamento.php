<?php

namespace Entities;

require_once APPPATH . 'models\Entities\AbstractEntity.php';

/**
 * Description of Departamento
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_departamento")
 */
class Departamento extends AbstractEntity {

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
     *
     * @var string
     * 
     * @Column(type="string", length=80, nullable=true)
     */
    private $nomeCompleto;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=20, nullable=true)
     */
    private $apelido;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=900, nullable=true)
     */
    private $agendaGoogle;

    /**
     * Getters and Setters
     */
    public function getId() {
        return $this->id;
    }

    public function getNomeDepartamento() {
        return $this->nomeDepartamento;
    }

    public function getNomeCompleto() {
        return $this->nomeCompleto;
    }

    public function getApelido() {
        return $this->apelido;
    }

    public function getAgendaGoogle() {
        return $this->agendaGoogle;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNomeDepartamento($nomeDepartamento) {
        $this->nomeDepartamento = $nomeDepartamento;
        return $this;
    }

    public function setNomeCompleto($nomeCompleto) {
        $this->nomeCompleto = $nomeCompleto;
        return $this;
    }

    public function setApelido($apelido) {
        $this->apelido = $apelido;
        return $this;
    }

    public function setAgendaGoogle($agendaGoogle) {
        $this->agendaGoogle = $agendaGoogle;
        return $this;
    }

}
