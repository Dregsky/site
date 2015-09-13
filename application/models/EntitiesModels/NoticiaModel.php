<?php
include_once(APPPATH . "models/" . 'Model' . EXT);
Use Entities\Noticia;
Use enums\TipoNoticia;
Use enums\TipoStatus;

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
        try{
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
        }catch(Exception $e){
            echo $e->getTraceAsString();
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
