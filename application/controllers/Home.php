<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Use enums\TipoStatus;

/**
 * @property Doctrine $doctrine Biblioteca ORM
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Home extends Principal_Controller {

    /**
     * Método Construtor
     */
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function getCustomPage() {
        $dados['slide'] = $this->includeSlide();
        $dados['panel1'] = $this->includePanel1();
        $dados['panel2'] = $this->includePanel2();
        $dados['panel3'] = $this->includePanel3();
        
        return $this->load->view('home/home_page', $dados, true);
    }

    private function includeSlide() {
        $this->load->model('EntitiesModels/NoticiaModel', 'noticiaModel');
        $noticiaModel = new NoticiaModel();
        $dados['noticias'] = $noticiaModel->retrieveAtivasPrincipais(3);
        return $this->load->view('home/slide_comp', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    private function includePanel1() {
        $this->load->component('AuxComponet');
        $this->load->component('panels/IndexColsPanel');
        $this->load->component('panels/RowPanel');
        $col1 = new AuxComponet($this->faleComOPastor(), 'index-col-1');
        $col2 = new AuxComponet($this->includeComunicados());
        $col3 = new AuxComponet($this->includeMuralRecados());
        $indexColsPanel = new IndexColsPanel($col1, $col2, $col3);
        $rowPanel = new RowPanel($indexColsPanel->getComponent());
        return $rowPanel->getComponent();
    }

    /**
     * 
     * @return string contendo o html do fale com o pastor
     */
    private function faleComOPastor() {
        return $this->load->view('home/faleComOPastor_comp', '', true);
    }
    
    /**
     * 
     * @return string contendo o html comunicados
     */
    private function includeComunicados() {
        $this->load->model('EntitiesModels/ComunicadoModel', 'comunicadoModel');
        $comunicadoModel = new ComunicadoModel();
        $dados['comunicados'] = $comunicadoModel->retrieveUltimos(5);
        $dados['dataHoje'] = $dataHoje = date("Y-m-d");
        return $this->load->view('home/comunicados_comp', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do mural de recados
     */
    private function includeMuralRecados() {
        $this->load->model('EntitiesModels/MuralModel', 'muralModel');
        $muralModel = new MuralModel();
        $dados['recados'] = $muralModel->retrieveUltimosByStatus(TipoStatus::LIBERADO, 4);
        $dados['dataHoje'] = $dataHoje = date("Y-m-d");
        return $this->load->view('home/muralRecados_comp', $dados, true);
    }
    
     /**
     * 
     * @return string contendo o html do panel
     */
    private function includePanel2() {
        $this->load->component('panels/Wrapper1Panel');
        $wrapperPanel = new Wrapper1Panel($this->aceitarJesus());
        $rowPanel = new RowPanel($wrapperPanel->getComponent());
        return $rowPanel->getComponent();
    }
    
    /**
     * 
     * @return string contendo o html do fale com o pastor
     */
    private function aceitarJesus() {
        return $this->load->view('home/aceitaJesus_comp', '', true);
    }
    
     /**
     * 
     * @return string contendo o html do panel
     */
    private function includePanel3() {
        $wrapperPanel = new Wrapper1Panel($this->aceitarJesus());
        $rowPanel = new RowPanel($wrapperPanel->getComponent());
        return $rowPanel->getComponent();
    }

}
