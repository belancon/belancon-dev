<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('setting_lang'))
{
	function setting_lang($name) {
		$CI =& get_instance();
		$CI->load->model('setting_languages_model');
		$CI->load->library('user_belancon');
		$lang = $CI->user_belancon->get_language();

		$row = $CI->setting_languages_model->where('lang', $lang)->where('name', $name)->get();

		if($row) {
			return $row->value;
		} else {
			return "[".$name."][".$lang."] language not set";
		}
	}

}