<?php

include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\Pessoa;
Use enums\TipoStatus;
Use Entities\Departamento;

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
     * Conta a quantidade de registro com o mesmo numero de cpf
     * @param string $cpf
     * @return int quantidade de registros
     */
    public function retrieveEmailsAdmins() {
        try {
            $dql = "SELECT p.email FROM " . $this->getEntity() . " p WHERE p.perfil = :perfil";
            $query = $this->em->createQuery($dql);
            $perfil = (new enums\TipoPerfil())->retrieveReferencedEntity(enums\TipoPerfil::SUPER_ADMINISTRADOR);
            $query->setParameter("perfil", $perfil);
            $query->execute();
            return $query->getResult();
        } catch (Exception $exc) {
            throw $exc->getTraceAsString();
        }
    }

    /**
     * Conta a quantidade de registro com o mesmo numero de cpf
     * @param string $cpf
     * @return int quantidade de registros
     */
    public function cpfsCadastrados($cpf, $id) {
        try {
            $dql = "SELECT count(p.id) FROM " . $this->getEntity() . " p WHERE p.cpf = :cpf"
                    . " and p.id != :id";
            $query = $this->em->createQuery($dql);
            $query->setParameter("cpf", $cpf);
            $query->setParameter("id", $id);
            $query->execute();
            return $query->getSingleScalarResult();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    /**
     * Conta a quantidade de registro com o mesmo nome de login
     * @param string $cpf
     * @return int quantidade de registros
     */
    public function verificaExistenciaLogin($login, $id) {
        try {
            $dql = "SELECT count(p.id) FROM " . $this->getEntity() . " p WHERE p.login = :login"
                    . " and p.id != :id";
            $query = $this->em->createQuery($dql);
            $query->setParameter("login", $login);
            $query->setParameter("id", $id);
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
            $dql = "SELECT p.nome, p.genero, p.fotoPessoa as foto, p.id, pf.id as perfil, pf.descricao as nomePerfil "
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
     * @param String login e senha
     * @return Pessoa encontrada
     */
    public function retrieveEmailAndCpf($email, $cpf) {
        try {
            $dql = "SELECT p.email, p.cpf, p.id "
                    . "FROM " . $this->getEntity() . " p "
                    . " WHERE p.email = :email and p.cpf = :cpf"
                    . " and p.login is not null and p.login != '' ";
            $query = $this->em->createQuery($dql);
            $query->setParameter("email", $email);
            $query->setParameter("cpf", $cpf);
            $query->execute();
            return $query->getResult();
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    /**
     * 
     * @param String login e senha
     * @return Pessoa encontrada
     */
    public function retrieveAllMembrosUsuarios() {
        try {
            $dql = " SELECT p.id, p.nome, p.login, pe.id as perfil, pe.descricao as perfilDescricao"
                    . " FROM " . $this->getEntity() . " p join p.perfil pe "
                    . " WHERE p.login is not null and p.login != '' ";
            $query = $this->em->createQuery($dql);
            $query->execute();
            return $query->getResult();
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    /**
     * 
     * @param String login e senha
     * @return Pessoa encontrada
     */
    public function retrieveLoginById($id) {
        try {
            $dql = " SELECT p.login, p.id"
                    . " FROM " . $this->getEntity() . " p "
                    . " WHERE p.id = :id and p.login is not null and p.login != '' ";
            $query = $this->em->createQuery($dql);
            $query->setParameter('id', $id);
            $query->execute();
            return $query->getResult()[0];
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
     /**
     * 
     * @param String login e senha
     * @return Pessoa encontrada
     */
    public function retrieveAllMembrosNotUsuarios() {
        try {
            $dql = " SELECT p.id, p.nome, p.login"
                    . " FROM " . $this->getEntity() . " p "
                    . " WHERE p.login is null or p.login = '' ";
            $query = $this->em->createQuery($dql);
            $query->execute();
            return $query->getResult();
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    /**
     * Método recebe o id do departamento 
     * caso o id seja zero, irá retornar todos os albuns ativos
     * caso seja menor que 0 retornará um array vazio
     * caso seja maior que zero retornará os albuns ativos relativos ao departamento.
     * registros;
     * @param integer $dep maxima de registros
     * @return Pessoa (array)
     */
    public function retrieveAtivasByDepartamento($dep = 0) {
        try {
            $dql = 'Select p FROM ' . $this->getEntity() . ' p join p.departamentos d ' .
                    'WHERE 1=1 and ';
            $params = array();
            if ($dep instanceof Departamento) {
                $dql = $dql . ' :dep in (d) and ';
                $params['dep'] = $dep;
            }
            $dql = $dql . ' p.status = :st order by p.nome asc';
            $params['st'] = (new TipoStatus())->retrieveReferencedEntity(TipoStatus::ATIVO);
            $query = $this->em->createQuery($dql);
            $query->setParameters($params);
            $query->getResult();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * 
     * @param integer $id
     * @return array (onde campos das tabelas são os índices)
     */
    public function CI_buscarDepartamentos($id) {
        $this->db->select('cod_departamento as id');
        $this->db->where('cod_pessoa', $id);
        return $this->db->get('tbl_pessoa_departamento')->result_array();
    }
    
    /**
     * 
     * @param String id
     * @return Array(Pessoa) encontrada
     */
    public function retrieveArray($id) {
        try {
            $dql = " SELECT p.id, p.genero, "
                    . " p.nome, p.email, p.telefone, p.dataCadastro, "
                    . " p.dataExclusao, p.dataNascimento, "
                    . " p.cartaoMembro, p.fotoPessoa, p.cpf, p.cidadeNatal, "
                    . " p.rua, p.bairro, p.cidade, p.rg, p.orgaoEmissor, "
                    . " p.dataEmissao, f.id as funcaoMinisterial, pr.id as profissao, "
                    . " e.id as escolaridade, ec.id as estadoCivil, p.dataChegada, "
                    . " p.dataBatismoAguas, p.dataBatismoEspirito, p.nomePai,"
                    . " p.nomeMae, p.nomeConjuge, p.dataCasamento, p.qtdFilhos, p.prof "
                    . " FROM " . $this->getEntity() . " p "
                    . " left join p.funcaoMinisterial f "
                    . " left join p.profissao pr "
                    . " left join p.escolaridade e "
                    . " left join p.estadoCivil ec"
                    . " WHERE p.id = :id";
            $query = $this->em->createQuery($dql);
            $query->setParameter("id", $id);
            $query->execute();
            return $query->getSingleResult();
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

    public function getTable() {
        return 'tbl_pessoa';
    }

}
