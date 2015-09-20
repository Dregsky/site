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
     * @param String login e senha
     * @return Pessoa encontrada
     */
    public function login($login, $senha) {
        try {
            $dql = "SELECT p.nome, p.fotoPessoa as foto, p.id, pf.id as perfil, pf.descricao as nomePerfil "
                    . "FROM " . $this->getEntity() . " p join p.perfil pf"
                    . " WHERE p.login = :login and p.senha = :senha";
            $query = $this->em->createQuery($dql);
            $query->setParameter("login", $login);
            $query->setParameter("senha", $senha);
            $query->execute();
            return $query->getResult();
        } catch (Exception $exc) {
            throw $exc;
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
