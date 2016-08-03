<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_model extends CI_Model {

	private $table = "feedbacks";


	public function insert($data) {
		return $this->db->insert($this->table, $data);
	}
}