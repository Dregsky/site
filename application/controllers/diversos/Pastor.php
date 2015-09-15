<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * @params $email Email
 */
class Pastor extends Principal_Controller {

    /**
     * Método Construtor
     */
    public function Pastor() {
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
        $this->load->component('page/SimplePage');
        /**
         * criação de panels
         */
        $dados['panel1'] = $this->falePage();

        return $this->load->view('components/page/simple_page', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    public function falePage() {
        $content = $this->load->view('diversos/faleComOPastor_comp', '', true);
        $content = $content . $this->getScript();
        $page = new SimplePage('Fale Com O Pastor', $content);
        return $page->getComponent();
    }

    public function getScript() {
        return "<script>$('.title-row-page').css('text-align', 'center')</script>";
    }

    public function enviarEmail() {
        $emailPastor = 'rafaeltbt@gmail.com';
        $dados = $this->input->post();

        $config['mailtype'] = 'html';
        $this->load->library('email');

        $this->email->initialize($config);

        $this->email->from('adcruz@adcruz.org', 'Site ADCruz');
        $this->email->to($emailPastor);

        $this->email->subject($dados['assunto']);
        $corpo = $this->load->view('components/templateEmailPastor', $dados, true);

        $this->email->message($corpo);

        if ($this->email->send()) {
            successEmail();
        } else {
            errorEmail();
        }
        redirect('diversos/pastor');
    }

}