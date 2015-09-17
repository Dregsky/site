<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Departamento_Controller
 * @category Departamento_Controller
 * @package  CodeIgniter
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
abstract class Departamento_Controller extends Site_Controller {

    
    public function getMenu() {
        $dados['departamento'] = $this->getNameDepartamento();
        return $this->load->view('_inc/menuDepartamentos', $dados, true);
    }

    abstract function getNameDepartamento();
}
