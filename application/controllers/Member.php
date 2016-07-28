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

    public function do_add_icon() {        
        $this->load->model('icon_model');

        $this->form_validation->set_rules('name', 'Nama', 'required|min_length[3]');
        $this->form_validation->set_rules('category', 'Kategori', 'required|min_length[3]');
        $this->form_validation->set_rules('type', 'Tipe', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'integer');

        if($this->form_validation->run() === true) {
            //check file
            $png = 'filepng';
            $psd = 'filepsd';
            $ai = 'fileai';
            $file_png = $_FILES[$png];
            $file_psd = $_FILES[$psd];
            $file_ai = $_FILES[$ai];

            if($file_png['name'] == '' || $file_psd['name'] == '' || $file_ai['name'] == '') {
                echo json_encode(array('status'=> false, 'message' => 'File PNG, PSD, and AI is required'));
            } else {
                //====== UPLOAD FILE =====//
                //insert file png
                $config_png = array(
                    'upload_path' => $this->config->item('upload_path')."png/",
                    'allowed_types' => 'png',
                    'max_size' => '2000',
                    'encrypt_name' => true
                );

                $result_png = $this->_upload_file($png, $file_png, $config_png);
                //insert file psd
                $config_psd = array(
                    'upload_path' => $this->config->item('upload_path')."psd/",
                    'allowed_types' => 'psd',
                    'max_size' => '2000',
                    'encrypt_name' => true
                );
                $result_psd = $this->_upload_file($psd, $file_psd, $config_psd);
                //insert file ai
                $config_ai = array(
                    'upload_path' => $this->config->item('upload_path')."ai/",
                    'allowed_types' => 'ai|eps',
                    'max_size' => '2000',
                    'encrypt_name' => true
                );
                $result_ai = $this->_upload_file($ai, $file_ai, $config_ai);
                //====== END UPLOAD FILE =====//
                
                //check upload file 
                if($result_png['status'] === true && $result_psd['status'] === true && $result_ai['status'] === true) {
                    //if upload files success
                    //get filenames
                    $files = array($result_png['filename'], $result_psd['filename'], $result_ai['filename']);

                    //===== INSERT ICON INTO TABLE =====//
                    $name = $this->input->post('name', true);
                    $category = $this->input->post('category', true);
                    $tags = $this->input->post('tags', true);
                    $type = $this->input->post('type', true);
                    $price = $this->input->post('price', true);

                    $data = array(
                        'name' => $name,
                        'category' => $category,
                        'tags' => preg_replace('/\s+/', '', $tags),
                        'type' => $type,
                        'price' => $price,
                        'created_by' => user_login('id'),
                        'created_at' => date("Y-m-d H:i:s"),
                        'default_image' => $result_png['filename']
                    );

                    //call method model
                    $result = $this->icon_model->insert($data, $files);

                    if($result) {
                        $this->session->set_flashdata('success_message', 'Berhasil menambah icon');
                        $response = array('status' => true);
                    } else {
                        $response = array('status' => false , 'message' => 'Gagal Menambah icon');
                    }

                    echo json_encode($response);
                    //===== END INSERT ICON INTO TABLE =====//

                } else {
                    //if upload files failed or error
                    $message = $result_png['error']."<br />".$result_psd['error']."<br />".$result_ai['error'];

                    echo json_encode(array('status' => false, 'message' => $message));
                }
            }   
        } else {
            echo json_encode(array('status' => false, 'message' => validation_errors()));
        }
    }

    protected function _upload_file($name, $file, $config) {
        //process upload picture
        $this->load->library('upload');
        $this->upload->initialize($config);
        //validation upload false
        if(!$this->upload->do_upload($name))
        {
            $response = array(
                'status'  => false,
                'error' => $this->upload->display_errors()
            );
            
            return $response;
        }
        else//validation upload true/success
        {
            $upload    = $this->upload->data();
            $filename  = $upload['file_name'];

            $response = array(
                'status' => true,
                'filename' => $filename,
                'error' => ''
            );

            if($upload['file_ext'] === '.png') {
                $config = array(
                    'width'     => 80,
                    'height'    => 80,
                    'x_axis'    => '0',
                    'y_axis'    => '0',
                    'new_path'  => $this->config->item('upload_path')."thumbnail/"
                );

                $result = $this->_resize_image($config, $upload);
            }
        
            return $response;
        }
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
        $this->template->set_js($path.'page-statis.js','footer', 'remote');
    }
}