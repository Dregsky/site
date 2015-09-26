<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

Use Entities\Departamento;

/**
 * Departamento_Controller
 * @property  Departamento $departamento Gerenciador de Entidade
 * @category Departamento_Controller
 * @package  CodeIgniter
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
abstract class Departamento_Controller extends Site_Controller {

    const AGENDA = 'agenda';
    const COORDENACAO = 'coordenacao';
    const FOTOS = 'fotos';

    private $departamento;
    private $menuSelecionado = '';

    abstract function getDepartamento();

    public function __construct() {
        parent::__construct();
    }

    public function getMenu() {
        $this->departamento = $this->getDepartamento();
        $dados['departamento'] = $this->departamento->getApelido();
        return $this->load->view('_inc/menuDepartamentos', $dados, true);
    }

    public function getCustomPage() {
        /**
         * Includes de models
         */
        $this->load->model('EntitiesModels/AlbumModel');
        $this->load->model('EntitiesModels/SlideModel');
        $this->load->model('EntitiesModels/CoordenacaoDepartamentoModel');
        /**
         * Includes de components
         */
        $this->load->component('panels/integrados/RowWrapper1Panel');
        $this->load->component('page/SimplePage');
        /**
         * criação de panels
         */
        switch ($this->uri->segment(3)) {
            case $this::AGENDA:
                $this->menuSelecionado = $this::AGENDA;
                return $this->agenda();

            case $this::COORDENACAO:
                $this->menuSelecionado = $this::COORDENACAO;
                return $this->coordenacao();

            case $this::FOTOS:
                $this->menuSelecionado = $this::FOTOS;
                return $this->fotos();

            default:
                $this->menuSelecionado = 'principal';
                $dados['slide'] = $this->includeSlide();
                return $this->load->view('departamentos/home_page', $dados, true);
        }
    }

    /**
     * Paginas do controller
     */
    public function agenda() {
        $agenda = json_decode($this->departamento->getAgendaGoogle());
        $dados['agenda'] = isset($agenda->agenda) ? $agenda->agenda : '';
        $dados['tipo'] = isset($agenda->tipo) ? $agenda->tipo : '';
        $agendaPage = $this->load->view('components/agenda_comp', $dados, true);
        $panel = new RowWrapper1Panel($agendaPage);
        $page = new SimplePage('Agenda ' . $this->departamento->getNomeCompleto(), $panel->getComponent());
        return $page->getComponent();
    }

    public function coordenacao() {
        $model = new CoordenacaoDepartamentoModel();
        $dados['pessoas'] = $model->retrieveByDepartamentoAndYear($this->departamento->getId());
        $cPage = $this->load->view('departamentos/coordenacao_comp', $dados, true);
        $page = new SimplePage('Coordenação ' . $this->departamento->getNomeCompleto(), $cPage);
        return $page->getComponent();
    }

    public function fotos() {
        $model = new AlbumModel();
        $dados['albuns'] = $model->retrieveAtivosByDepartamento($this->departamento->getId());
        $content = $this->load->view('diversos/fotos_comp', $dados, true);
        $page = new SimplePage('Albuns ' . $this->departamento->getNomeCompleto(), $content);
        return $page->getComponent();
    }

    private function includeSlide() {
        $dados['banners'] = (new SlideModel())->retrieveAllByDepartamento($this->departamento->getId());
        return $this->load->view('components/slide_comp', $dados, true);
    }

    function getMenuSelecionado() {
        return $this->menuSelecionado;
    }

}
