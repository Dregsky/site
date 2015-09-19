<?php
include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\Album;
/**
 * Description of AlbumModel
 * Model from:
 * @var Comunicado
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class AlbumModel extends Model {

    const name = 'EntitiesModels\AlbumModel';
    /**
     * Método recebe a quantidade maxima de registros a serem
     * retornado, caso não seja informado irá retornar todos
     * registros;
     * @param integer $qtd maxima de registros
     * @return Comunicado (array)
     */
    public function retrieveAllByYearAndData() {
        try {
        $repository = $this->em->getRepository($this->getEntity());
        return $repository->findBy(array(), array('anoAlbum' => 'desc','dataCadastro' => 'asc'));
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    /**
     * Método recebe a quantidade maxima de registros a serem
     * retornado, caso não seja informado irá retornar todos
     * registros;
     * @param integer $qtd maxima de registros
     * @return Album (array)
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
        return Album::name;
    }

}
