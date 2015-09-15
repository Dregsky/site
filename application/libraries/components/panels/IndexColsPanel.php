<?php

require_once LIBCOMPPATH . 'WebComponent.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Panel IndexCols
 * recebe o html de 3 componentes
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class IndexColsPanel extends WebComponent {

    public function __construct($col1 = '', $col2 = '', $col3 = '') {
        parent::__construct();
        $this->setInstanciasParams(array($col1, $col2, $col3));
        $this->setClassDefaults($this->getInstanciasParams());
        $dados = $this->getDados($this->getInstanciasParams());
        if(count($dados)> 0){
            $html = $this->load->view('components/panel/indexCols_panel', $dados, true);
            $this->setComponent($html);
        }
    }

    public function testaInstancia($instancias = []) {
        foreach ($instancias as $i) {
            if (!($i instanceof AuxComponet)) {
                $error = var_dump($i) . ' NÃO é uma instância de AuxComponet';
                die($error);
            }
        }
    }

    private function setClassDefaults($instancias = []) {
        foreach ($instancias as $id => $i) {
            if (!empty($i) && empty($i->getParentClass())) {
                $i->setParentClass('index-col' . ($id + 1));
            }
        }
    }

    private function getDados($instancias = []) {
        $dados = array();
        foreach ($instancias as $id => $i) {
            if (!empty($i)) {
                $dados['col' . ($id + 1)] = $i->getHtml();
                $dados['class' . ($id + 1)] = $i->getParentClass();
                $dados['id' . ($id + 1)] = $i->getParentId();
            }
        }
        return $dados;
    }

}
