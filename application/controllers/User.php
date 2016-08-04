<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        
        $this->load->library(array('user_belancon','template', 'form_validation'));
        $this->load->helper('form');
        $this->template->set_platform('public');
        $this->template->set_theme('belancon'); 

        $this->form_validation->set_error_delimiters('', '</br>');
    }

    public function login() {
        if($this->ion_auth->logged_in()) {
            redirect('/');
        } else {
            // $this->template->set_title('Belancon | Login');
            // $this->_loadcss();
            // $this->_loadjs();        
            // //set layout
            // $this->template->set_layout('layouts/basic');
            // //set content/page
            // $this->template->set_content('pages/form/login');
            // $this->template->render();

            //untuk menset title page
            $this->template->set_title('Belancon | Masuk');
            //set meta tag
            $this->template->set_meta('author','Belancon Team');
            $this->template->set_meta('keyword','Download free Icons, Download Icon Gratis, Flat Icon Gratis');
            $this->template->set_meta('description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');

            $breadcrumb = array(
                array(
                    'name' => 'Home',
                    'path' => site_url()
                ),
                array(
                    'name' => 'Masuk',
                    'path' => null
                )
            );

            $this->template->set_props('breadcrumb', $breadcrumb);

            $this->_loadcss();
            $this->_loadjs();
            $this->_loadpart();
            $this->template->set_part('script', '_scripts/login');
            $this->_loadscript();
            //set layout
            $this->template->set_layout('layouts/custom');
            $this->template->set_content('pages/form/login'); // nama file page nya, tanpa extension php
            $this->template->render(); // terakhir render
        }
    }

    public function register() {
        if($this->ion_auth->logged_in()) {
            redirect('/');
        } else {
            //untuk menset title page
            $this->template->set_title('Belancon | Daftar');
            //set meta tag
            $this->template->set_meta('author','Belancon Team');
            $this->template->set_meta('keyword','Download free Icons, Download Icon Gratis, Flat Icon Gratis');
            $this->template->set_meta('description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');

            $breadcrumb = array(
                array(
                    'name' => 'Home',
                    'path' => site_url()
                ),
                array(
                    'name' => 'Daftar',
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
            $this->template->set_content('pages/form/register'); // nama file page nya, tanpa extension php
            $this->template->render(); // terakhir render
        }
    }

    public function do_login() {
        //validate form input
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');
        //set message
        $this->form_validation->set_message('required', '{field} harus diisi');

        if ($this->form_validation->run() === true)
        {
            // check to see if the user is logging in
            // check for "remember me"
            $remember = (bool) $this->input->post('remember');
            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
            {
                //if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('success_message', $this->ion_auth->messages());
                echo json_encode(array('status' => true));
            }
            else
            {
                // if the login was un-successful                
                echo json_encode(array('status' => false, 'message' => $this->ion_auth->errors()));
            }
        }
        else
        {
            $message = validation_errors();
            
            echo json_encode(array('status' => false, 'message' => $message));
        }
    }

    // log the user out
    public function logout()
    {
        // log the user out
        $logout = $this->ion_auth->logout();

        // redirect them to the login page
        $this->session->set_flashdata('success_message', $this->ion_auth->messages());
        redirect('login', 'refresh');
    }

    protected function _loadpart() {       
        $this->template->set_part('navbar', '_parts/navbar');
        $this->template->set_part('loader', '_parts/loader');
        $this->template->set_part('notification', '_parts/notification');
        $this->template->set_part('footer', '_parts/footer');
    }

    protected function _loadcss() {
        $this->template->set_css('bootstrap.min.css');
        $this->template->set_css('sweetalert.min.css');
        $this->template->set_css('toastr.min.css');
        $this->template->set_css('style.css');
        $this->template->set_css('font-awesome.min.css');
    }

    protected function _loadjs() {
        $this->template->set_js('bootstrap.min.js','footer');
        $this->template->set_js('sweetalert.min.js','footer');
        $this->template->set_js('toastr.min.js','footer');
    }

    public function _loadscript() {
        $path = base_url().'js/';
        $this->template->set_js($path.'general.js','footer', 'remote');
        $this->template->set_js($path.'icon.min.js','footer', 'remote');
        $this->template->set_js($path.'cart.min.js','footer', 'remote');
        $this->template->set_js($path.'page-statis.js','footer', 'remote');
    }

    public function set_token() {    	
    	$result = $this->user_belancon->generate_token();
    	
    	echo json_encode(array('ipaddress' => $result['ipaddress'], 'token'=> $result['token']));	
    }
}