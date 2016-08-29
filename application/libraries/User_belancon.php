<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_belancon {

	function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->helper('cookie');
	}

	// Function to get the client ip address
	function get_client_ip() {
	    $ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	        $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';
	 
	    return $ipaddress;
	}

	public function generate_token() {		
		$ipaddress = $this->get_client_ip();

		if($ipaddress !== 'UNKNOWN') {			
			$random_num = mt_rand();
			//$token = $this->_encrypt_decrypt('encrypt', $ipaddress.$random_num);
			
			if(!$this->ci->input->cookie('visit_token'))
				$this->ci->input->set_cookie('visit_token', $random_num, 86400);
			//set session
			//$this->ci->session->set_userdata('token', $token);

			//return array('ipaddress' => $ipaddress, 'token' => $token);
		} else {
			return false;
		}
	}

	public function get_token() {
		$ip_address = $this->get_client_ip();
		$visit_token = $this->ci->input->cookie('visit_token');

		if($ip_address !== 'UNKNOWN' && $visit_token) {
			return $ip_address.$visit_token;
		} else {
			return FALSE;
		}
	}

	public function increase_page_view_icon($icon_id) {
		$this->ci->load->model('visitor_model');

		$token = $this->get_token();

		if($token) {
			$this->ci->visitor_model->increase_view_icon($icon_id, $token);
		}
	}

	public function random_string($action, $string) {
		return $this->_encrypt_decrypt($action, $string);
	}

	protected function _encrypt_decrypt($action, $string) {
	    $output = false;

	    $encrypt_method = "AES-256-CBC";
	    $secret_key = 'belancon2016key';
	    $secret_iv = 'belancon2016iv';

	    // hash
	    $key = hash('sha256', $secret_key);
	    
	    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	    $iv = substr(hash('sha256', $secret_iv), 0, 16);

	    if( $action == 'encrypt' ) {
	        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	        $output = base64_encode($output);
	    }
	    else if( $action == 'decrypt' ){
	        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	    }

	    return $output;
	}

	public function set_language($lang) {
		if($lang) {
			$this->ci->input->set_cookie('default_lang', $lang, 86400);
		}
	}

	public function set_default_language() {
		$country = $this->get_user_country();
		if(!$this->ci->input->cookie('default_lang')) {
			//$this->ci->load->model('setting_generals_model');
			//$row = $this->ci->setting_generals_model->where('name','default_language')->get();

			if($country) {				
				$lang = $country == 'ID' ? 'id' : 'en';
				$this->ci->input->set_cookie('default_lang', $lang, 86400);				
			}
		}
	}

	public function get_language() {

		if(!$this->ci->input->cookie('default_lang')) {
			$country = $this->get_user_country();
			return $country == 'ID' ? 'id' : 'en';
		} else {
			return $this->ci->input->cookie('default_lang');
		}
	}
	
	public function get_client_ip_address() {
		//Just get the headers if we can or else use the SERVER global
		if ( function_exists( 'apache_request_headers' ) ) {
			$headers = apache_request_headers();
		} else {
			$headers = $_SERVER;
		}
		//Get the forwarded IP if it exists
		if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
			$the_ip = $headers['X-Forwarded-For'];
		} elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
		) {
			$the_ip = $headers['HTTP_X_FORWARDED_FOR'];
		} else {
			
			$the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
		}
		
		return $the_ip;
	}

	public function get_user_country() {
		$ip = $this->get_client_ip_address();
        	$geo = json_decode(file_get_contents("http://ipinfo.io/".$ip));
            
        	return $geo->country;
	}
}