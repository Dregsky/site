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
        success('Sucesso', 'A paz do Senhor! Seja bem-vindo a essa família.'
                . '<br> Aguarde, em breve entraremos em contato. <br> Deus lhe abençoe!');
    }

}
