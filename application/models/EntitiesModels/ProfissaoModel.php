<?php

include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\Profissao;


/**
 * Description of EscolaridadeModel
 * Model from:
 * @var Status
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class ProfissaoModel extends Model {

    const name = 'EntitiesModels\ProfissaoModel';

    /**
     * 
     * @return Escolaridade
     */
    public function getEntity() {
        return Profissao::name;
    }

}
