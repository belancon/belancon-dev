<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_model extends CI_Model {

	private $table = "files";


	public function get_files($selectors, $field = NULL, $type= NULL) {
		if(is_array($selectors)) {
			if(isset($field)) {
				$query = $this->db->where_in($field, $selectors)
								  ->where('type', $type)
								  ->get($this->table);
			} else {
				$query = $this->db->where_in('id', $selectors)
								  ->where('type', $type)
								  ->get($this->table);				
			}

			if($query->num_rows() > 0) {
				return $query->result();
			} else {
				return FALSE;
			}
		}
	}
}