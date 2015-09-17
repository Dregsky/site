<?php

defined('BASEPATH') OR exit('No direct script access allowed');
Use Entities\Pessoa as Pessoa;
/**
 * @property Doctrine $doctrine Biblioteca ORM
 * @property home_model $homeModel Model
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class ANG extends Departamento_Controller {

    const name = 'ANG';
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

    public function getCustomPage() {
        /**
         * Includes de models
         */
        $this->load->model('EntitiesModels/DepartamentoModel');
        /**
         * Includes de components
         */
        $this->load->component('panels/ColNoticiaPanel');
        /**
         * criação de panels
         */
         $dados['slide'] = $this->includeSlide();
          return $this->load->view('departamentos/home_page', $dados, true);
    }
    
    private function includeSlide() {
        $dados['banners'] = array(
             linkPath('#', 'ang/ANG.960x268.png')
        );
        return $this->load->view('components/slide_comp', $dados, true);
    }

    public function getNameDepartamento() {
        return $this::name;
    }

}
