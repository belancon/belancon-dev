<?php

class Member extends MY_Controller 
{

    private $_socmed_labels = array(
        'facebook' => 'facebook',
        'twitter' => 'twitter',
        'googleplus' => 'google-plus',
        'behance' => 'behance',
        'dribble' => 'dribble',
        'youtube' => 'youtube',
        'web' => 'web'
    );

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

        $breadcrumb = array(
            array(
                'name' => 'Home',
                'path' => site_url()
            ),
            array(
                'name' => 'Member',
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

        $breadcrumb = array(
            array(
                'name' => 'Home',
                'path' => site_url()
            ),
            array(
                'name' => 'Member',
                'path' => site_url('member')
            ),
            array(
                'name' => 'Icon',
                'path' => null
            ),
        );
        $this->template->set_props('breadcrumb', $breadcrumb);

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

        $breadcrumb = array(
            array(
                'name' => 'Home',
                'path' => site_url()
            ),
            array(
                'name' => 'Member',
                'path' => site_url('member')
            ),
            array(
                'name' => 'Profil',
                'path' => null
            ),
        );
        $this->template->set_props('breadcrumb', $breadcrumb);

        $this->_loadcss();       
        $this->template->set_css('custom.css');
        $this->_loadjs();     
        $this->_loadpart();
        $this->_loadscript();
        //set layout
        $this->template->set_layout('layouts/custom');
        $this->template->set_content('pages/member/profile'); // nama file page nya, tanpa extension php
        $this->template->render(); // terakhir render
    }

    public function add_icon() {
        $this->load->model('category_model');
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
                'name' => 'Member',
                'path' => site_url('member')
            ),
            array(
                'name' => 'Icon',
                'path' => site_url('member/icon')
            ),
            array(
                'name' => 'Tambah',
                'path' => null
            ),
        );
        $this->template->set_props('breadcrumb', $breadcrumb);

        $this->_loadcss();
        $this->_loadjs();
        $this->_loadpart();
        $this->_loadscript();

