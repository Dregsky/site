<?php
require_once LIBCOMPPATH . 'WebComponent.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Panel YoutubeVideoPanel
 * recebe 1 componentes
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class YoutubeVideoPanel extends WebComponent {
    
    private $link = '';
    
    private $width = 425;
    
    private $height = 344;

    public function __construct($link = '', $width = '', $height= '') {
        parent::__construct();
        if (!empty($link)) {
            $dados = embedVideoYoutube($link);
            $dados['width'] = $this->setWidth($width);
            $dados['height'] = $this->setHeight($height);
            $html = $this->load->view('components/panel/youtubeVideo_panel', $dados, true);
            $this->setComponent($html);
        }
    }

    public function testaInstancia($instancias = array()) {
        return $instancias;
    }
    
    public function setWidth($width) {
        if(!empty($width)){
            return $width;
        }
        return $this->width;
    }

    public function setHeight($height) {
        if(!empty($height)){
            return $height;
        }
        return $this->height;
    }



}
