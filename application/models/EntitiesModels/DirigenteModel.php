<?php

include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\Dirigente;
Use enums\TipoStatus;

/**
 * Description of comunicado_model
 * Model from:
 * @var Comunicado
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class DirigenteModel extends Model {

    const name = 'EntitiesModels\DirigenteModel';

    /**
     * Método recebe id e retorna dados
     * @param integer $id 
     * @return Comunicado (array)
     */
    public function retrieveArrayById($id) {
        try {
            $dql = "SELECT d.id, d.nomeDirigente, d.periodoDirigido, d.foto, d.posicao "
                    . " FROM " . $this->getEntity() . " d "
                    . " WHERE d.id = :id";
            $query = $this->em->createQuery($dql);
            $query->setParameter('id', $id);
            return $query->getResult()[0];
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    /**
     * @return Dirigente (array)
     */
    public function retrieveAllByPosicao() {
        try {
            $repository = $this->em->getRepository($this->getEntity());
            $where = array();
            return $repository->findBy($where, array('posicao' => 'asc', 'id' => 'asc'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * 
     * @return Comunicado
     */
    public function getEntity() {
        return Dirigente::name;
    }

    public function getTable() {
        return 'tbl_dirigentes';
    }

}
