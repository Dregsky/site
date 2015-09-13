<?php
include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\Mural;
Use Entities\Status;
Use enums\TipoStatus;

/**
 * Description of MuralModel
 * Model from:
 * @var Mural
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class MuralModel extends Model {

    /**
     * Método recebe a quantidade maxima de registros a serem
     * retornado, caso não seja informado irá retornar todos
     * registros;
     * Tambem Recebe um objeto do tipo TipoStatus, caso esse objeto
     * seja null será filtrado por Status::LIBERADO
     * @param integer $qtd maxima de registros
     * @return array(Comunicado)
     */
    public function retrieveUltimosByStatus($tipoStatus = null, $qtd = 0) {
        try {
        $repository = $this->em->getRepository($this->getEntity());
        $qtd = ($qtd == 0 ? NULL : $qtd);
        $status = $tipoStatus == null ? new Status(TipoStatus::LIBERADO) : new Status($tipoStatus);
        return $repository->findBy(array('status' => $status), array('id' => 'desc'), $qtd);
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * 
     * @return Mural
     */
    public function getEntity() {
        return Mural::name;
    }

}
