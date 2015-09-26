<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Use Entities\Pessoa as Pessoa;
Use enums\DepartamentoEnum;

/**
 * @property Doctrine $doctrine Biblioteca ORM
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class CVKIDS extends RestritoDepartamento_Controller {
    
    /**
     * Método Construtor
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * @property Pessoa $pessoa 
     */
    public function index() {
        
    }

    public function getDepartamentoOfPage() {
        $this->load->model('EntitiesModels/DepartamentoModel');
        return (new DepartamentoModel())->retrieve(DepartamentoEnum::CVKIDS);
    }

    protected function getController() {
        return $this->router->class;
    }

}
