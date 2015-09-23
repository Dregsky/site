<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Restrito_Controller
 * @category RestritoDepartamento_Controller
 * @package  CodeIgniter
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
abstract class RestritoDepartamento_Controller extends Restrito_Controller {

    public $menuAtivoNeto = '';

    /**
     * Constructor of Base Controller
     */
    function __construct() {
        parent::__construct();
    }

    public function setMenuAtivoNeto($menuAtivoNeto) {
        $this->menuAtivoNeto = $menuAtivoNeto;
        return $this;
    }

}
