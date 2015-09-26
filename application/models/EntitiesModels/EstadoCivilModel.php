<?php

include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\EstadoCivil;


/**
 * Description of EscolaridadeModel
 * Model from:
 * @var Status
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class EstadoCivilModel extends Model {

    const name = 'EntitiesModels\EstadoCivilModel';

    /**
     * 
     * @return Escolaridade
     */
    public function getEntity() {
        return EstadoCivil::name;
    }
    
    public function getTable() {
        return 'tbl_estado_civil';
    }

}
