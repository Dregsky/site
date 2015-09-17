<?php

namespace enums;

require_once APPPATH. 'models/EntitiesModels/NoticiaModel.php';

/**
 * Description of TipoNoticia
 *
 * @author Rafael
 */
class TipoNoticia extends Enum {

    const PRINCIPAL = 1;
    const SECUNDARIA = 2;
    const EVENTOS = 3;
    const CURSOS = 4;
    const MISSOES = 5;
    

    public function getReferencedModelEntity() {
        return \NoticiaModel::name;
    }

//put your code here
}
