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
            $this->template->set_title('Belancon | Login');
            $this->_loadcss();
            $this->_loadjs();        
            //set layout
            $this->template->set_layout('layouts/basic');
            //set content/page
            $this->template->set_content('pages/form/login');
            $this->template->render();
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

    protected function _loadcss() {
        $this->template->set_css('bootstrap.css');       
        $this->template->set_css('style.css');            
        $this->template->set_css('font-awesome.css');
    }

    protected function _loadjs() {
        $this->template->set_js('jquery-1.12.1.min.js','header');
        $this->template->set_js('bootstrap.js','footer');        
    }

    public function set_token() {    	
    	$result = $this->user_belancon->generate_token();
    	
    	echo json_encode(array('ipaddress' => $result['ipaddress'], 'token'=> $result['token']));	
    }
}