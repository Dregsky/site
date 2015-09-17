<?php

include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\FuncaoMinisterial;


/**
 * Description of EscolaridadeModel
 * Model from:
 * @var Status
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class FuncaoMinisterialModel extends Model {

    const name = 'EntitiesModels\FuncaoMinisterialModel';

    /**
     * 
     * @return Escolaridade
     */
    public function getEntity() {
        return FuncaoMinisterial::name;
    }

}
