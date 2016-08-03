<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	private $table = "categories";

	public function get_all() {
		$query = $this->db->get($this->table);

		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return FALSE;
		}
	}

	public function get($id) {
		$query = $this->db->get_where($this->table, array('id'=>$id));

		return $query->row();
	}


	public function insert($data) {
		$this->db->insert($this->table, $data);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}

	public function update($id, $data) {
		$this->db->update($this->table, $data, array('id'=>$id));

		$result = $this->db->affected_rows();

		return $result;
	}

	public function delete($id) {
		$this->db->delete($this->table, array('id'=>$id));

		return TRUE;
	}

	public function name_check($id, $name) {
		$check = $this->db->where('name', $name)
						  ->where('id !=', $id)
						  ->get($this->table);

		if($check->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}