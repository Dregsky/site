<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Agenda extends Principal_Controller {

    /**
     * Método Construtor
     */
    public function Agenda() {
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

        return $this->load->view('simple_page', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    private function includePanel1() {
        $row1 = $this->row1();
        $row2 = $this->row2();
        $page = new SimplePage('Agenda 2015', $row1.$row2);
        return $page->getComponent();
        
    }

    public function row1() {
        $array1 = $this->janeiro();
        $array2 = $this->fevereiro();
        $array3 = $this->marco();
        $colInterator1 = new ColInteratorPanel('Janeiro', $array1);
        $colInterator2 = new ColInteratorPanel('Fevereiro', $array2);
        $colInterator3 = new ColInteratorPanel('Março - Mês de Oração', $array3);

        $col1 = new AuxComponet($colInterator1->getComponent());
        $col2 = new AuxComponet($colInterator2->getComponent());
        $col3 = new AuxComponet($colInterator3->getComponent());
        $indexColsPanel = new IndexColsPanel($col1, $col2, $col3);
        return $indexColsPanel->getComponent();
    }

    public function janeiro() {
        return array(
            '06 - Culto de Primícias',
            '12 - Encontro JTV',
            '12 - Pré CONCAD',
            '13 - Cruzada Evangelística (Torre de TV)',
            '13 - Reunião de Obreiros',
            '13 - Casamento do Neemias e Priscila',
            '20 - Culto dirigido pelos Adolescentes',
            '26 - 1º Desperta Jovem 2013',
            '27 - Culto Evangelístico',
        );
    }

    public function fevereiro() {
        return array(
            '06 - Culto de Primícias',
            '12 - Encontro JTV',
            '12 - Pré CONCAD',
            '13 - Cruzada Evangelística (Torre de TV)',
            '13 - Reunião de Obreiros',
            '13 - Casamento do Neemias e Priscila',
            '20 - Culto dirigido pelos Adolescentes',
            '26 - 1º Desperta Jovem 2013',
            '27 - Culto Evangelístico',
        );
    }

    public function marco() {
        return array(
            '06 - Culto de Primícias',
            '12 - Encontro JTV',
            '12 - Pré CONCAD',
            '13 - Cruzada Evangelística (Torre de TV)',
            '13 - Reunião de Obreiros',
            '13 - Casamento do Neemias e Priscila',
            '20 - Culto dirigido pelos Adolescentes',
            '26 - 1º Desperta Jovem 2013',
            '27 - Culto Evangelístico',
        );
    }
    
    public function row2() {
        $array1 = $this->abril();
        $array2 = $this->maio();
        $array3 = $this->junho();
        $colInterator1 = new ColInteratorPanel('Abril', $array1);
        $colInterator2 = new ColInteratorPanel('Maio', $array2);
        $colInterator3 = new ColInteratorPanel('Junho', $array3);

        $col1 = new AuxComponet($colInterator1->getComponent());
        $col2 = new AuxComponet($colInterator2->getComponent());
        $col3 = new AuxComponet($colInterator3->getComponent());
        $indexColsPanel = new IndexColsPanel($col1, $col2, $col3);
        return $indexColsPanel->getComponent();
    }

    public function abril() {
        return array(
            '06 - Culto de Primícias',
            '12 - Encontro JTV',
            '12 - Pré CONCAD',
            '13 - Cruzada Evangelística (Torre de TV)',
            '13 - Reunião de Obreiros',
            '13 - Casamento do Neemias e Priscila',
            '20 - Culto dirigido pelos Adolescentes',
            '26 - 1º Desperta Jovem 2013',
            '27 - Culto Evangelístico',
        );
    }

    public function maio() {
        return array(
            '06 - Culto de Primícias',
            '12 - Encontro JTV',
            '12 - Pré CONCAD',
            '13 - Cruzada Evangelística (Torre de TV)',
            '13 - Reunião de Obreiros',
            '13 - Casamento do Neemias e Priscila',
            '20 - Culto dirigido pelos Adolescentes',
            '26 - 1º Desperta Jovem 2013',
            '27 - Culto Evangelístico',
        );
    }

    public function junho() {
        return array(
            '06 - Culto de Primícias',
            '12 - Encontro JTV',
            '12 - Pré CONCAD',
            '13 - Cruzada Evangelística (Torre de TV)',
            '13 - Reunião de Obreiros',
            '13 - Casamento do Neemias e Priscila',
            '20 - Culto dirigido pelos Adolescentes',
            '26 - 1º Desperta Jovem 2013',
            '27 - Culto Evangelístico',
        );
    }


}
