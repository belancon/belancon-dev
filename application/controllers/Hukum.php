<?php

class Hukum extends CI_Controller 
{
	function __construct() {
		parent::__construct();
		$this->load->library(array('template')); //load library template
                $this->template->set_platform('public');
                $this->template->set_theme('belancon');                
	}

	

        
}