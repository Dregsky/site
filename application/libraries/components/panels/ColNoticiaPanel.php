<?php
require_once LIBCOMPPATH . 'WebComponent.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Panel ColNoticiaPanel
 * recebe 1 array de :
 * @var Entities\Noticia
 * 
 * e um departamento
 * @var Entities\Departamento
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class ColNoticiaPanel extends WebComponent {

    public function __construct($departamento = '', $noticias = array()) {
        parent::__construct();
        if (!empty($departamento)) {
            $dados['noticias'] = $noticias;
            $dados['apelido'] = $departamento->getApelido();
            $dados['nomeCompleto'] = $departamento->getNomeCompleto();
            $html = $this->load->view('home/colNoticia_panel', $dados, true);
            $this->setComponent($html);
        }
    }

    public function testaInstancia($instancias = array()) {
        return $instancias;
    }

}
