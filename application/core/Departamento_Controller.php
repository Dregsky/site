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

    private $departamento;

    abstract function getDepartamento();

    protected abstract function includeSlide();

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
                return $this->agenda();

            default:
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

}
