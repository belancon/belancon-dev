<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_model extends CI_Model {

	private $table = "files";


	public function get_files($selectors, $field = NULL, $type= NULL) {
		if(is_array($selectors)) {
			if(isset($field)) {
				if(is_array($type)) {
					$query = $this->db->where_in($field, $selectors)
									  ->where_in('type', $type)
									  ->get($this->table);
				} else {
					$query = $this->db->where_in($field, $selectors)
									  ->where('type', $type)
									  ->get($this->table);
				}
			} else {
				if(is_array($type)) {
					$query = $this->db->where_in('id', $selectors)
								  ->where_in('type', $type)
								  ->get($this->table);				
				} else {
					$query = $this->db->where_in('id', $selectors)
									  ->where('type', $type)
									  ->get($this->table);				
				}
			}

			if($query->num_rows() > 0) {
				return $query->result();
			} else {
				return FALSE;
			}
		}
	}

	public function get_file($selector, $field = NULL, $type= NULL) {
	
			if(isset($field)) {
				if(is_array($type)) {
					$query = $this->db->where($field, $selector)
								  ->where_in('type', $type)
								  ->get($this->table);
				} else {
					$query = $this->db->where($field, $selector)
								  ->where('type', $type)
								  ->get($this->table);
				}
			} else {
				if(is_array($type)) {
					$query = $this->db->where_in('id', $selector)
								  ->where_in('type', $type)
								  ->get($this->table);				
				} else {
					$query = $this->db->where_in('id', $selector)
								  ->where('type', $type)
								  ->get($this->table);				
				}
			}

			if($query->num_rows() > 0) {
				return $query->result();
			} else {
				return FALSE;
			}
	}
}