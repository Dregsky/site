<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Model
 * @property \Doctrine\ORM\EntityManager $em Gerenciador de Entidade
 * @category Model
 * @package  CodeIgniter
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
abstract class Model extends CI_Model {

    /**
     * Constructor of  Model
     */
    function __construct() {
        parent::__construct();
        $this->em = $this->doctrine->em;
    }

    /**
     * 
     * @param String $id (Nome da entidade), Integer $id (id da entidade)
     * @return Object $result
     */
    public function retrieve($id) {
        try {
            $result = $this->em->find($this->getEntity(), $id);
            return $result;
        } catch (Exception $e) {
            echo 'Exceção capturada: ', $e->getTraceAsString();
        }
    }

    /**
     * 
     * @param String $entity (Nome da entidade) 
     * @return Array<Object> $results
     */
    public function retrieveAll() {
        try {
            $repository = $this->em->getRepository($this->getEntity());
            $result = $repository->findAll();
            return $result;
        } catch (Exception $e) {
            echo 'Exceção capturada: ', $e->getTraceAsString();
        }
    }

    /**
     * 
     * @param Object $entity (entidade a ser persistidada) 
     */
    public function saveOrUpdate($entity) {
        try {
            $this->em->persist($entity);
            $this->em->flush();
        } catch (Exception $exc) {
            throw $exc;
            
        }
    }

    /**
     * 
     * @param Object $entity (a ser realizada o merge) 
     * @return Object Após o Merge
     */
    public function merge($entity) {
        try {
            return $this->em->merge($entity);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * 
     * @param Object $entity (entidade a ser removida) 
     */
    public function delete($entity) {
        try {
            $this->em->remove($entity);
            $this->em->flush();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
   abstract function getEntity();

}
