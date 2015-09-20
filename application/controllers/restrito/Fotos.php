<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Use Entities\Pessoa as Pessoa;
Use enums\TipoPerfil;
Use enums\DepartamentoEnum;

/**
 * @property Doctrine $doctrine Biblioteca ORM
 * @property home_model $homeModel Model
 * @property Pessoa $pessoa 
 * 
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Fotos extends Restrito_Controller {

    /**
     * Método Construtor
     */
    public function __construct() {
        parent::__construct();
    }

    protected function getContent() {
        /* Carregando Models */
        $this->load->model('EntitiesModels/AlbumModel');

        $this->setMenuAtivoFilho('albuns');
        return $this->albuns();
    }

    public function index() {
        
    }

    protected function getMenuAtivo() {
        return 'fotos';
    }

    public function albuns() {
        $model = new AlbumModel();
        $departamento = $this->getDepartamentoByPerfil($this->pessoa->getPerfil()->getId());
        //die(var_dump($departamento));
        $dados['albuns'] = $model->retrieveByDepartamento($departamento);
        return $this->load->view('restrito/albunsLista_comp', $dados, true);
    }

    private function getDepartamentoByPerfil($perfil) {
        switch ($perfil) {
            case TipoPerfil::ANG:
                return DepartamentoEnum::ANG;
            case TipoPerfil::CIBE:
                return DepartamentoEnum::CIBE;
            case TipoPerfil::EBD:
                return DepartamentoEnum::EBD;
            case TipoPerfil::FAMILIA:
                return DepartamentoEnum::FAMILIA;
            case TipoPerfil::INFANTIL:
                return DepartamentoEnum::CVKIDS;
            case TipoPerfil::JORNALISTA:
                return 0;
            case TipoPerfil::MEMBRO:
                return -1;
            case TipoPerfil::MISSOES:
                return DepartamentoEnum::MISSOES;
            case TipoPerfil::MTV:
                return DepartamentoEnum::MTV;
            case TipoPerfil::OBREIROS:
                return DepartamentoEnum::OBREIROS;
            case TipoPerfil::ORQUESTRA:
                return DepartamentoEnum::ORQUESTRA;
            case TipoPerfil::SECRETARIO:
                return DepartamentoEnum::SECRETARIA;
            case TipoPerfil::SUPER_ADMINISTRADOR:
                return 0;
            case TipoPerfil::ADMINISTRADOR:
                return 0;
            case TipoPerfil::TESOUREIRO:
                return -1;
        }
    }

}
