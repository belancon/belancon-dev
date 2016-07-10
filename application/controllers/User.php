<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        
        $this->load->library('user_belancon');
    }

    public function set_token() {    	
    	$result = $this->user_belancon->generate_token();
    	
    	echo json_encode(array('ipaddress' => $result['ipaddress'], 'token'=> $result['token']));	
    }
}