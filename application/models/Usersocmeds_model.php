<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usersocmeds_model extends CI_Model {

	private $table = "user_socmeds";
	private $table_socmed = "socmeds";


	public function setting($user_id, $data) {
		if(count($data) > 0) {
			for ($i=0; $i < count($data) ; $i++) { 
				//get socmed id
				$socmed = $this->db->select('id,name')->get_where($this->table_socmed, array('name'=> $data[$i]['label']))->row();
				if($socmed) {
					//get user socmed	
					$user_socmed = $this->db->get_where($this->table, array('user_id'=>$user_id, 'socmed_id' => $socmed->id))->row(); 

					if($user_socmed) {
						//if exist, update this
						$this->db->update($this->table, array('url' => $data[$i]['url']), array('id'=>$user_socmed->id));
					} else {
						//if not exist, create new
						$this->db->insert($this->table, array('user_id'=> $user_id, 'socmed_id'=> $socmed->id, 'url' => $data[$i]['url']));
					}
				}
			}

			return TRUE;
		}
	}

	public function get($user_id, $name) {
		$socmed = $this->db->get_where($this->table_socmed, array('name' => $name))->row();

		if($socmed) {
			$user_socmed = $this->db->get_where($this->table, array('user_id'=>$user_id, 'socmed_id'=> $socmed->id))->row();

			return $user_socmed;
		} else {
			return FALSE;
		}
	}

	public function get_by_user($user_id) {
		$socmeds = $this->db->select($this->table.'.*, '.$this->table_socmed.".id as socmed_id, ".$this->table_socmed.".icon, ".$this->table_socmed.".name")
							->from($this->table)
							->join($this->table_socmed, $this->table_socmed.".id = ".$this->table.".socmed_id")
							->where($this->table.".user_id", $user_id)
							->where($this->table.".url !=", "")
							->get();

		return $socmeds->result();
	}
}