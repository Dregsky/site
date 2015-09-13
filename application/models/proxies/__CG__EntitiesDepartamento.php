<?php

namespace Proxies\__CG__\Entities;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Departamento extends \Entities\Departamento implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function getNomeDepartamento()
    {
        $this->__load();
        return parent::getNomeDepartamento();
    }

    public function getNomeCompleto()
    {
        $this->__load();
        return parent::getNomeCompleto();
    }

    public function getApelido()
    {
        $this->__load();
        return parent::getApelido();
    }

    public function setId($id)
    {
        $this->__load();
        return parent::setId($id);
    }

    public function setNomeDepartamento($nomeDepartamento)
    {
        $this->__load();
        return parent::setNomeDepartamento($nomeDepartamento);
    }

    public function setNomeCompleto($nomeCompleto)
    {
        $this->__load();
        return parent::setNomeCompleto($nomeCompleto);
    }

    public function setApelido($apelido)
    {
        $this->__load();
        return parent::setApelido($apelido);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'nomeDepartamento', 'nomeCompleto', 'apelido');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}