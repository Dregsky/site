<?php

include_once(APPPATH . "models/" . 'Model' . EXT);

Use Entities\Noticia;
Use enums\TipoNoticia;
Use enums\TipoStatus;
Use enums\DepartamentoEnum;
Use Entities\Departamento;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NoticiaModel
 * Model of:
 * @var Noticia
 * @property \Doctrine\ORM\EntityManager $em Gerenciador de Entidade
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class NoticiaModel extends Model {
    
        const name = 'EntitiesModels\NoticiaModel';

    /**
     * Método que busca as últimas noticias 
     * Com Status Ativo e Tipo Principal.
     * Método recebe a quantidade maxima de registros a serem
     * retornado, caso não seja informado irá retornar todos
     * registros;
     * @param integer $qtd quantidade maxima de registros 
     * @return array com id e fotoNoticia
     */
    public function retrieveAtivasPrincipais($qtd = 0) {
        try {
            $dql = 'Select n.id, n.fotoNoticia FROM ' . Noticia::name . ' n '
                    . 'WHERE n.tipo = :tipo and n.status = :status order by n.id desc';
            $query = $this->em->createQuery($dql);
            $params = array(
                'tipo' => TipoNoticia::PRINCIPAL,
                'status' => TipoStatus::ATIVO
            );
            $query->setParameters($params);
            if ($qtd != 0) {
                $query->setMaxResults($qtd);
            }
            $query->execute();
            return $query->getResult();
        } catch (Exception $e) {
            echo $e->getTraceAsString();
        }
    }

    /**
     * Método recebe a quantidade maxima de registros a serem
     * retornado, caso não seja informado irá retornar todos
     * registros;
     * Tambem Recebe um objeto do tipo 
     * @var enums\Departamento , caso esse objeto
     * seja null será filtrado por Departamento::IGREJA
     * @param integer $qtd maxima de registros
     * @return array(Comunicado)
     */
    public function retrieveUltimasAtivasByDepartamento($departamento = null, $qtd = 0) {
        try {
            $repository = $this->em->getRepository($this->getEntity());
            $qtd1 = ($qtd == 0 ? NULL : $qtd);
            $dep = $departamento == null ? new Departamento(DepartamentoEnum::IGREJA) : new Departamento($departamento);
            $where = array(
                'departamento' => $dep,
                'status' => TipoStatus::ATIVO
            );
            return $repository->findBy($where, array('id' => 'desc'), $qtd1);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * @Override
     * @return Noticia
     */
    public function getEntity() {
        return Noticia::name;
    }

}
