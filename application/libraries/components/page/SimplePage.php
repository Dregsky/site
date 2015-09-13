<?php
require_once LIBCOMPPATH . 'WebComponent.php';
require_once LIBCOMPPATH . '/panels/RowPanel.php';
require_once LIBCOMPPATH . '/panels/TitleRowPanel.php';
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
class SimplePage extends WebComponent {

    /**
     * 
     * @param type $content html do conteudo, titulo
     * @return html do 
     * @var RowPanel contendo um 
     * @var Wrapper1Panel
     */
    public function __construct($title = '', $content = '') {
        parent::__construct();
        if (!empty($content)) {
            $title = new TitleRowPanel($title);
            if(!empty($title)){
                $content = $title->getComponent().$content;
            }
            $rowPanel = new RowPanel($content);
            $this->setComponent($rowPanel->getComponent());
        }
    }

    public function testaInstancia($instancias = array()) {
        return $instancias;
    }

}
