<?php

class Author extends CI_Controller 
{
	function __construct() {
		parent::__construct();
		$this->load->library(array('template')); //load library template
                $this->template->set_platform('public');
                $this->template->set_theme('belancon');                
                $this->load->model('user_model');
                $this->load->helper('dateindo');
	}

	public function index($url) {
                if(!isset($url)) {
                   redirect('/');
                }

                //get_user
                $user = $this->user_model->get_one(array('url' => $url));

                if(!$user) {
                   redirect('/');
                } else {
                        $data['user'] = $user;
        		//untuk menset title page
        		$this->template->set_title('Belancon | Belanja Icon untuk Kebutuhan Desainmu');
        		//set meta tag
                        $this->template->set_meta('author','Angga Risky');
                        $this->template->set_meta('keyword','Download free Icons, Download Icon Gratis, Flat Icon Gratis');
                        $this->template->set_meta('description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');

                        $this->_loadcss();
                        $this->_loadjs();
                        $this->_loadscript();
                        $this->_loadpart();
                        
                        //set layout
                        $this->template->set_layout('layouts/author'); // nama file page nya, tanpa extension php
                        $this->template->set_content('pages/site/author', $data);
                        $this->template->render(); // terakhir render
                }
	}

        protected function _loadcss() {
                //set external css
                $this->template->set_css('bootstrap.css');
                $this->template->set_css('sweetalert.css');  
                $this->template->set_css('toastr.css');  
                $this->template->set_css('style.css');            
                $this->template->set_css('font-awesome.css');
        }

        protected function _loadjs() {
                //set external js
                $this->template->set_js('jquery-1.12.1.min.js','header');
                $this->template->set_js('bootstrap.js','footer');
                $this->template->set_js('sweetalert.min.js','footer');       
                $this->template->set_js('toastr.js','footer');
        }

        public function _loadscript() {
                $path = base_url().'js/';
                $this->template->set_js($path.'general.js','footer', 'remote');
                $this->template->set_js($path.'user.js','footer', 'remote');
                $this->template->set_js($path.'icon.js','footer', 'remote');
                $this->template->set_js($path.'cart.js','footer', 'remote');
                $this->template->set_js($path.'author.js','footer', 'remote');
                $this->template->set_js($path.'page-statis.js','footer', 'remote');
        }

        protected function _loadpart() {       
                $this->template->set_part('navbar', '_parts/navbar'); 
                $this->template->set_part('loader', '_parts/loader');
                $this->template->set_part('notification', '_parts/notification');
                $this->template->set_part('footer', '_parts/footer');
        }
}