        //get categories
        $data['categories'] = $this->category_model->get_all();
        //set layout
        $this->template->set_layout('layouts/custom');
        $this->template->set_content('pages/member/_form_add_icon', $data); // nama file page nya, tanpa extension php
        $this->template->render(); // terakhir render
    }

    public function update_icon($id) {
        $this->load->model(array('icon_model', 'category_model'));
        $data['icon'] = $this->icon_model->get_one($id);
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
                'name' => 'Member',
                'path' => site_url('member')
            ),
            array(
                'name' => 'Icon',
                'path' => site_url('member/icon')
            ),
            array(
                'name' => 'Ubah',
                'path' => null
            ),
        );
        $this->template->set_props('breadcrumb', $breadcrumb);

        $this->_loadcss();
        $this->_loadjs();
        $this->_loadpart();
        $this->_loadscript();
        //get categories
        $data['categories'] = $this->category_model->get_all();
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

        $breadcrumb = array(
            array(
                'name' => 'Home',
                'path' => site_url()
            ),
            array(
                'name' => 'Member',
                'path' => site_url('member')
            ),
            array(
                'name' => 'Profil',
                'path' => site_url('member/profile')
            ),
            array(
                'name' => 'Ubah',
                'path' => null
            ),
        );
        $this->template->set_props('breadcrumb', $breadcrumb);

        $this->_loadcss();
        $this->_loadjs();
        $this->_loadpart();
        $this->_loadscript();
        //set layout
        $this->template->set_layout('layouts/custom');
        $this->template->set_content('pages/member/_form_update_profile'); // nama file page nya, tanpa extension php
        $this->template->render(); // terakhir render
    }

    public function setting_link_account() {
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
                'name' => 'Member',
                'path' => site_url('member')
            ),
            array(
                'name' => 'Profil',
                'path' => site_url('member/profile')
            ),
            array(
                'name' => 'Setting Link Akun',
                'path' => null
            ),
        );
        $this->template->set_props('breadcrumb', $breadcrumb);

        $this->_loadcss();
        $this->_loadjs();
        $this->_loadpart();
        $this->_loadscript();
        //set layout
        $this->template->set_layout('layouts/custom');
        $this->template->set_content('pages/member/_form_link_account'); // nama file page nya, tanpa extension php
        $this->template->render(); // terakhir render
    }


    public function update_profile() {     
        $this->load->library('form_validation');


        if(!$this->input->is_ajax_request()) {
            redirect('/');
        }   
        
        $this->form_validation->set_rules('firstname', 'Nama Depan', 'required');
        $this->form_validation->set_message('required', '{field} harus diisi');
        $this->form_validation->set_error_delimiters('', '</br>');

        if($this->form_validation->run() === TRUE) {
            $id = user_login('id');
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $phone = $this->input->post('phone');
            $random_number = mt_rand();
            $url = strtolower($firstname)."_".$random_number;
            $data = array(
                'first_name' => $firstname,
                'last_name' => $lastname,
                'phone' => $phone,
                'url' => $url
            );

            $result = $this->ion_auth->update($id, $data);
            if($result) {
                $this->session->set_flashdata('success_message', $this->ion_auth->messages());
                echo json_encode(array('status'=> true));
            } else {
                $message = $this->ion_auth->errors();
                echo json_encode(array('status' => false, 'message' => $message));
            }
        } else {
            echo json_encode(array('status'=> FALSE, 'message'=> validation_errors()));
        }
    }

    public function save_link_account() {
        $this->load->library('form_validation');
        $this->load->model('usersocmeds_model');

        if(!$this->input->is_ajax_request()) {
            redirect('/');
        }   
        
        $this->form_validation->set_rules('facebook', 'Facebook', 'valid_url');
        $this->form_validation->set_rules('twitter', 'Twitter', 'valid_url');
        $this->form_validation->set_rules('googleplus', 'Google Plus', 'valid_url');
        $this->form_validation->set_rules('behance', 'Behance', 'valid_url');
        $this->form_validation->set_rules('dribble', 'Dribble', 'valid_url');
        $this->form_validation->set_rules('youtube', 'Youtube', 'valid_url');
        $this->form_validation->set_rules('web', 'Web', 'valid_url');
        $this->form_validation->set_message('valid_url', '{field} harus berupa valid url');
        $this->form_validation->set_error_delimiters('', '</br>');

        if($this->form_validation->run() === TRUE) {
            $socmed_labels = $this->_socmed_labels;
            $user_id = user_login('id');

            $facebook = $this->input->post('facebook', TRUE);
            $twitter = $this->input->post('twitter', TRUE);
            $googleplus = $this->input->post('googleplus', TRUE);
            $behance = $this->input->post('behance', TRUE);
            $dribble = $this->input->post('dribble', TRUE);
            $youtube = $this->input->post('youtube', TRUE);
            $web = $this->input->post('web', TRUE);
            
            $data = array();
            $data[] = array('label'=> $socmed_labels['facebook'], 'url' => $facebook);
            $data[] = array('label'=> $socmed_labels['twitter'], 'url' => $twitter);
            $data[] = array('label'=> $socmed_labels['googleplus'], 'url' => $googleplus);
            $data[] = array('label'=> $socmed_labels['behance'], 'url' => $behance);
            $data[] = array('label'=> $socmed_labels['dribble'], 'url' => $dribble);
            $data[] = array('label'=> $socmed_labels['youtube'], 'url' => $youtube);
            $data[] = array('label'=> $socmed_labels['web'], 'url' => $web);

            $result = $this->usersocmeds_model->setting($user_id, $data);
            if($result) {
                $this->session->set_flashdata('success_message', "Berhasil Mensetting Link Akun");
                echo json_encode(array('status'=> true));
            } else {
                $message = $this->ion_auth->errors();
                echo json_encode(array('status' => false, 'message' => $message));
            }
        } else {
            echo json_encode(array('status'=> FALSE, 'message'=> validation_errors()));
        }

    }

    public function change_password() {
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
                'name' => 'Member',
                'path' => site_url('member')
            ),
            array(
                'name' => 'Profil',
                'path' => site_url('member/profile')
            ),
            array(
                'name' => 'Ubah Password',
                'path' => null
            ),
        );
        $this->template->set_props('breadcrumb', $breadcrumb);

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
        if(!$this->input->is_ajax_request()) {
            redirect('/');
        }  

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

    public function change_picture() {
        if(!$this->input->is_ajax_request()) {
            redirect('/');
        }  

        $this->load->model('user_model');
        //insert file png
        $photo = 'photo';
        $file = $_FILES[$photo];
        $config = array(
            'upload_path' => $this->config->item('upload_path')."member/",
            'allowed_types' => 'png|jpeg|jpg',
            'max_size' => '2000',
            'encrypt_name' => TRUE
        );

        $upload = $this->_upload_file($photo, $file, $config);

        if($upload['status'] === TRUE) {
            $id = user_login('id');
            $old_filename = $this->input->post('filename');
            $data = array(
                'profile_picture' => $upload['filename']
            );

            $where = array('id' => $id);
            $result = $this->user_model->update($where, $data);
            if($result) {
                if($old_filename != null) {
                    unlink($this->config->item('upload_path').'member/'.$old_filename);
                }

                $response = array('status' => TRUE, 'path' => cloud('member/'.$upload['filename']), 'filename'=> $upload['filename']);
            } else {
                $response = array('status' => FALSE, 'message' => 'Gagal Mengganti Foto Profil');
            }

            echo json_encode($response);
        } else {
            $response = array('status' => FALSE, 'message' => 'Gagal Upload Foto Profil');

            echo json_encode($response);
        }
    }

    protected function _upload_file($name, $file, $config) {
        //process upload picture
        $this->load->library('upload');
        $this->upload->initialize($config);
        //validation upload FALSE
        if(!$this->upload->do_upload($name))
        {
            $response = array(
                'status'  => FALSE,
                'error' => $this->upload->display_errors()
            );
            
            echo json_encode($response);
        }
        else//validation upload TRUE/success
        {
            $upload    = $this->upload->data();

            $config = array(
                'width'     => 210,
                'height'    => 210,
                'x_axis'    => '0',
                'y_axis'    => '0',
                'new_path'  => $this->config->item('upload_path')."member/"
            );

            $response = $this->_resize_image($config, $upload);

            return $response;
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