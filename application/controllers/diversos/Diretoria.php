<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Use enums\DepartamentoEnum;
/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Diretoria extends Diversos_Controller {

    /**
     * Método Construtor
     */
    public function Diretoria() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function getCustomPage() {
        /**
         * Includes de models
         */
        $this->load->model('EntitiesModels/CoordenacaoDepartamentoModel');
        $this->load->model('EntitiesModels/DepartamentoModel');
        /**
         * Includes de components
         */
        $this->load->component('page/SimplePage');
        /**
         * criação de panels
         */
        $dados['panel1'] = $this->diretoriaPage();

        return $this->load->view('components/page/simple_page', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    public function diretoriaPage() {
        $model = new CoordenacaoDepartamentoModel();
        $dados['pessoas'] = $model->retrieveByDepartamentoAndYear(DepartamentoEnum::DIRETORIA);
        $content = $this->load->view('departamentos/coordenacao_comp', $dados, true);
        $page = new SimplePage('Diretoria', $content);
        return $page->getComponent();
    }

    public function getMenuSelecionado() {
        return 'diretoria';
    }

}
