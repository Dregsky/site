<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use enums\DiversosPaginas;

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Diversos extends Principal_Controller {

    private $pagina = 0;

    /**
     * Método Construtor
     */
    public function Diversos() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function getCustomPage() {
        $dados['panel1'] = '';
        /**
         * Includes de models
         */
        /**
         * Includes de components
         */
        $this->load->component('page/SimplePage');
        /**
         * criação de panels
         */
        if ($this->uri->segment(2) == DiversosPaginas::ADCRUZ_NOS_LARES) {
            $dados['panel1'] = $this->adcruzNosLares();
        } else if ($this->uri->segment(2) == DiversosPaginas::NISTO_CREMOS) {
            $dados['panel1'] = $this->nistoCremos();
        } else if ($this->uri->segment(2) == DiversosPaginas::TESOURARIA) {
            $dados['panel1'] = $this->tesouraria();
        }

        return $this->load->view('simple_page', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    public function adcruzNosLares() {
        $content = $this->load->view('diversos/adcruzNosLares_comp', '', true);
        $page = new SimplePage('Projeto ADCruz Nos Lares', $content);
        return $page->getComponent();
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    public function nistoCremos() {
        $content = $this->load->view('diversos/nistoCremos_comp', '', true);
        $page = new SimplePage('Nisto Cremos', $content);
        return $page->getComponent();
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    public function tesouraria() {
        $content = $this->load->view('diversos/tesouraria_comp', '', true);
        $page = new SimplePage('Tesouraria', $content);
        return $page->getComponent();
    }

}
