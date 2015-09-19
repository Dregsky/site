<?php
require_once LIBCOMPPATH . 'WebComponent.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Panel TwitterButton
 * recebe 1 titulo
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class TwitterButton extends WebComponent {

    public function __construct($title = 's') {
        parent::__construct();
        if (!empty($title)) {
            $dados['title'] = $title;
            $html = $this->load->view('components/twitterButton', '', true);
            $this->setComponent($html);
        }
    }

    public function testaInstancia($instancias = array()) {
        return $instancias;
    }

}
