<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('user_login'))
{
	function user_login($field= NULL) {
		$ci =& get_instance();

		$user = $ci->ion_auth->user();

		if($user) {
			if($field === NULL) {
				return $user->row();
			} else {
				$userRow = $user->row();
				return $userRow->$field;
			}
		}
	}
}


if ( ! function_exists('get_user_group'))
{
	function get_user_group($id= NULL) {
		$ci =& get_instance();

		$user_groups = $ci->ion_auth->get_users_groups($id)->result();

		if($user_groups) {
			return $user_groups;
		} else {
			return FALSE;
		}
	}
}
