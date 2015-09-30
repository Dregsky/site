<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Cultos extends Diversos_Controller {

    /**
     * Método Construtor
     */
    public function Cultos() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function getCustomPage() {
        /**
         * Includes de models
         */
        /**
         * Includes de components
         */
        $this->load->component('AuxComponet');
        $this->load->component('panels/IndexColsPanel');
        $this->load->component('panels/RowPanel');
        $this->load->component('panels/ColInteratorPanel');
        $this->load->component('page/SimplePage');
        /**
         * criação de panels
         */
        $dados['panel1'] = $this->includePanel1();

        return $this->load->view('components/page/simple_page', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    private function includePanel1() {
        $row1 = $this->row1();
        $page = new SimplePage('Cultos', $row1);
        return $page->getComponent();
    }

    public function row1() {
        $array1 = $this->dia();
        $array2 = $this->horario();
        $array3 = $this->culto();
        $colInterator1 = new ColInteratorPanel('Dia', $array1, true);
        $colInterator2 = new ColInteratorPanel('Horário', $array2, true);
        $colInterator3 = new ColInteratorPanel('Culto', $array3, true);

        $col1 = new AuxComponet($colInterator1->getComponent());
        $col2 = new AuxComponet($colInterator2->getComponent());
        $col3 = new AuxComponet($colInterator3->getComponent());
        $indexColsPanel = new IndexColsPanel($col1, $col2, $col3);
        return $indexColsPanel->getComponent();
    }

    public function dia() {
        return array(
            'Domingo',
            'Domingo',
            'Segunda-Feira',
            'Segunda-Feira',
            'Terça-Feira',
            'Terça-Feira',
            'Quarta-Feira',
            'Quarta-Feira',
            'Quinta-Feira',
            'Quinta-Feira',
            'Sexta-Feira',
            'Sábado'
        );
    }

    public function horario() {
        return array(
            '09:00',
            '18:00',
            '20:00',
            '21:00',
            '21:00',
            '19:30',
            '08:00',
            '20:00',
            '15:00',
            '21:00',
            '20:00',
            '08:00',
        );
    }

    public function culto() {
        return array(
            'Escola Bíblica Dominical',
            'Culto Evangelístico',
            'Culto nos Lares',
            'Oração',
            'Oração',
            'Culto de Ensino na Catedral',
            'Consagração',
            'Ensino da Palavra',
            'Tarde das Causas Impossíveis',
            'Oração',
            'Sexta da Vitória',
            'Consagração'
        );
    }

    public function getMenuSelecionado() {
        return 'cultos';
    }

}
