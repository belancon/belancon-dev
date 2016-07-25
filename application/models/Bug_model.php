<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bug_model extends CI_Model {

	private $table = "bugs";


	public function insert($data) {
		return $this->db->insert($this->table, $data);
	}
}