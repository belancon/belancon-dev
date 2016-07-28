<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contributor extends CI_Controller {

    protected $email_belancon = "hello@belancon.com";

	function __construct()
    {
        parent::__construct();
        $this->load->library(array('template','form_validation'));
        $this->load->helper('form');
        $this->template->set_platform('public');
        $this->template->set_theme('belancon');  
        $this->load->library('user_belancon');
    }

    public function join() {    	
        $this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('skill', 'Keahlian', 'required');
        $this->form_validation->set_rules('message', 'Pesan', 'required|min_length[10]');
        $this->form_validation->set_rules('g-recaptcha-response', '<b>Captcha</b>', 'callback_getResponseCaptcha');

        $this->form_validation->set_message('required', '{field} harus diisi');
        $this->form_validation->set_message('valid_email', 'Alamat {field} tidak valid');
        $this->form_validation->set_message('min_length', '{field} tidak boleh kurang dari {param} karakter.');


        if ($this->form_validation->run() == FALSE) {
            $this->_load_view();
        } else {
            $fullname = $this->input->post('fullname');
            $email = $this->input->post('email');
            $skill = $this->input->post('skill');
            $message = strip_tags($this->input->post('message'));

            $this->_send_email($fullname, $email, $skill, $message);
            //$this->_load_view('contributor_join_view');
        }
    }

    protected function _send_email($fullname, $email, $skill, $message) {        
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://poseidon.hideserver.net',
            'smtp_user' => $this->email_belancon,
            'smtp_pass' => 'belancon123a',
            'smtp_port' => 465,      
            'mailtype'  => 'html',        
            'charset'   => 'iso-8859-1',
            'starttls'  => true,
            'newline'   => "\r\n"
        );

            $subject = "Request Join as Contributor";
            
            $this->load->model('contributor_model');
            $this->load->library('email', $config);
            $this->email->from($this->email_belancon);                        
            $this->email->to('anggariskysetiawan@gmail.com');
            $this->email->cc('rizqimaulana.1988@gmail.com');
            $this->email->cc('belancon.dev@gmail.com');
            $this->email->subject($subject);
            $data = array( 'fullname' => $fullname, 'email' => $email, 'skill' => $skill, 'message' => $message);

            $body = $this->load->view('_templates/request_join_email', $data, TRUE);

            $this->email->message( $body );

            if ($this->email->send()) {
                
                $data = array(
                    'fullname' => $fullname,
                    'email' => $email,
                    'skill' => $skill,
                    'message' => $message,                    
                );

                $id = $this->contributor_model->insert($data);             

                if($id) {
                    $this->session->set_flashdata('success_message', 'Terima kasih telah mengirimkan permintaan gabung sebagai kontributor');
                } else {
                    $this->session->set_flashdata('error_message', 'Error System');
                }

                redirect('/');
            } else {
                $this->session->set_flashdata('error_message', 'Failed send email');
                redirect('/');
                //show_error($this->email->print_debugger(), true);
            }
    }

    protected function _load_view() {
        $this->load->library('recaptcha');

        $this->template->set_title('Belancon | Belanja Icon untuk Kebutuhan Desainmu');
        $this->template->set_meta('author','Angga Risky');
        $this->template->set_meta('keyword','Download free Icons, Download Icon Gratis, Flat Icon Gratis');
        $this->template->set_meta('description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');

        
        $breadcrumb = array(
            array(
                'name' => 'Home',
                'path' => site_url()
            ),
            array(
                'name' => 'Kontributor',
                'path' => null
            )
        );
        $this->template->set_props('breadcrumb', $breadcrumb);

        $this->_loadcss();
        $this->_loadjs();
        $this->_loadpart();
        $this->_loadscript();
        $this->template->set_layout('layouts/custom');
        
        $data['recaptcha_html'] = $this->recaptcha->render();
        $this->template->set_content('pages/form/join_contributor', $data);
        $this->template->render();
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

    protected function _loadpart() {       
        $this->template->set_part('navbar', '_parts/navbar'); 
        $this->template->set_part('loader', '_parts/loader');
        $this->template->set_part('notification', '_parts/notification');
        $this->template->set_part('footer', '_parts/footer');
    }

    public function _loadscript() {
        $path = base_url().'js/';

        $this->template->set_js($path.'general.js','footer', 'remote');
        $this->template->set_js($path.'user.js','footer', 'remote');
        $this->template->set_js($path.'icon.js','footer', 'remote');
        $this->template->set_js($path.'cart.js','footer', 'remote');
        $this->template->set_js($path.'page-statis.js','footer', 'remote');
    }

    public function getResponseCaptcha($str){
        $this->load->library('recaptcha');
        $response = $this->recaptcha->verifyResponse($str);
        if ($response['success'])
        {     
            return true;
        }     
        else
        {
            $this->form_validation->set_message('getResponseCaptcha', '%s harus diisi' );
            return false;
        }
    }
}