<?php

include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\Comunicado;
Use enums\TipoStatus;

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
            $where = array(
                'status' => TipoStatus::ATIVO
            );
            $qtd = $qtd == 0 ? NULL : $qtd;
            return $repository->findBy($where, array('id' => 'desc'), $qtd);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    /**
     * Método recebe id e retorna dados
     * @param integer $id 
     * @return Comunicado (array)
     */
    public function retrieveArrayById($id) {
        try {
            $dql = "SELECT c.id, c.assunto, c.descricao, c.dataCadastro, c.dataSaiNovo,"
                    . " st.id as status"
                    . " FROM " . $this->getEntity() . " c join c.status st "
                    . " WHERE c.id = :id";
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
        return Comunicado::name;
    }

    public function getTable() {
        return 'tbl_comunicado';
    }

}
