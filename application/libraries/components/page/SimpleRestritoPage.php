<?php
require_once LIBCOMPPATH . 'WebComponent.php';
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
class SimpleRestritoPage extends WebComponent {

    /**
     * 
     * @param type $content html do conteudo, titulo, e breadcrumbs
     * @return html do 
     * @var RowPanel contendo um 
     * @var Wrapper1Panel
     */
    public function __construct($title = '', $content = '', $breadcrumbs = array()) {
        parent::__construct();
        if (!empty($content)) {
            $dados['title'] = $title;
            $dados['content'] = $content;
            $dados['breadcrumbs'] = $breadcrumbs;
            $page = $this->load->view('components/page/simpleRestrito_page', $dados, true);
            $this->setComponent($page);
        }
    }

    public function testaInstancia($instancias = array()) {
        return $instancias;
    }

}
