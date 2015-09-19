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

    private $departamento;
    private $menuSelecionado = '';

    abstract function getDepartamento();

    protected abstract function includeSlide();

    protected abstract function getCoordenadores();

    public function __construct() {
        parent::__construct();
    }

    public function getMenu() {
        $this->departamento = $this->getDepartamento();
        $dados['departamento'] = strtolower($this->departamento->getApelido());
        return $this->load->view('_inc/menuDepartamentos', $dados, true);
    }

    public function getCustomPage() {
        /**
         * Includes de models
         */
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

            default:
                $this->menuSelecionado = 'principal';
                $dados['slide'] = $this->includeSlide();
                return $this->load->view('departamentos/home_page', $dados, true);
        }
    }

    /**
     * Paginas do controller
     */
    public function agenda($agenda = '') {
        $dados['agenda'] = $this->departamento->getAgendaGoogle();
        $agendaPage = $this->load->view('components/agenda_comp', $dados, true);
        $panel = new RowWrapper1Panel($agendaPage);
        $page = new SimplePage('Agenda ' . $this->departamento->getNomeCompleto(), $panel->getComponent());
        return $page->getComponent();
    }

    public function coordenacao() {
        $dados['pessoas'] = $this->getCoordenadores();
        $cPage = $this->load->view('departamentos/coordenacao_comp', $dados, true);
        $page = new SimplePage('Coordenação ' . $this->departamento->getNomeCompleto(), $cPage);
        return $page->getComponent();
    }

    protected function getCoordenador($nome = '', $cargo = '', $foto = '') {
        return array(
            'nome' => $nome,
            'cargo' => $cargo,
            'foto' => $foto
        );
    }

    function getMenuSelecionado() {
        return $this->menuSelecionado;
    }

}
