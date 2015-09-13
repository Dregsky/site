<?php
require_once LIBCOMPPATH . 'WebComponent.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Panel RowPanel
 * recebe 1 titulo
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class TitleRowPanel extends WebComponent {

    public function __construct($title = '') {
        parent::__construct();
        if (!empty($title)) {
            $dados['title'] = $title;
            $html = $this->load->view('components/panel/titleRow_panel', $dados, true);
            $this->setComponent($html);
        }
    }

    public function testaInstancia($instancias = array()) {
        return $instancias;
    }

}
