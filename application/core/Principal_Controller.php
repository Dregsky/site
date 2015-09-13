<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Principal_Controller
 * @category Principal_Controller
 * @package  CodeIgniter
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
abstract class Principal_Controller extends Site_Controller {

    public function getMenu() {
        return $this->load->view('_inc/menuPrincipal', '', true);
    }

}
