<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_model extends CI_Model {

	private $table = "feedbacks";


	public function insert($data) {
		$this->db->insert($this->table, $data);

		$insert_id = $this->db->insert_id();

		return $insert_id;
	}

	public function set_email_sent($id) {

		if($id) {
			$this->db->update($this->table, array('email_sent'=> TRUE), array('id'=> $id));
		}
	}
}