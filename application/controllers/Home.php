<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->template->set_platform('public');
        $this->template->set_theme('belancon');        
    }

    public function index()
    {       

        $this->template->set_title('Belancon | Belanja Icon untuk Kebutuhan Desainmu');
        $this->template->set_meta('author','Angga Risky');
        $this->template->set_meta('keyword','Download free Icons, Download Icon Gratis, Flat Icon Gratis');
        $this->template->set_meta('description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');
            
        $this->_loadcss();
        $this->_loadjs();
        $this->_loadpart();
        $this->_load_script();

        $this->template->set_layout('layouts/main');
        $this->template->set_content('pages/site/home');
        $this->template->render();
    }

    public function result()
    {       
        $data['searchText'] = $this->input->get('search', true);
        
        $this->template->set_title('Belancon | Belanja Icon untuk Kebutuhan Desainmu');
        $this->template->set_meta('author','Angga Risky');
        $this->template->set_meta('keyword','Download free Icons, Download Icon Gratis, Flat Icon Gratis');
        $this->template->set_meta('description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');

        $this->_loadcss();
        $this->_loadjs();
        $this->_loadpart();
        $this->_load_script();
        
        $this->template->set_layout('layouts/main');
        $this->template->set_content('pages/site/result', $data);
        $this->template->render();
    }

    protected function _loadpart() {
        $this->template->set_part('header', '_parts/header');  
        $this->template->set_part('navbar', '_parts/navbar'); 
        $this->template->set_part('loader', '_parts/loader');
        $this->template->set_part('notification', '_parts/notification');
        $this->template->set_part('footer', '_parts/footer');
    }

    protected function _loadcss() {
        $this->template->set_css('bootstrap.css');
        $this->template->set_css('sweetalert.css'); 
        $this->template->set_css('toastr.css');  
        $this->template->set_css('style.css');            
        $this->template->set_css('font-awesome.css');
    }

    protected function _loadjs() {
        $this->template->set_js('jquery-1.12.1.min.js','header');
        $this->template->set_js('bootstrap.js','footer');
        $this->template->set_js('sweetalert.min.js','footer');    
        $this->template->set_js('toastr.js','footer');
    }

    protected function _load_script() {
        $path = base_url().'js/';

        $this->template->set_js($path.'general.js','footer', 'remote');
        $this->template->set_js($path.'user.js','footer', 'remote');
        $this->template->set_js($path.'icon.js','footer', 'remote');
        $this->template->set_js($path.'cart.js','footer', 'remote');
        $this->template->set_js($path.'script.js','footer', 'remote');
    }
}