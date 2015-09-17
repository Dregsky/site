<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * @params $email Email
 */
class CultoNoLar extends Principal_Controller {

    /**
     * Método Construtor
     */
    public function CultoNoLar() {
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
        $dados['panel1'] = $this->cultoPage();

        return $this->load->view('components/page/simple_page', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    public function cultoPage() {
        $content = $this->load->view('diversos/cultoNoLar_comp', '', true);
        $page = new SimplePage('Agende seu culto', $content);
        return $page->getComponent();
    }

    public function enviarEmail() {
        $emailDestino = array(
            'rafaeltbt@gmail.com',
            'email@teste.com',
            'email@email.com');
        $dados = $this->input->post();

        $config['mailtype'] = 'html';
        $this->load->library('email');

        $this->email->initialize($config);

        $this->email->from('adcruz@adcruz.org', 'Site ADCruz');
        $this->email->to($emailDestino);

        $this->email->subject('Culto No Lar');
        $corpo = $this->load->view('components/templateEmailCultoNoLar', $dados, true);

        //die($corpo);
        $this->email->message($corpo);

        if ($this->email->send()) {
            successEmail('Aguarde que alguém entrará em contato para confirmar seu pedido.');
        } else {
            errorEmail();
        }
        redirect('diversos/cultonolar');  
    }

}
