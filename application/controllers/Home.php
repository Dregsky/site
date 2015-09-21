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
        $dados['banners'] = array(
            linkPath('#', 'principal/450Almas.960x268.png'),
            linkPath('#', 'principal/AtividadesAdcruz.960x268.png'),
            linkPath('#', 'principal/Discipulado.960x268.png'),
            linkPath('#', 'principal/Etuseumabencao.960x268.png'),
            linkPath('#', 'principal/MesdeOracao.960x268.png'),
            linkPath('#', 'principal/SextadaVitoria.960x268.png'),
            linkPath('#', 'principal/TemaAno.960x268.png'),
        );
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
        $dados['comunicados'] = $comunicadoModel->retrieveUltimos(5);
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
    private function includePanel2() {
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
    private function includePanel3() {
        $col1 = $this->noticiaCol(DepartamentoEnum::ANG);
        $col2 = $this->noticiaCol(DepartamentoEnum::EBD);
        $col3 = $this->noticiaCol(DepartamentoEnum::JTV);
        $indexCol = new IndexColsPanel($col1, $col2, $col3);
        $rowPanel = new RowPanel($indexCol->getComponent());
        return $rowPanel->getComponent();
    }

    private function noticiaCol($idDepartamento) {
        $noticiaModel = new NoticiaModel();
        $departamentoModel = new DepartamentoModel();
        $noticias = $noticiaModel->retrieveUltimasAtivasByDepartamento($idDepartamento, 2);
        $departamento = $departamentoModel->retrieve($idDepartamento);
        $col = new ColNoticiaPanel($departamento, $noticias);
        $aux = new AuxComponet($col->getComponent());
        return $aux;
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
        $dados['agenda'] = '<iframe src="https://www.google.com/calendar/embed?title=Calend%C3%A1rio%20de%20Atividades%20ADCruz&amp;'
                . 'showCalendars=0&amp;height=400&amp;wkst=1&amp;'
                . 'hl=pt_BR&amp;bgcolor=%23FFFFFF&amp;src=69gj215aqna07lr9gv3bsv2dt0%40group.calendar.google.com&amp;'
                . 'color=%23d9ce16&amp;ctz=America%2FSao_Paulo" '
                . 'style=" border-width:0 " width="940" height="400" frameborder="0" scrolling="no">'
                . '</iframe>';
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
