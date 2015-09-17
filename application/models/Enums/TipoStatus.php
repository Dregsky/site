<?php

namespace enums;
require_once APPPATH. 'models/EntitiesModels/StatusModel.php';
/**
 * Description of TipoStatus
 *
 * @author Rafael
 */
class TipoStatus extends Enum {
    
    const AGUARDANDO_LIBERACAO = 1;
    const LIBERADO = 2;
    const ATIVO = 3;
    const INATIVO = 4;
    const ENTRADA = 5;
    const SAIDA = 6;

    public function getReferencedModelEntity() {
        return \StatusModel::name;
    }

}
