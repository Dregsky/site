<?php

include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\Album;
Use enums\DepartamentoEnum;
Use enums\TipoStatus;

/**
 * Description of AlbumModel
 * Model from:
 * @var Album
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class AlbumModel extends Model {

    const name = 'EntitiesModels\AlbumModel';

    /**
     * Método retorna todos os albums ativos e marcado exibirPrincipal = 1
     * @param void
     * @return Album (array)
     */
    public function retrieveAllAtivos() {
        try {
            $repository = $this->em->getRepository($this->getEntity());
            $where = array(
                'status' => (new TipoStatus())->retrieveReferencedEntity(TipoStatus::ATIVO),
                'exibirPrincipal' => 1
            );
            return $repository->findBy($where, array('anoAlbum' => 'desc', 'dataCadastro' => 'asc'));
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
            $where = array('status' => (new TipoStatus())->retrieveReferencedEntity(TipoStatus::ATIVO));
            $qtd = $qtd == 0 ? NULL : $qtd;
            return $repository->findBy($where, array('id' => 'desc'), $qtd);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Método recebe o id do departamento 
     * caso o id seja zero, irá retornar todos os albuns ativos
     * caso seja menor que 0 retornará um array vazio
     * caso seja maior que zero retornará os albuns ativos relativos ao departamento.
     * registros;
     * @param integer $dep maxima de registros
     * @return Album (array)
     */
    public function retrieveAtivosByDepartamento($dep = 0) {
        try {
            $repository = $this->em->getRepository($this->getEntity());
            $where = array('status' => (new TipoStatus())->retrieveReferencedEntity(TipoStatus::ATIVO));
            if ($dep > 0) {
                $where['departamento'] = (new DepartamentoEnum())->retrieveReferencedEntity($dep);
            } else if ($dep < 0) {
                return array();
            }
            return $repository->findBy($where, array('anoAlbum' => 'desc'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
     /**
     * Método recebe o id do departamento 
     * caso o id seja zero, irá retornar todos os albuns ativos
     * caso seja menor que 0 retornará um array vazio
     * caso seja maior que zero retornará os albuns ativos relativos ao departamento.
     * registros;
     * @param integer $dep maxima de registros
     * @return Album (array)
     */
    public function retrieveAllByDepartamento($dep = 0) {
        try {
            $repository = $this->em->getRepository($this->getEntity());
            $where = array();
            if ($dep > 0) {
                $where['departamento'] = (new DepartamentoEnum())->retrieveReferencedEntity($dep);
            } else if ($dep < 0) {
                return array();
            }
            return $repository->findBy($where, array('anoAlbum' => 'desc'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Método recebe id e retorna dados
     * @param integer $id 
     * @return Album (array)
     */
    public function retrieveArrayById($id) {
        try {
            $dql = "SELECT a.nomeAlbum, a.nomeEvento, a.flickr, a.anoAlbum, a.quantidadeFotos, s.id as status,"
                    . " d.id as departamento , a.dataCadastro, a.exibirPrincipal "
                    . " FROM " . $this->getEntity() . " a join a.status s join a.departamento d"
                    . " WHERE a.id = :id";
            $query = $this->em->createQuery($dql);
            $query->setParameter('id', $id);
            return $query->getResult()[0];
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    /**
     * 
     * @return Comunicado
     */
    public function getEntity() {
        return Album::name;
    }

    public function getTable() {
        return 'tbl_album';
    }

}
