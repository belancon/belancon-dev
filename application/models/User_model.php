<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	private $table = "users";


	public function update($where, $data) {
		$this->db->update($this->table, $data, $where);
		$result = $this->db->affected_rows();

		return $result;
	}
}