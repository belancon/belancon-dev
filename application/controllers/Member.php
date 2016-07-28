<?php

class Member extends MY_Controller 
{
	function __construct() {
        parent::__construct();
        $this->load->library(array('template', 'form_validation')); //load library template
        $this->load->helper(array('form'));
        $this->template->set_platform('public');
        $this->template->set_theme('belancon');    

        $this->_is_private();            
	}

    protected function _is_private() {
        if(!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('error_message', 'Silahkan login sebagai member untuk mengakses halaman member');
            redirect('/');
        }
    }

	
    public function index() {
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
        $this->template->set_layout('layouts/custom');
        $this->template->set_content('pages/member/index'); // nama file page nya, tanpa extension php
        $this->template->render(); // terakhir render
    }

    public function icon() {
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
        $this->template->set_layout('layouts/custom');
        $this->template->set_content('pages/member/icon'); // nama file page nya, tanpa extension php
        $this->template->render(); // terakhir render
    }

    public function profile() {
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
        $this->template->set_layout('layouts/custom');
        $this->template->set_content('pages/member/profile'); // nama file page nya, tanpa extension php
        $this->template->render(); // terakhir render
    }

    public function add_icon() {
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
        $this->template->set_layout('layouts/custom');
        $this->template->set_content('pages/member/_form_add_icon'); // nama file page nya, tanpa extension php
        $this->template->render(); // terakhir render
    }

    public function update_icon($id) {
        $this->load->model('icon_model');
        $data['icon'] = $this->icon_model->get_one($id);
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
        $this->template->set_layout('layouts/custom');
        $this->template->set_content('pages/member/_form_update_icon', $data); // nama file page nya, tanpa extension php
        $this->template->render(); // terakhir render
    }

    public function change_profile() {
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
        $this->template->set_layout('layouts/custom');
        $this->template->set_content('pages/member/_form_update_profile'); // nama file page nya, tanpa extension php
        $this->template->render(); // terakhir render
    }

    public function update_profile() {        
     
        $id = user_login('id');
        $data = array(
            'first_name' => $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'phone' => $this->input->post('phone'),
        );

        $result = $this->ion_auth->update($id, $data);
        if($result) {
            $this->session->set_flashdata('success_message', $this->ion_auth->messages());
            echo json_encode(array('status'=> true));
        } else {
            $message = $this->ion_auth->errors();
            echo json_encode(array('status' => false, 'message' => $message));
        }
    }

    public function change_password() {
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
        $this->template->set_layout('layouts/custom');
        $this->template->set_content('pages/member/_form_update_password'); // nama file page nya, tanpa extension php
        $this->template->render(); // terakhir render
    }

    public function update_password() {
        $this->form_validation->set_rules('old', 'Password Lama', 'required');
        $this->form_validation->set_rules('new', 'Password Baru', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']');
        $this->form_validation->set_rules('new_confirm', 'Konfirmasi Password Baru', 'required|matches[new]');

        $this->form_validation->set_message('required', '{field} harus diisi');
        $this->form_validation->set_message('min_length', '{field} tidak boleh kurang dari {param} karakter.');
        $this->form_validation->set_message('max_length', '{field} tidak boleh lebih dari {param} karakter.');
        $this->form_validation->set_message('matches', '{field} tidak sesuai');        
        $this->form_validation->set_error_delimiters('', '<br />');

        if ($this->form_validation->run() === true) {
            $identity = $this->session->userdata('identity');

            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

            if ($change)
            {
                //if the password was successfully changed
                $this->session->set_flashdata('success_message', $this->ion_auth->messages());
                echo json_encode(array('status' => true));
            }
            else
            {
                $message = $this->ion_auth->errors().". Mungkin Password yang Anda masukkan salah";
                echo json_encode(array('status' => false, 'message' => $message)); 
            }
        } else {
            $message = validation_errors();
            echo json_encode(array('status' => false, 'message' => $message)); 
        }            
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
        $this->template->set_js('bootstrap-filestyle.min.js','footer');
        $this->template->set_js('jquery.validate.min.js', 'footer');   
        $this->template->set_js('additional-methods.min.js', 'footer');   
    }

    public function _loadscript() {
        $path = base_url().'js/';
        $this->template->set_js($path.'general.js','footer', 'remote');
        $this->template->set_js($path.'user.js','footer', 'remote');
        $this->template->set_js($path.'icon.js','footer', 'remote');
        $this->template->set_js($path.'cart.js','footer', 'remote');
        $this->template->set_js($path.'member.js','footer', 'remote');
        $this->template->set_js($path.'page-statis.js','footer', 'remote');

    }
}