<?php

include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\Pessoa;

/**
 * Description of PessoaModel
 * Model from:
 * @var Pessoa
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class PessoaModel extends Model {

    const name = 'EntitiesModels\PessoaModel';
    
    /**
     * Conta a quantidade de registro com o mesmo numero de cpf
     * @param string $cpf
     * @return int quantidade de registros
     */
    public function countCpf($cpf) {
        try {
            $dql = "SELECT count(p.id) FROM " . $this->getEntity() . " p WHERE p.cpf = :cpf";
            $query = $this->em->createQuery($dql);
            $query->setParameter("cpf", $cpf);
            $query->execute();
            return $query->getSingleScalarResult();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * 
     * @return Status
     */
    public function getEntity() {
        return Pessoa::name;
    }

}
