<?php

namespace Entities;

abstract class AbstractEntity {

    public function __set($property, $value) {
        $this->set($property, $value);
    }

    public function __call($method, $value) {
        return $this->get($method);
    }

    protected function set($property, $value) {
        $methodName = "set" . ucfirst($property);
        if (method_exists($this, $methodName)) {
            call_user_func_array(array($this, $methodName), array($value));
        } else if (property_exists($this, $property)) {
            $this->{$property} = $value;
        } else {
            throw new InvalidArgumentException("Property {$property} not exists!");
        }
    }

    protected function get($method) {
        $property = lcfirst(substr($method, 3));
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), array());
        } else if (property_exists($this, $property)) {
            return $this->{$property};
        } else {
            throw new InvalidArgumentException("Property {$property} not exists!");
        }
    }

    public function setAll(Array $data) {
        foreach ($data as $k => $v) {
            $this->set($k, $v);
        }
        return $this;
    }

    public function toArray() {
        $array = array();

        foreach ($this as $k => &$v) {
            var_dump($k);
            $array[$k] = $v;
        }

        return $array;
    }

}
