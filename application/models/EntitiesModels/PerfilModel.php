<?php
include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\Perfil;
/**
 * Description of PerfilModel
 * Model from:
 * @var Perfil
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class PerfilModel extends Model {

    const name = 'EntitiesModels\\PerfilModel';
    
    /**
     * 
     * @return Perfil
     */
    public function getEntity() {
        return Perfil::name;
    }

    public function getTable() {
        return 'tbl_perfil';
    }

}
