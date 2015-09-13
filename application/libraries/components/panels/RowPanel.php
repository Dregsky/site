<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Panel RowPanel
 * recebe 1 componentes
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class RowPanel extends WebComponent {

    public function __construct($row = '') {
        parent::__construct();
        if (!empty($row)) {
            $dados['row'] = $row;
            $html = $this->load->view('components/panel/row_panel', $dados, true);
            $this->setComponent($html);
        }
    }

    public function testaInstancia($instancias = array()) {
        return $instancias;
    }

}
