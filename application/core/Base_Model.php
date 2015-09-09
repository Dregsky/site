<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
use \Doctrine\ORM\Query\AST\ASTException;

/**
 * Base_Model
 * @property \Doctrine\ORM\EntityManager $em Gerenciador de Entidade
 * @category Base_Model
 * @package  CodeIgniter
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Base_Model extends CI_Model {

    /**
     * Constructor of Base Controller
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * 
     * @param type $id
     */
    public function retrieve($entity, $id) {
        try {
            $result = $this->em->find('Entities\\' . $entity, $id);
            $this->em->flush();
        } catch (ASTException $e) {
            $e->getTrace();
        }
        return $result;
    }


}
