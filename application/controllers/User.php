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

    public function complete_registration_facebook() {
        if($this->ion_auth->logged_in()) {
            redirect('/');
        } else {
            //untuk menset title page
            $this->template->set_title('Belancon | Complete Registration');
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
       
            $this->_loadscript();
            //set layout
            $this->template->set_layout('layouts/custom');
            $this->template->set_content('pages/form/complete_registration_facebook'); // nama file page nya, tanpa extension php
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
            $this->template->set_part('script', '_scripts/register.php');       
            $this->_loadscript();
            //set layout
            $this->template->set_layout('layouts/custom');
            $this->template->set_content('pages/form/register'); // nama file page nya, tanpa extension php
            $this->template->render(); // terakhir render
        }
    }

    public function do_login() {
        //validate form input
        $this->form_validation->set_rules('identity', 'Username', 'required');
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
                $url_redirect = user_login('first_name') != '' ? site_url('') : site_url('member/change-profile');
                
                echo json_encode(array('status' => true, 'url'=>$url_redirect));
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

    public function do_register() {
        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');     

        /** validate form input **/
        if($identity_column!=='email') {
            $this->form_validation->set_rules('identity', 'Username','required|is_unique['.$tables['users'].'.'.$identity_column.']');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique['.$tables['users'].'.email]');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required');
        /** eof validate form input **/
        //set message
        $this->form_validation->set_message('required', '{field} harus diisi');
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai. silahkan pakai {field} yang lain');

        if ($this->form_validation->run() === true) {
            $email    = strtolower($this->input->post('email'));
            $identity = ($identity_column==='email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');
            $join_date = date('Y-m-d');
            $additional_data = array('register_type' => 'manual', 'join_date'=> $join_date);
            $grup = array('2');

            $result = $this->ion_auth->register($identity, $password, $email, $additional_data, $grup);

            if($result) {
                $this->session->set_flashdata('success_message', $this->ion_auth->messages());
                echo json_encode(array('status' => true));                
            } else {
                echo json_encode(array('status' => false, 'message' => $this->ion_auth->errors()));
            }
        } else {
            $message = validation_errors();            
            echo json_encode(array('status' => false, 'message' => $message));
        }

    }

    // activate the user
    public function activate($id, $code=false)
    {
        if ($code !== false)
        {
            $activation = $this->ion_auth->activate($id, $code);
        }
        else if ($this->ion_auth->is_admin())
        {
            $activation = $this->ion_auth->activate($id);
        }

        if ($activation)
        {
            // redirect them to the auth page
            $this->session->set_flashdata('success_message', $this->ion_auth->messages()." Silahkan login");
            redirect("/login", 'refresh');
        }
        else
        {
            // redirect them to the forgot password page
            $this->session->set_flashdata('error_message', $this->ion_auth->errors());
            redirect("/", 'refresh');
        }
    }

    function loginfacebook()
    {
        $this->load->model(array('ion_auth_model', 'user_model'));
	    $this->config->load('ion_auth', TRUE);
	    $this->config->set_item('email_activation', FALSE);
        
        $user_data = array();

		// Check if user is logged in
		if ($this->facebook->is_authenticated())
		{
			// User logged in, get user details
			$user = $this->facebook->request('get', '/me?fields=id,name,email');
			if (!isset($user['error']))
			{
				$user_data = $user;
			}


            if($this->user_model->email_check_login_socmed($user_data['email'])) {
                $this->session->set_flashdata('error_message', 'Alamat email '.$user_data['email'].' telah terdaftar di Belancon.com! Silahkan login dengan akun Belancon anda.');
                redirect('/login','refresh');
            } else {
			
    		    // check if this user is already registered
                if(!$this->ion_auth->identity_check($user_data['id'])) {
                    $join_date = date("Y-m-d");
                    $username = $user_data['id'];
                    $email = $user_data['email'];
                    $name = explode(" ", $user_data['name']);
                    $grup = array('2');
                    $random_number = mt_rand();
                    $url = strtolower($name[0])."_".$random_number;

                    $additional_data = array('first_name' => $name[0], 'last_name' => $name[1], 'url'=> $url, 'join_date' => $join_date, 'register_type'=> 'facebook');

                    $register = $this->ion_auth_model->register($username, 'facebookdoesnothavepass123^&*%', $email, $additional_data, $grup );

                    if($register) {
                        
                            $login = $this->ion_auth->login($user_data['id'], 'facebookdoesnothavepass123^&*%', 1);

    	                if($login) {
    	                    $this->session->set_flashdata('success_message', $this->ion_auth->messages());
    	                    redirect('/','refresh');
    	                } else {
    	                    $this->session->set_flashdata('error_message', $this->ion_auth->errors());
    	                    redirect('login','refresh');
    	                }
                                    
                    } else {
                        $this->session->set_flashdata('error_message', $this->ion_auth->errors());
                        redirect('/','refresh');
                    }

                } else {
                    $login = $this->ion_auth->login($user_data['id'], 'facebookdoesnothavepass123^&*%', 1);

                    if($login) {
                        $this->session->set_flashdata('success_message', $this->ion_auth->messages());
                        redirect('/','refresh');
                    } else {
                        $this->session->set_flashdata('error_message', $this->ion_auth->errors());
                        redirect('login','refresh');
                    }
                }
            }

		} else {
		   redirect('login','refresh');
		}
    }
    
    public function logingoogle() {
		$this->load->config('google');
	 	$redirect_uri = $this->config->item('google_redirect_url');
	 	$client = $this->google->getClient();
	    // Send Client Request
		$objOAuthService = new Google_Service_Oauth2($client);
		
		// Add Access Token to Session
		if (isset($_GET['code'])) {
			$client->authenticate($_GET['code']);
			$_SESSION['access_token'] = $client->getAccessToken();
			header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
		}
		
		// Set Access Token to make Request
		if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
			$client->setAccessToken($_SESSION['access_token']);
		}
		
		// Get User Data from Google and store them in $data
		if ($client->getAccessToken()) {
			$userData = $objOAuthService->userinfo->get();
            $this->load->model(array('ion_auth_model', 'user_model'));
			
            if($this->user_model->email_check_login_socmed($userData->email)) {
                $this->session->set_flashdata('error_message', 'Alamat email '.$userData->email.' telah terdaftar di Belancon.com! Silahkan login dengan akun Belancon anda.');
                redirect('/login','refresh');
            } else {		        
	            if(!$this->ion_auth->identity_check($userData->id)) {
	                $join_date = date("Y-m-d");
	                $username = $userData->id;
	                $email = $userData->email;
	                $email_arr = explode("@", $email);
	
	                //get firstname & lastname
	                $first_name = $userData->given_name != '' ? $userData->given_name : $email_arr[0];
	                $last_name = $userData->family_name != '' ? $userData->family_name : '';
	                //set grup
	                $grup = array('2');
	                //get slug/url
	                $random_number = mt_rand();
	                $url = strtolower($first_name)."_".$random_number;
	
	                $additional_data = array('first_name' => $first_name, 'last_name' => $last_name, 'url'=> $url, 'join_date' => $join_date, 'register_type'=> 'google');
	
	                $register = $this->ion_auth_model->register($username, 'googledoesnothavepass123^&*%', $email, $additional_data, $grup );
	
	                if($register) {                    
	                    $login = $this->ion_auth->login($userData->id, 'googledoesnothavepass123^&*%', 1);
	
		                if($login) {
		                    $this->session->set_flashdata('success_message', $this->ion_auth->messages());
		                    redirect('/','refresh');
		                } else {
		                    $this->session->set_flashdata('error_message', $this->ion_auth->errors());
		                    redirect('login','refresh');
		                }
	                                
	                } else {
	                    $this->session->set_flashdata('error_message', $this->ion_auth->errors());
	                    redirect('/','refresh');
	                }
	
	            } else {
	                $login = $this->ion_auth->login($userData->id, 'googledoesnothavepass123^&*%', 1);
	
	                if($login) {
	                    $this->session->set_flashdata('success_message', $this->ion_auth->messages());
	                    redirect('/','refresh');
	                } else {
	                    $this->session->set_flashdata('error_message', $this->ion_auth->errors());
	                    redirect('login','refresh');
	                }
	            }
            }
		} else {
			redirect('/login','refresh');
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
    	$this->user_belancon->generate_token();
    }
}