<?php

namespace enums;

/**
 * Description of ENUM
 *
 * @author Rafael
 */
abstract class Enum {
    
    /*
     * Método recebe a constante do enum a ser procurado
     * na primeira linha pega a referencia completa do model.
     * na segundo descobre a posicao da ultima barra, para separa
     * o modelName que contem o path do model
     * e o nome da classe do model que será instanciado;
     */
    public function retrieveReferencedEntity($tipo) {
        $modelName = $this->getReferencedModelEntity();
        $posBarra = strripos($modelName, '\\');
        $class_name = substr($modelName, ($posBarra + 1));
        modelLoad(array($modelName));
        $model = new $class_name;
        return $model->retrieve($tipo);
    }

    abstract function getReferencedModelEntity();
}
