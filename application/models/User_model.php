<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	private $table = "users";

	public function get_one($where) {
		$query = $this->db->select('id, first_name, last_name, profile_picture, join_date')
						  ->get_where($this->table, $where);
		$user = $query->row();

		return $user;
	}

	public function update($where, $data) {
		$this->db->update($this->table, $data, $where);
		$result = $this->db->affected_rows();

		return $result;
	}

	public function email_check_login_socmed($email) {
				
		$query = $this->db->get_where($this->table, array('email'=> $email, 'register_type'=> NULL));

		
		if($query->row()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}