<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('template', 'form_validation'));
        $this->template->set_platform('public');
        $this->template->set_theme('belancon');        
        $this->load->model('feedback_model');
    }

    public function index()
    {               
        $this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');    
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
            $message = $this->input->post('message');

            $data = array(
                'name' => $fullname,
                'email' => $email,
                'message' => $message
            );

            $result = $this->feedback_model->insert($data);

            if($result) {
                $this->session->set_flashdata('success_message', 'Feedback berhasil dikirim');
                redirect('/');
            } else {
                $this->session->set_flashdata('error_message', 'Feedback gagal dikirim');
                redirect('feedback');
            }
        }
    }

    protected function _load_view() {
        $this->load->helper('form');
        $this->load->library('recaptcha');

        $data['recaptcha_html'] = $this->recaptcha->render();
        $this->template->set_title('Belancon | Belanja Icon untuk Kebutuhan Desainmu');
        $this->template->set_meta('author','Angga Risky');
        $this->template->set_meta('keyword','Download free Icons, Download Icon Gratis, Flat Icon Gratis');
        $this->template->set_meta('description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');

        $this->template->set_css('bootstrap.css');
        $this->template->set_css('sweetalert.css');  
        $this->template->set_css('toastr.css');  
        $this->template->set_css('style.css');            
        $this->template->set_css('font-awesome.css');
        $this->template->set_js('jquery-1.12.1.min.js','header');
        $this->template->set_js('bootstrap.js','footer');
        $this->template->set_js('sweetalert.min.js','footer');
        $this->template->set_js('toastr.js','footer');
        
        $this->template->set_layout('give_feedback_view.php');
        $this->template->render($data);
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