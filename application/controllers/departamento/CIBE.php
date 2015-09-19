<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Use Entities\Pessoa as Pessoa;
Use enums\DepartamentoEnum;

/**
 * @property Doctrine $doctrine Biblioteca ORM
 * @property home_model $homeModel Model
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class CIBE extends Departamento_Controller {

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

    protected function includeSlide() {
        $dados['banners'] = array(
            linkPath('#', 'cibe/CIBE.960x268.png')
        );
        return $this->load->view('components/slide_comp', $dados, true);
    }

    public function getDepartamento() {
        $this->load->model('EntitiesModels/DepartamentoModel');
        return (new DepartamentoModel())->retrieve(DepartamentoEnum::CIBE);
    }
    
    /*
     * @Override
     */
    protected function getCoordenadores() {
        return array(
            $this->getCoordenador('Ir. Nome', 'Cargo1'),
            $this->getCoordenador('Ir. Nome', 'Cargo1'),
            $this->getCoordenador('Ir. Nome', 'Cargo1'),
            $this->getCoordenador('Ir. Nome', 'Cargo1'),
            $this->getCoordenador('Ir. Nome', 'Cargo1'),
            $this->getCoordenador('Ir. Nome', 'Cargo1'),
            $this->getCoordenador('Ir. Nome', 'Cargo1'),
            $this->getCoordenador('Ir. Nome', 'Cargo1')
        );
    }

}
