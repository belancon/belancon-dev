<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bug_model extends CI_Model {

	private $table = "bugs";
	
	public function insert($data) {
		$this->db->insert($this->table, $data);

		return $this->db->insert_id();
	}

	public function set_email_sent($id) {

		if($id) {
			$this->db->update($this->table, array('email_sent'=> TRUE), array('id'=> $id));
		}
	}
}