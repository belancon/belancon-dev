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

        $this->template->set_css('bootstrap.css');
        $this->template->set_css('sweetalert.css');  
        $this->template->set_css('style.css');            
        $this->template->set_css('font-awesome.css');
        $this->template->set_js('https://code.jquery.com/jquery-1.12.1.min.js','header','remote');
        $this->template->set_js('bootstrap.js','footer');
        $this->template->set_js('sweetalert.min.js','footer');       
        
        $this->template->set_layout('home_view');
        $this->template->render();
    }

    public function result()
    {       
        $data['searchText'] = $this->input->get('search', true);
        
        $this->template->set_title('Belancon | Belanja Icon untuk Kebutuhan Desainmu');
        $this->template->set_meta('author','Angga Risky');
        $this->template->set_meta('keyword','Download free Icons, Download Icon Gratis, Flat Icon Gratis');
        $this->template->set_meta('description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');

        $this->template->set_css('bootstrap.css');
        $this->template->set_css('sweetalert.css');  
        $this->template->set_css('style.css');            
        $this->template->set_css('font-awesome.css');
        $this->template->set_js('https://code.jquery.com/jquery-1.12.1.min.js','header','remote');
        $this->template->set_js('bootstrap.js','footer');
        $this->template->set_js('sweetalert.min.js','footer');
        
        $this->template->set_layout('result_view');
        $this->template->render($data);
    }
}