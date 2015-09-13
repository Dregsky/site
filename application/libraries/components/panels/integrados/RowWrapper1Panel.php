<?php
require_once LIBCOMPPATH . 'WebComponent.php';
require_once LIBCOMPPATH . '/panels/Wrapper1Panel.php';
require_once LIBCOMPPATH . '/panels/RowPanel.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Panel RowWrapper1Panel
 * recebe 1 componentes
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class RowWrapper1Panel extends WebComponent {

    /**
     * 
     * @param type $content html do conteudo
     * @return html do 
     * @var RowPanel contendo um 
     * @var Wrapper1Panel
     */
    public function __construct($content = '') {
        parent::__construct();
        if (!empty($content)) {
            $wrapperPanel = new Wrapper1Panel($content);
            $rowPanel = new RowPanel($wrapperPanel->getComponent());
            $this->setComponent($rowPanel->getComponent());
        }
    }

    public function testaInstancia($instancias = array()) {
        return $instancias;
    }

}
