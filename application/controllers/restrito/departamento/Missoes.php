<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Use Entities\Pessoa as Pessoa;
Use enums\DepartamentoEnum;

/**
 * @property Doctrine $doctrine Biblioteca ORM
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Missoes extends RestritoDepartamento_Controller {
    
    /**
     * Método Construtor
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * @property Diretoria $diretoria 
     */
    public function index() {
        
    }

    public function getDepartamentoOfPage() {
        $this->load->model('EntitiesModels/DepartamentoModel');
        return (new DepartamentoModel())->retrieve(DepartamentoEnum::MISSOES);
    }
    
    protected function getController() {
        return $this->router->class;
    }

}
