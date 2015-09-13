<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Site_Controller
 * @category Site_Controller
 * @package  CodeIgniter
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
abstract class Site_Controller extends CI_Controller {

    abstract function getMenu(); 

    abstract function getCustomPage();
    
    /**
     * Constructor of Base Controller
     */
    function __construct() {
        parent::__construct();
        $dados['menu'] = $this->getMenu();
        $dados['customPage'] = $this->getCustomPage();
        $this->load->view('template_site', $dados);
        
    }
    

}
