<?php

include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\Escolaridade;


/**
 * Description of EscolaridadeModel
 * Model from:
 * @var Status
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class EscolaridadeModel extends Model {

    const name = 'EntitiesModels\EscolaridadeModel';

    /**
     * 
     * @return Escolaridade
     */
    public function getEntity() {
        return Escolaridade::name;
    }

    public function getTable() {
        return 'tbl_escolaridade';
    }

}
