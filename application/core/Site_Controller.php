<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Site_Controller
 * @category Site_Controller
 * @package  CodeIgniter
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 */
abstract class Site_Controller extends CI_Controller {

    abstract function getMenu();

    abstract function getCustomPage();

    abstract function getMenuSelecionado();

    /**
     * Constructor of Base Controller
     */
    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');
        enumLoad();
        $body['menu'] = $this->getMenu();
        $body['customPage'] = $this->getCustomPage();
        $dados['body'] = $this->load->view('_inc/body_page', $body, true);
        $footer['fotos'] = $this->getFooterFotos();
        $footer['menuSelecionado'] = $this->getMenuSelecionado();
        $dados['footer'] = $this->load->view('_inc/footer', $footer, true);
        $this->load->view('template_site', $dados);
    }

    private function getFooterFotos() {
        $this->load->model('EntitiesModels/AlbumModel');
        $model = new AlbumModel();
        $dados['albuns'] = $model->retrieveUltimos(2);
        return $this->load->view('_inc/footer_fotos', $dados, true);
    }

}
