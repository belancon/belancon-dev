<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_model extends CI_Model {

	private $table = "temp_visitor";
	private $_table_icon = "icons";
	
	public function insert($data) {
		$this->db->insert($this->table, $data);

		return $this->db->insert_id();
	}

	public function increase_view_icon($icon_id, $token) {
		$query = $this->db->get_where($this->table, array('token' => $token));

		if(!$query->row()) {
			$query_icon = $this->db->get_where($this->_table_icon, array('id'=>$icon_id));

			if($query_icon->row()) {
				$icon = $query_icon->row();
				$views_total = $icon->views + 1;
				$this->db->update($this->_table_icon, array('views'=> $views_total), array('id'=>$icon_id));
				$this->insert(array('token'=> $token));
			}
		}
	}
}