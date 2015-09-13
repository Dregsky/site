<?php

require_once LIBCOMPPATH . 'WebComponent.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Panel ColInteratorPanel
 * recebe 1 titu
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class ColInteratorPanel extends WebComponent {

    public function __construct($title = '', $rows = array(), $tipoTable = false, $styleTitle = '', $style1 = '', $style2 = '') {
        parent::__construct();
        if (count($rows) > 0) {
            $dados = $this->getStyle($tipoTable, $styleTitle, $style1, $style2);
            $dados['title'] = $title;
            $dados['rows'] = $rows;

            $html = $this->load->view('components/panel/colInterator_panel', $dados, true);
            $this->setComponent($html);
        }
    }

    public function testaInstancia($instancias = array()) {
        return $instancias;
    }

    public function getStyle($tipoTable, $styleTitle, $style1, $style2) {
        $dados['styleTitle'] = $styleTitle;
        $dados['style1'] = $style1;
        $dados['style2'] = $style2;
        if ($tipoTable) {
            if (empty($styleTitle)) {
                $dados['styleTitle'] = 'background:#999999; color: #ffffff';
            }
            if (empty($style1)) {
                $dados['style1'] = 'background: #dcdcdc';
            }
            if (empty($style2)) {
                $dados['style2'] = 'background: #cccccc';
            }
        }
        return $dados;
    }

}
