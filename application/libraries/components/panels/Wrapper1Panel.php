<?php
require_once LIBCOMPPATH . 'WebComponent.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Panel Wrapper1Panel
 * recebe 1 componentes
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Wrapper1Panel extends WebComponent {

    public function __construct($content = '') {
        parent::__construct();
        if (!empty($content)) {
            $dados['content'] = $content;
            $html = $this->load->view('components/panel/wrapper1_panel', $dados, true);
            $this->setComponent($html);
        }
    }

    public function testaInstancia($instancias = array()) {
        return $instancias;
    }

}
