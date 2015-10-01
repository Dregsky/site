<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
        $dados['agenda'] = '<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23cccccc&amp;src=f7aiqgsnsoupq1l21su6smueks%40group.calendar.google.com&amp;color=%23125A12&amp;ctz=America%2FSao_Paulo" style=" border-width:0 " width="940" height="600" frameborder="0" scrolling="no"></iframe>';
        $agendaPage = $this->load->view('components/agenda_comp', $dados, true);
        $panel = new RowWrapper1Panel($agendaPage);
        $page = new SimplePage('Agenda ADCRUZ', $panel->getComponent());
        return $page->getComponent();
    }

}
