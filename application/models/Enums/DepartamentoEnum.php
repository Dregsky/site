<?php

namespace enums;

require_once APPPATH. 'models/EntitiesModels/DepartamentoModel.php';

/**
 * Description of Departamento
 *
 * @author Rafael
 */
class DepartamentoEnum extends Enum {

    const MOCIDADE = 1;
    const ADOLESCENTES = 2;
    const INFANTIL = 3;
    const ORQUESTRA = 4;
    const CIBE = 5;
    const LOUVOR = 6;
    const EBD = 7;
    const IGREJA = 8;
    const VAROES = 9;
    const SECRETARIA = 10;
    const DIRETORIA = 11;
    const EPOMENOS = 12;
    const DATASHOW = 13;
    const SOM = 14;
    const OBREIROS = 15;

    public function getReferencedModelEntity() {
        return \DepartamentoModel::name;
    }

//put your code here
}
