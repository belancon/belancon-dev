<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_belancon {

	function __construct()
	{
		$this->ci =& get_instance();
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
		$this->ci->load->library('session');

		$ipaddress = $this->get_client_ip();

		if($ipaddress !== 'UNKNOWN') {			
			$token = $this->_encrypt_decrypt('encrypt', $ipaddress);

			//set session
			$this->ci->session->set_userdata('token', $token);

			return array('ipaddress' => $ipaddress, 'token' => $token);
		} else {
			return false;
		}
	}

	public function get_token() {
		$this->ci->load->library('session');
		return $this->ci->session->userdata('token');
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
}