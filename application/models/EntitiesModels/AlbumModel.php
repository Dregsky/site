<?php

include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\Album;
Use enums\DepartamentoEnum;

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
            return $repository->findBy(array(), array('anoAlbum' => 'desc', 'dataCadastro' => 'asc'));
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
     * Método recebe o id do departamento 
     * caso o id seja zero, irá retornar todos os albuns
     * caso seja menor que 0 retornará um array vazio
     * caso seja maior que zero retornará os albuns relativos ao departamento.
     * registros;
     * @param integer $dep maxima de registros
     * @return Album (array)
     */
    public function retrieveByDepartamento($dep = 0) {
        try {
            $repository = $this->em->getRepository($this->getEntity());
            $where = array();
            if ($dep > 0) {
                $where = array('departamento' => (new DepartamentoEnum())->retrieveReferencedEntity($dep));
            }else if($dep < 0){
                return array();
            }
            return $repository->findBy($where, array('anoAlbum' => 'desc'));
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
