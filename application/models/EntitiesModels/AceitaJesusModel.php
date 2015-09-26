<?php

include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\AceitaJesus;


/**
 * Description of AceitaJesusModel
 * Model from:
 * @var AceitaJesus
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class AceitaJesusModel extends Model {

    const name = 'EntitiesModels\AceitaJesusModel';

    /**
     * 
     * @return AceitaJesus
     */
    public function getEntity() {
        return AceitaJesus::name;
    }
    
     public function getTable() {
        return 'tbl_aceitajesus';
    }

}
