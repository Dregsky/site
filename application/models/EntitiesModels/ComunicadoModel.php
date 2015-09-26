<?php
include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\Comunicado;
/**
 * Description of comunicado_model
 * Model from:
 * @var Comunicado
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class ComunicadoModel extends Model {

    const name = 'EntitiesModels\ComunicadoModel';
    /**
     * Método recebe a quantidade maxima de registros a serem
     * retornado, caso não seja informado irá retornar todos
     * registros;
     * @param integer $qtd maxima de registros
     * @return Comunicado (array)
     */
    public function retrieveUltimos($qtd = 0) {
        try {
        $repository = $this->em->getRepository($this->getEntity());
        $qtd = $qtd == 0 ? NULL : $qtd;
        return $repository->findBy(array(), array('id' => 'desc'), $qtd);
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * 
     * @return Comunicado
     */
    public function getEntity() {
        return Comunicado::name;
    }

    public function getTable() {
        return 'tbl_comunicado';
    }

}
