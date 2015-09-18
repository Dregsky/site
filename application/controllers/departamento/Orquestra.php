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
class Orquestra extends Departamento_Controller {

    const name = 'Orquestra';

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
            linkPath('#', 'orquestra/Orquestra.960x268.png')
        );
        return $this->load->view('components/slide_comp', $dados, true);
    }

   public function getDepartamento() {
        $this->load->model('EntitiesModels/DepartamentoModel');
        return (new DepartamentoModel())->retrieve(DepartamentoEnum::ORQUESTRA);
    }

}
