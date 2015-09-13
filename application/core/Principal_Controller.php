<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Base_Departamento
 * @category Base_Departamento
 * @package  CodeIgniter
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Departamento_Controller extends CI_Controller {

 
    /**
     * Constructor of Base Controller
     */
    function __construct() {
        parent::__construct();
        enumLoad();
        entitiesLoadAll();
    }

}
