<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	
	function __construct() {
		parent::__construct();		
	}

	public function get_setting_language() {
		if(!$this->input->is_ajax_request()) {
			redirect('/','refresh');
		}

		$name = $this->input->post('name');

		if($name) {
			$result = setting_lang($name);

			echo json_encode($result);
		}
	}
}