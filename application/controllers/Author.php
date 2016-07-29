<?php

class Author extends CI_Controller 
{
	function __construct() {
		parent::__construct();
		$this->load->library(array('template')); //load library template
        $this->template->set_platform('public');
        $this->template->set_theme('belancon');                
	}

	public function index() {
		//untuk menset title page
		$this->template->set_title('Belancon | Belanja Icon untuk Kebutuhan Desainmu');
		//set meta tag
        $this->template->set_meta('author','Angga Risky');
        $this->template->set_meta('keyword','Download free Icons, Download Icon Gratis, Flat Icon Gratis');
        $this->template->set_meta('description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');

        //set external css
        $this->template->set_css('bootstrap.css');
        $this->template->set_css('sweetalert.css');  
        $this->template->set_css('toastr.css');  
        $this->template->set_css('style.css');            
        $this->template->set_css('font-awesome.css');
        //set external js
        $this->template->set_js('jquery-1.12.1.min.js','header');
        $this->template->set_js('bootstrap.js','footer');
        $this->template->set_js('sweetalert.min.js','footer');       
        $this->template->set_js('toastr.js','footer');
        
        //set layout
        $this->template->set_layout('author_view'); // nama file page nya, tanpa extension php
        $this->template->render(); // terakhir render
	}
}