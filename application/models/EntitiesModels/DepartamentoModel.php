<?php

include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\Departamento;

/**
 * Description of DepartamentoModel
 * Model from:
 * @var Comunicado
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class DepartamentoModel extends Model {
    
        const name = 'EntitiesModels\DepartamentoModel';

    /**
     * 
     * @return Departamento
     */
    public function getEntity() {
        return Departamento::name;
    }

}
