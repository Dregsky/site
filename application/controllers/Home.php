<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Use enums\TipoStatus;
Use enums\DepartamentoEnum;

/**
 * @property Doctrine $doctrine Biblioteca ORM
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
class Home extends Principal_Controller {

    /**
     * Método Construtor
     */
    public function Home() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function getCustomPage() {
        /**
         * Includes de models
         */
        $this->load->model('EntitiesModels/NoticiaModel', 'noticiaModel');
        $this->load->model('EntitiesModels/DepartamentoModel');
        $this->load->model('EntitiesModels/SlideModel');
        /**
         * Includes de components
         */
        $this->load->component('panels/Wrapper1Panel');
        $this->load->component('AuxComponet');
        $this->load->component('panels/IndexColsPanel');
        $this->load->component('panels/RowPanel');
        $this->load->component('panels/integrados/RowWrapper1Panel');
        $this->load->component('panels/ColNoticiaPanel');
        /**
         * criação de panels
         */
        $dados['slide'] = $this->includeSlide();
        $dados['panel1'] = $this->includePanel1();
        $dados['panel2'] = $this->includePanel2();
        $dados['panel3'] = $this->includePanel3();
        $dados['panel4'] = $this->includePanel4();
        $dados['panel5'] = $this->includePanel5();
        $dados['panel6'] = $this->includePanel6();

        return $this->load->view('home/home_page', $dados, true);
    }

    private function includeSlide() {
        $dados['banners'] = (new SlideModel())->retrieveAllAtivos();
        return $this->load->view('components/slide_comp', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    private function includePanel1() {
        $col1 = new AuxComponet($this->faleComOPastor());
        $col2 = new AuxComponet($this->includeComunicados());
        $col3 = new AuxComponet($this->cultoLar());
        $indexColsPanel = new IndexColsPanel($col1, $col2, $col3);
        $rowPanel = new RowPanel($indexColsPanel->getComponent());
        return $rowPanel->getComponent();
    }

    /**
     * 
     * @return string contendo o html do fale com o pastor
     */
    private function faleComOPastor() {
        $dados = linkPath(base_url('diversos/pastor'), 'public/images/home/fale_com_pastor.png');
        $dados['class'] = '';
        return $this->load->view('home/imgLink_comp', $dados, true);
    }

    /**
     * 
     * @return string contendo o html comunicados
     */
    private function includeComunicados() {
        $this->load->model('EntitiesModels/ComunicadoModel', 'comunicadoModel');
        $comunicadoModel = new ComunicadoModel();
        $dados['comunicados'] = $comunicadoModel->retrieveUltimos(6);
        $dados['dataHoje'] = $dataHoje = date("Y-m-d");
        return $this->load->view('home/comunicados_comp', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do fale com o pastor
     */
    private function cultoLar() {
        $dados = linkPath(base_url('diversos/CultoNoLar'), 'public/images/home/cultoLar.jpg');
        $dados['class'] = 'img-culto-lar';
        return $this->load->view('home/imgLink_comp', $dados, true);
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
    private function includePanel3() {
        $panel = new RowWrapper1Panel($this->aceitarJesus());
        return $panel->getComponent();
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
    private function includePanel2() {
        $dados['noticias'] = array(
            $this->noticiaCol(DepartamentoEnum::ANG),
            $this->noticiaCol(DepartamentoEnum::EBD),
            $this->noticiaCol(DepartamentoEnum::JTV),
            $this->noticiaCol(DepartamentoEnum::CIBE),
            $this->noticiaCol(DepartamentoEnum::CVKIDS),
            $this->noticiaCol(DepartamentoEnum::FAMILIA),
            $this->noticiaCol(DepartamentoEnum::LIV),
            $this->noticiaCol(DepartamentoEnum::MGD),
            $this->noticiaCol(DepartamentoEnum::MISSOES),
            $this->noticiaCol(DepartamentoEnum::ORQUESTRA)
        );
        $slide = $this->load->view('home/noticiasScroll_comp', $dados, true);
        $rowPanel = new RowPanel($slide);
        return $rowPanel->getComponent();
    }

    private function noticiaCol($idDepartamento) {
        $noticiaModel = new NoticiaModel();
        $departamentoModel = new DepartamentoModel();
        $noticias = $noticiaModel->retrieveUltimasAtivasByDepartamento($idDepartamento, 2);
        $departamento = $departamentoModel->retrieve($idDepartamento);
        $col = new ColNoticiaPanel($departamento, $noticias);
        return $col->getComponent();
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    private function includePanel4() {
        $panel = new RowWrapper1Panel('');
        return $panel->getComponent();
    }

    private function videos() {
        $this->load->component('panels/YoutubeVideoPanel');
        $youtubeVideo2 = 'http://www.youtube.com/watch?v=woD9b2BKeuk';
        //$youtubeVideo3 = 'http://www.youtube.com/watch?v=k3zYIlJFRyo';
        $youtubeVideo4 = 'http://www.youtube.com/watch?v=5sIAI3f8r00';
        //$youtubeVideo5 = 'http://www.youtube.com/watch?v=I24jgbgLckc';
        //$youtubeVideo6 = 'http://www.youtube.com/watch?v=L7SnCLvOPFA&list=HL1346070363&feature=mh_lolz';
        //$youtubeVideo7 = 'http://youtu.be/DuYDIERIG2g';

        $video1 = new YoutubeVideoPanel($youtubeVideo2);
        $video2 = new YoutubeVideoPanel($youtubeVideo4);

        return $video1->getComponent() . $video2->getComponent();
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    private function includePanel5() {
        $panel = new RowWrapper1Panel($this->agenda());
        return $panel->getComponent();
    }

    private function agenda() {
        $agenda1 = (new DepartamentoEnum())
                        ->retrieveReferencedEntity(DepartamentoEnum::IGREJA
                        )->getAgendaGoogle();
        $agenda = json_decode($agenda1);
        $dados['agenda'] = isset($agenda->agenda) ? $agenda->agenda : $agenda1;
        $dados['tipo'] = isset($agenda->tipo) ? $agenda->tipo : 'WEEK';
        $dados['altura'] = '400';
        return $this->load->view('components/agenda_comp', $dados, true);
    }

    /**
     * 
     * @return string contendo o html do panel
     */
    private function includePanel6() {
        $panel = new RowWrapper1Panel($this->palavraDoPastor());
        return $panel->getComponent();
    }

    private function palavraDoPastor() {
        return $this->load->view('home/palavraDoPastor_comp', '', true);
    }

    public function getMenuSelecionado() {
        return 'principal';
    }

}
