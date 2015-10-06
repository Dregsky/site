<?php

require_once APPPATH . "models/" . 'Model' . EXT;

Use Entities\Testemunho;
Use enums\TipoStatus;

/**
 * Description of MuralModel
 * Model from:
 * @var Testemunho
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class TestemunhoModel extends Model {

    const name = 'EntitiesModels\TestemunhoModel';

    /**
     * Método recebe a quantidade maxima de registros a serem
     * retornado, caso não seja informado irá retornar todos
     * registros;
     * Tambem recebe para qual pagina será feita a consulta(page)
     * caso não seja informado começar da primeira pagina ($page = 0)
     * Tambem Recebe um objeto do tipo TipoStatus, caso esse objeto
     * seja null será filtrado por Status::LIBERADO
     * @param integer $qtd maxima de registros
     * @return Entities\Testemunho (array)
     */
    public function retrieveUltimosByStatusAndPage($tipoStatus = null, $qtd = 0, $page = 0) {
        try {
            $repository = $this->em->getRepository($this->getEntity());
            $qtd1 = ($qtd == 0 ? NULL : $qtd);
            $status = $tipoStatus == null ? (new TipoStatus())->retrieveReferencedEntity(TipoStatus::LIBERADO) :
                    (new TipoStatus())->retrieveReferencedEntity($tipoStatus);
            return $repository->findBy(array('status' => $status), array('id' => 'desc'), $qtd1, $page * $qtd);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function countByStatus($tipoStatus = null) {
        try {
            $dql = "SELECT count(t.id) FROM " . $this->getEntity() . " t WHERE t.status = :status";
            $query = $this->em->createQuery($dql);
            $status = $tipoStatus == null ? (new TipoStatus())->retrieveReferencedEntity(TipoStatus::LIBERADO) :
                    (new TipoStatus())->retrieveReferencedEntity($tipoStatus);
            $query->setParameter("status", $status);
            $query->execute();
            return $query->getSingleScalarResult();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    
    /**
     * Muda status do testemunho para Liberado
     * @var Entities\Status
     * @param Object $id (entidade a ser inativada) 
     */
    public function liberar($id) {
        try {
            $entity = $this->em->find($this->getEntity(), $id);
            $status = (new TipoStatus())->retrieveReferencedEntity(TipoStatus::LIBERADO);
            $entity->setStatus($status);
            $this->saveOrUpdate($entity);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    /**
     * 
     * @return Testemunho
     */
    public function getEntity() {
        return Testemunho::name;
    }

    public function getTable() {
        return 'tbl_testemunho';
    }

}
