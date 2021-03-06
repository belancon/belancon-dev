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
        $this->load->model('contributor_model');
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

            $data = array(
                'fullname' => $fullname,
                'email' => $email,
                'skill' => $skill,
                'message' => $message, 
                'email_sent' => FALSE
            );

            $id = $this->contributor_model->insert($data);

            if($id) {
                $this->session->set_flashdata('success_message', 'Terima kasih telah mengirimkan permintaan gabung sebagai kontributor');

                $result = $this->_send_email($fullname, $email, $skill, $message);

                if($result) {
                    $this->contributor_model->set_email_sent($id);
                }
                
                redirect('/', 'refresh');
            } else {
                $this->session->set_flashdata('error_message', 'Maaf, ada kesalahan sistem. gagal mengirimkan pesan');
                redirect('/', 'refresh');
            }
            
        }
    }

    protected function _send_email($fullname, $email, $skill, $message) {    
            $config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'belancon.dev@gmail.com',
			'smtp_pass' => 'mohokuoso',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1',
			'starttls'  => true,
			'crlf'      => "\r\n",
			'wordwrap' => TRUE,
		        'newline'   => "\r\n"
		);

            $subject = "Request Join as Contributor";            
            $this->load->library('email');
            $this->email->initialize($config);  
            $this->email->set_newline("\r\n"); 
            $this->email->from($this->email_belancon);                        
            $this->email->to('belancon.dev@gmail.com');                    
            $this->email->subject($subject);
            $data = array( 'fullname' => $fullname, 'email' => $email, 'skill' => $skill, 'message' => $message);

            $body = $this->load->view('_templates/request_join_email', $data, TRUE);

            $this->email->message( $body );

            if ($this->email->send()) {
                return TRUE;
            } else {
                show_error($this->email->print_debugger());
                return FALSE;
            }
    }

    protected function _load_view() {
        $this->load->library('recaptcha');

        $this->template->set_title('Belancon | Belanja Icon untuk Kebutuhan Desainmu');
        $this->template->set_meta('author','Belancon Team');
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
        $this->template->set_css('bootstrap.min.css');
        $this->template->set_css('sweetalert.min.css'); 
        $this->template->set_css('toastr.min.css');  
        $this->template->set_css('font-awesome.min.css');
        $this->template->set_css('style.css');
    }

    protected function _loadjs() {       
        $this->template->set_js('bootstrap.min.js','footer');
        $this->template->set_js('sweetalert.min.js','footer');    
        $this->template->set_js('toastr.min.js','footer');
        $this->template->set_js('navscroll.js','footer');
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