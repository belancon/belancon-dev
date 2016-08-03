<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('icon_total'))
{
	function icon_total() {
		$CI =& get_instance();
		$CI->load->model('icon_model');

		return $CI->icon_model->get_total();
	}

	function icon_total_author($author_id) {
		$CI =& get_instance();
		$CI->load->model('icon_model');

		return $CI->icon_model->get_total_author($author_id);
	}
}
