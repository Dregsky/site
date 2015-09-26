<?php

include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\CoordenacaoDepartamento;
Use enums\DepartamentoEnum;
use enums\TipoStatus;

/**
 * Description of CoordenacaoDepartamentoModel
 * Model from:
 * @var AceitaJesus
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class CoordenacaoDepartamentoModel extends Model {

    const name = 'EntitiesModels\CoordenacaoDepartamento';

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
            return $repository->findBy($where, array('ano' => 'desc'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Método recebe o id do departamento 
     * registros;
     * @param integer $dep 
     * @return CoordenacaoDepartamento (array)
     */
    public function retrieveByDepartamentoAndYear2($dep) {
        try {
            $repository = $this->em->getRepository($this->getEntity());
            $where = array();
            $where['departamento'] = (new DepartamentoEnum())->retrieveReferencedEntity($dep);
            $where['status'] = (new TipoStatus())->retrieveReferencedEntity(TipoStatus::ATIVO);
            $where['ano'] = date('Y');
            return $repository->findBy($where, array('posicao' => 'asc', 'id' => 'asc'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Método recebe o id do departamento 
     * registros;
     * @param integer $dep maxima de registros
     * @return CoordenacaoDepartamento (array)
     */
    public function retrieveByDepartamentoAndYear($dep) {
        try {
            $dql = 'SELECT c.nomePessoa, c.nomeCargo, c.foto, p.genero FROM ' . $this->getEntity() . ' c ' .
                    'left join c.pessoa p WHERE c.departamento = :departamento and '
                    . ' c.status = :status and c.ano = :ano '
                    . ' order by c.posicao asc';
            $query = $this->em->createQuery($dql);
            $params['departamento'] = (new DepartamentoEnum())->retrieveReferencedEntity($dep);
            $params['status'] = (new TipoStatus())->retrieveReferencedEntity(TipoStatus::ATIVO);
            $params['ano'] = date('Y');
            $query->setParameters($params);
            return $query->getResult();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * 
     * @return CoordenacaoDepartamento
     */
    public function getEntity() {
        return CoordenacaoDepartamento::name;
    }

    public function getTable() {
        return 'tbl_coordenacao_departamento';
    }

}
