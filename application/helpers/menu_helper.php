<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('menu_active'))
{
	function menu_active($path) {
		$ci =& get_instance();

		$current_path = $ci->uri->uri_string();
		$path_array = explode("/", $current_path);
		
		if(in_array($path, $path_array)) {
	            return TRUE;
		}

		return FALSE;
	}
}
