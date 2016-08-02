<?php

class Site extends CI_Controller 
{
	function __construct() {
        	parent::__construct();
        	$this->load->library(array('template')); //load library template
                $this->template->set_platform('public');
                $this->template->set_theme('belancon');                
	}

	public function how_to_download() {
        	//untuk menset title page
        	$this->template->set_title('Belancon | Belanja Icon untuk Kebutuhan Desainmu');
        	//set meta tag
                $this->template->set_meta('author','Angga Risky');
                $this->template->set_meta('keyword','Download free Icons, Download Icon Gratis, Flat Icon Gratis');
                $this->template->set_meta('description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');
                $breadcrumb = array(
                    array(
                        'name' => 'Home',
                        'path' => site_url()
                    ),
                    array(
                        'name' => 'Cara Download Icon',
                        'path' => null
                    )
                );
                $this->template->set_props('breadcrumb', $breadcrumb);
               
                $this->_loadcss();
                $this->_loadjs();
                $this->_loadpart();
                $this->_loadscript();
                //set layout
                $this->template->set_layout('layouts/custom');
                $this->template->set_content('pages/static/how_to_download'); // nama file page nya, tanpa extension php
                $this->template->render(); // terakhir render
	}

        public function page_404() {
                //untuk menset title page
                $this->template->set_title('Belancon | Belanja Icon untuk Kebutuhan Desainmu');
                //set meta tag
                $this->template->set_meta('author','Angga Risky');
                $this->template->set_meta('keyword','Download free Icons, Download Icon Gratis, Flat Icon Gratis');
                $this->template->set_meta('description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');
               
                $this->_loadcss();
                $this->_loadjs();
                $this->_loadpart();
                $this->_loadscript();
                //set layout
                $this->template->set_layout('layouts/custom_without_breadchumb');
                $this->template->set_content('pages/static/404'); // nama file page nya, tanpa extension php
                $this->template->render(); // terakhir render
        }

        public function privacy_policy() {
                //untuk menset title page
                $this->template->set_title('Belancon | Belanja Icon untuk Kebutuhan Desainmu');
                //set meta tag
                $this->template->set_meta('author','Angga Risky');
                $this->template->set_meta('keyword','Download free Icons, Download Icon Gratis, Flat Icon Gratis');
                $this->template->set_meta('description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');
                
                $breadcrumb = array(
                    array(
                        'name' => 'Home',
                        'path' => site_url()
                    ),
                    array(
                        'name' => 'Kebijakan Privasi',
                        'path' => null
                    )
                );
                $this->template->set_props('breadcrumb', $breadcrumb);
               
                $this->_loadcss();
                $this->_loadjs();
                $this->_loadpart();
                $this->_loadscript();
                //set layout
                $this->template->set_layout('layouts/custom');
                $this->template->set_content('pages/static/privacy_policy'); // nama file page nya, tanpa extension php
                $this->template->render(); // terakhir render
        }

        public function term_of_service() {
                //untuk menset title page
                $this->template->set_title('Belancon | Belanja Icon untuk Kebutuhan Desainmu');
                //set meta tag
                $this->template->set_meta('author','Angga Risky');
                $this->template->set_meta('keyword','Download free Icons, Download Icon Gratis, Flat Icon Gratis');
                $this->template->set_meta('description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');
                $breadcrumb = array(
                    array(
                        'name' => 'Home',
                        'path' => site_url()
                    ),
                    array(
                        'name' => 'Syarat & Ketentuan',
                        'path' => null
                    )
                );
                $this->template->set_props('breadcrumb', $breadcrumb);
               
                $this->_loadcss();
                $this->_loadjs();
                $this->_loadpart();
                $this->_loadscript();
                //set layout
                $this->template->set_layout('layouts/custom');
                $this->template->set_content('pages/static/term_of_service'); // nama file page nya, tanpa extension php
                $this->template->render(); // terakhir render
        }

        protected function _loadpart() {       
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

        public function _loadscript() {
            $path = base_url().'js/';

            $this->template->set_js($path.'general.js','footer', 'remote');
            $this->template->set_js($path.'user.js','footer', 'remote');
            $this->template->set_js($path.'icon.js','footer', 'remote');
            $this->template->set_js($path.'cart.js','footer', 'remote');
            $this->template->set_js($path.'page-statis.js','footer', 'remote');
        }
}