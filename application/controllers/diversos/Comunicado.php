<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Comunicado extends Diversos_Controller {

    /**
     * Método Construtor
     */
    public function Comunicado() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function getCustomPage() {
        /**
         * Includes de models
         */
        $this->load->model('EntitiesModels/ComunicadoModel');
        /**
         * Includes de components
         */
        $this->load->component('page/SimplePage');
        $this->load->component('panels/integrados/RowWrapper1Panel');
        /**
         * criação de panels
         */
        $id = $this->uri->segment(2);
        $this->verificaExistencia($id);
        $dados['panel1'] = $this->comunicadoPage($id);

        return $this->load->view('components/page/simple_page', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    public function comunicadoPage($id) {
        $model = new ComunicadoModel();
        $c = $model->retrieve($id);
        $this->verificaExistencia($c);
        $dados['comunicado'] = $c;
        
        $content = $this->load->view('diversos/comunicado_comp', $dados, true);
        $panel = new RowWrapper1Panel($content);
        $page = new SimplePage('Comunicado', $panel->getComponent());
        return $page->getComponent();
    }

    /**
     * Verifica se entidade igual a null
     * retorna página 404
     * @param type $entidade
     */
    private function verificaExistencia($entidade) {
        if ($entidade == null) {
            redirect('erro/page');
        }
    }

}
