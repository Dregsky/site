<?php

namespace enums;

/**
 * Description of Departamento
 *
 * @author Rafael
 */
class DepartamentoEnum extends Enum {

    const JTV = 1;
    const ANG = 2;
    const CVKIDS = 3;
    const ORQUESTRA = 4;
    const CIBE = 5;
    const MGD = 6;
    const EBD = 7;
    const IGREJA = 8;
    const VAROES = 9;
    const SECRETARIA = 10;
    const DIRETORIA = 11;
    const MISSOES = 12;
    const DATASHOW = 13;
    const SOM = 14;
    const OBREIROS = 15;
    const FAMILIA = 16;

    public function getReferencedModelEntity() {
        return \DepartamentoModel::name;
    }

//put your code here
}
