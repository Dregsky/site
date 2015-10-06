<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Entities\AceitaJesus as Aceita;

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * @params $email Email
 */
class AceitaJesus extends Diversos_Controller {

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
        $this->load->model('EntitiesModels/AceitaJesusModel');
        $this->load->model('EntitiesModels/PessoaModel');
        /**
         * Includes de components
         */
        $this->load->component('page/SimplePage');
        /**
         * criação de panels
         */
        $dados['panel1'] = $this->aceitaPage();

        return $this->load->view('components/page/simple_page', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    public function aceitaPage() {
        $content = $this->load->view('diversos/aceitaJesus_form', '', true);
        $page = new SimplePage('Aceita Jesus', $content);
        return $page->getComponent();
    }

    public function cadastrar() {
        $dados = $this->input->post();
        $dados['dataAceitaJesus'] = new DateTime();
        $dados['aceitaJesus'] = 'Eu aceito Jesus Cristo como único '
                . 'e suficiente Salvador e o declaro '
                . 'como Senhor da minha vida.';
        $aceita = new Aceita();
        $aceita->setAll($dados);
        $model = new AceitaJesusModel();
        $model->saveOrUpdate($aceita);
        $this->enviarEmail();
        success('Sucesso', 'A paz do Senhor! Seja bem-vindo a essa família.'
                . '<br> Aguarde, em breve entraremos em contato. <br> Deus lhe abençoe!');
        redirect('diversos/AceitaJesus');
    }
    
    public function enviarEmail() {
        $pessoaModel = new PessoaModel();
        $emails = $pessoaModel->retrieveEmailsAdmins();

        foreach ($emails as $i => $a){
            $emailDestino[$i] = $a['email'];
        }
        $config['mailtype'] = 'html';
        $this->load->library('email');

        $this->email->initialize($config);

        $this->email->from('adcruz@adcruz.org', 'Site ADCruz');
        $this->email->to($emailDestino);

        $this->email->subject('Aceita Jesus');
//        $corpo = $this->load->view('components/templateEmailCultoNoLar', $dados, true);

        //die($corpo);
        $this->email->message('Alguém aceitou a Jesus, direcione-se ao ADMIN do site para mais informações!');

        $this->email->send();
    }

}
