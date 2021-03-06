<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Base_Controller
 * @category Base_Controller
 * @package  CodeIgniter
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Base_Controller extends CI_Controller {

    public $em;

    /**
     * Constructor of Base Controller
     */
    function __construct() {
        parent::__construct();
        $this->em = $this->doctrine->em;
        enumLoad();
    }

}
