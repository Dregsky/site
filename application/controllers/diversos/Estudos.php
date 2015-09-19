<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Estudos extends Diversos_Controller {

    /**
     * Método Construtor
     */
    public function Estudos() {
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
        $this->load->component('AuxComponet');
        $this->load->component('panels/IndexColsPanel');
        $this->load->component('panels/RowPanel');
        $this->load->component('panels/ColInteratorPanel');
        $this->load->component('page/SimplePage');
        /**
         * criação de panels
         */
        $dados['panel1'] = $this->includePanel1();

        return $this->load->view('components/page/simple_page', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    private function includePanel1() {
        $content = $this->estudosContent();
        $page = new SimplePage('Estudos', $content);
        return $page->getComponent();
        
    }

    public function estudosContent() {
        $words = (object)$this->words();
        $pdfs = (object)$this->pdfs();
        $wordCol = $this->load->view('diversos/estudos_comp', array('docs' => $words, 'type' => 'word'), true);
        $pdfCol = $this->load->view('diversos/estudos_comp', array('docs' => $pdfs, 'type' => 'pdf'), true);

        $col1 = new AuxComponet($wordCol, 'index-col2 content-adjust');
        $col2 = new AuxComponet($pdfCol, 'index-col2 content-adjust');
        $indexColsPanel = new IndexColsPanel($col1, $col2);
        return $indexColsPanel->getComponent();
    }

    public function words() {
        return array(
            (object)array(
                'arquivo' => 'GUIADOS_PELO_ESPIRITO_SANTO.doc',
                'nome' => 'Guiados Pelo Espírito Santo'
            ),
            (object)array(
                'arquivo' => 'Jesus_Cura_no_Sabado.doc',
                'nome' => 'Jesus cura no sábado'
            ),
            (object)array(
                'arquivo' => 'Moises_de_homicida_a_profeta.doc',
                'nome' => 'Moisés, de homicida a profeta'
            ),
            (object)array(
                'arquivo' => 'NEEMIAS.doc',
                'nome' => 'Neemias'
            ),
            (object)array(
                'arquivo' => 'O_Livro_de_Josue.doc',
                'nome' => 'O livro de Josué'
            ),
            (object)array(
                'arquivo' => 'O_PODER_DAS_PALAVRAS.doc',
                'nome' => 'O poder das palavras'
            )
        );
    }
    public function pdfs() {
        return array(
            (object)array(
                'arquivo' => '18_estudos_biblicos_para_evangelismo_e_discipulado.pdf',
                'nome' => '18 estudos bíblicos para evangelismo e discipulado'
            ),
            (object)array(
                'arquivo' => 'Jorge_Linhares_Campo_de_Lentilhas.pdf',
                'nome' => 'Jorge Linhares - Campo de Lentilhas'
            ),
            (object)array(
                'arquivo' => 'Uma_licao_sobre_a_verdade_A_Teologia_da_cruz_de_Martinho_Lutero.pdf',
                'nome' => 'Uma lição sobre a verdade - A Teologia da cruz de Martinho Lutero'
            ),
            (object)array(
                'arquivo' => 'A_EMBAIXADA_DO_INIMIGO_Marcio_Valadao.pdf',
                'nome' => 'A embaixada do inimigo - Márcio Valadão'
            ),
            (object)array(
                'arquivo' => 'Curso_de_Evangelismo_Pessoal.pdf',
                'nome' => 'Curso de Evangelismo pessoal'
            ),
            (object)array(
                'arquivo' => 'Italo_Fernando_Brevi_Dicionario_biblico.pdf',
                'nome' => 'Ítalo Fernando Brevi - Dicionario biblico'
            ),
        );
    }


}
