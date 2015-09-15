<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuxComponet
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class AuxComponet {

    private $html = '';
    private $parentClass = '';
    private $parentId = '';
    
    public function __construct($html = '', $parentClass = '', $parentId = '') {
        $this->html = $html;
        $this->parentClass = $parentClass;
        $this->parentId = $parentId;
    }

    public function getHtml() {
        return $this->html;
    }

    public function getParentClass() {
        return $this->parentClass;
    }

    public function getParentId() {
        return $this->parentId;
    }

    public function setHtml($html) {
        $this->html = $html;
        return $this;
    }

    public function setParentClass($parentClass) {
        $this->parentClass = $parentClass;
        return $this;
    }

    public function setParentId($parentId) {
        $this->parentId = $parentId;
        return $this;
    }




}
