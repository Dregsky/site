<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Localizacao extends Diversos_Controller {

    /**
     * Método Construtor
     */
    public function Localizacao() {
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
        return $this->mapaPage();
    }

    public function mapaPage() {
        $dados['agenda'] = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d239.9626354671053!2d-47.93692168525772!3d-15.78273434650064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x1bf0412608fd44c7!2sAssembl%C3%A9ia+de+Deus!5e0!3m2!1spt-BR!2sbr!4v1443244241238" width="940" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>';
        $agendaPage = $this->load->view('components/agenda_comp', $dados, true);
        $panel = new RowWrapper1Panel($agendaPage);
        $page = new SimplePage('Localização ADCruz', $panel->getComponent());
        return $page->getComponent();
    }

}
