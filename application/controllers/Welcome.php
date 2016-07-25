<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function upload()
	{
		//config upload
		$config = array(
			'upload_path' 	=>''.$this->config->item('path').'/png/',
			'allowed_types'	=>'jpg|png|jpeg',
			'encrypt_name'	=>TRUE,
			'remove_spaces'	=>TRUE,
			'overwrite'		=>TRUE,
			'max_size'		=>'5000',
			'max_width'		=>'5000',
			'max_height'	=>'5000'
		);

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('welcome_message', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('welcome_message', $data);
		}
	}
}
