<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * WebComponent
 * Component Base do qual se estenderão todos os outros
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
abstract class WebComponent {

    private $component;
    
    private $instanciasParams = array();

    public function __construct() {
        $this->load = & load_class('Loader', 'core');
        $this->load->initialize();
        $this->testaInstancia($this->getInstanciasParams());
    }
    abstract function testaInstancia($instancias = array());
    
    public function getComponent() {
        return $this->component;
    }

    public function setComponent($component) {
        $this->component = $component;
        return $this;
    }

    public function getInstanciasParams() {
        return $this->instanciasParams;
    }

    public function setInstanciasParams($instanciasParams) {
        $this->instanciasParams = $instanciasParams;
        return $this;
    }



}
