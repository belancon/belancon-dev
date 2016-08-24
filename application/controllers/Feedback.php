<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller
{
    protected $email_belancon = "hello@belancon.com";

    protected $id_list_feedback = "57956e0a4ffb5215447f3318";
    protected $id_list_bug = "5784fe7dcc52b65894fdb9a8";

    function __construct()
    {
        parent::__construct();
        $this->load->library(array('template', 'form_validation', 'trello_api'));
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
            $message = strip_tags($this->input->post('message'));

            //insert data to table
            $data = array(
                'name' => $fullname,
                'email' => $email,
                'message' => $message,
                'email_sent' => FALSE
            );

            $id = $this->feedback_model->insert($data);
                        

            if($id) {
                //send feedback to trello card
                $feedback = array(
                    'name' => substr($message, 0, 30).'..',
                    'desc' => '###from : '.$fullname.'.
###email : '.$email.'.
----
feedback : '.$message,           
                    'top' => 'bottom',
                    'due' => null
                );

                $list_id = $this->id_list_feedback;
                $this->trello_api->insert_card($list_id, $feedback);

                //config email
                $config = $this->config->item('sendgrid', 'email');       

                $subject = "Feedback on Belancon";                
                $this->load->library('email');
                $this->email->initialize($config);  
                $this->email->set_newline("\r\n"); 
                $this->email->from($this->email_belancon);                        
                $this->email->to('belancon.dev@gmail.com');            
                $this->email->subject($subject);
                $data = array( 'fullname' => $fullname, 'email' => $email, 'message' => $message);

                $body = $this->load->view('_templates/feedback_email', $data, TRUE);
                $this->email->message( $body );

                //redirect
                $this->session->set_flashdata('success_message', 'Terima kasih feedback anda berhasil terkirim.');

                //send email
                if ($this->email->send()) {
                    //if success
                    $this->feedback_model->set_email_sent($id);
                }

                redirect('/', 'refresh');
            } else {
                $this->session->set_flashdata('error_message', 'Maaf, ada kesalahan sistem. gagal mengirim pesan');
                redirect('/');
            }
        }
    }

    protected function _load_view() {
        $this->load->helper('form');
        $this->load->library('recaptcha');

        $data['recaptcha_html'] = $this->recaptcha->render();
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
                'name' => 'Feedback',
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
        $this->template->set_content('pages/form/give_feedback', $data);
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
        $this->template->set_js($path.'icon.min.js','footer', 'remote');
        $this->template->set_js($path.'cart.min.js','footer', 'remote');
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