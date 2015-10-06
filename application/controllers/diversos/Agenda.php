<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Use enums\DepartamentoEnum;
/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Agenda extends Diversos_Controller {

    /**
     * Método Construtor
     */
    public function Agenda() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function getCustomPage() {
        /**
         * Includes de models
         */
        $this->load->model('EntitiesModels/DepartamentoModel');
        /**
         * Includes de components
         */
        $this->load->component('panels/integrados/RowWrapper1Panel');
        $this->load->component('page/SimplePage');
        /**
         * criação de panels
         */
        return $this->agendaPage();
    }

    public function agendaPage() {
         $agenda1 = (new DepartamentoEnum())
                        ->retrieveReferencedEntity(DepartamentoEnum::IGREJA
                        )->getAgendaGoogle();
        $agenda = json_decode($agenda1);
        $dados['agenda'] = isset($agenda->agenda) ? $agenda->agenda : $agenda1;
        $agendaPage = $this->load->view('components/agenda_comp', $dados, true);
        $panel = new RowWrapper1Panel($agendaPage);
        $page = new SimplePage('Agenda ADCRUZ', $panel->getComponent());
        return $page->getComponent();
    }

}
