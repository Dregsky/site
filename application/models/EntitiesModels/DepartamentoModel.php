<?php

include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\Departamento;
Use enums\DepartamentoEnum;

/**
 * Description of DepartamentoModel
 * Model from:
 * @var Comunicado
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class DepartamentoModel extends Model {

    const name = 'EntitiesModels\DepartamentoModel';

    /**
     * Método que retorna todos departamentos com exceção de igreja
     * @return Departamento (array)
     */
    public function retrieveAllSemIgreja() {
        try {
            $dql = 'select d from '. $this->getEntity(). ' d where d.id != :id';
            $query = $this->em->createQuery($dql);
            $query->setParameter('id', DepartamentoEnum::IGREJA);
//            $repository = $this->em->getRepository($this->getEntity());
//            return $repository->findBy(array('id' => ' != '.DepartamentoEnum::IGREJA));
            return $query->getResult();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    /**
     * 
     * @param type $departamentos
     * @return Departamento (array)s
     */
     public function retrieveByIds($departamentos = array()) {
        try {
            $dql = 'select d from '. $this->getEntity(). ' d where d.id in(:departamentos) ';
            $query = $this->em->createQuery($dql);
            $query->setParameter('departamentos', $departamentos);
//            $repository = $this->em->getRepository($this->getEntity());
//            return $repository->findBy(array('id' => ' != '.DepartamentoEnum::IGREJA));
            return $query->getResult();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * 
     * @return Departamento
     */
    public function getEntity() {
        return Departamento::name;
    }

}
