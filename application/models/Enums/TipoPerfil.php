<?php

namespace enums;

require_once APPPATH. 'models/EntitiesModels/PerfilModel.php';

/**
 * Description of TipoPerfil
 *
 * @author Rafael
 */
class TipoPerfil extends Enum {

    const SUPER_ADMINISTRADOR = 1;
    const ADMINISTRADOR = 2;
    const JORNALISTA = 3;
    const SECRETARIO = 4;
    const TESOUREIRO = 5;
    const PASTOR = 6;
    const ANG = 7;
    const OBREIROS = 8;
    const MTV = 9;
    const INFANTIL = 10;
    const CIBE = 11;
    const ORQUESTRA = 12;
    const MISSOES = 13;
    const EBD = 14;
    const FAMILIA = 15;
    const MEMBRO = 16;
    const MGD = 17;

//put your code here
    
     public function getReferencedModelEntity() {
        return \PerfilModel::name;
    }
}
