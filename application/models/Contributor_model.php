<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contributor_model extends CI_Model {

	private $table = "contributors";


	public function insert($data) {
		return $this->db->insert($this->table, $data);
	}
}