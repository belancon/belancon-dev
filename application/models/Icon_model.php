<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Icon_model extends CI_Model {

	private $table = "icons";

	/**
	 * Get All Icon and sort by created at
	 * @param  [type] $limit  [description]
	 * @param  [type] $offset [description]
	 * @param  [type] $search [description]
	 * @return [type]         [description]
	 */
    public function get_newest($limit, $offset, $search) {    	
    	$query = $this->db->select('id, name, default_image, category')    					  
    			 		  ->order_by('created_at', 'DESC')    
    			 		  ->like('name', $search)			 		  
    			 		  ->or_like('category', $search)
    			 		  ->get($this->table, $limit, $offset);

    	return $query->result_array();
    }

    /**
     * Get All Icon and sort by views (most popular icon)
     * @param  [type] $limit  [description]
     * @param  [type] $offset [description]
     * @param  [type] $search [description]
     * @return [type]         [description]
     */
    public function get_popular($limit, $offset, $search) {
    	$query = $this->db->select('id, name, default_image, category')    					  
    			 		  ->order_by('views', 'DESC')    
    			 		  ->like('name', $search)			 		  
    			 		  ->or_like('category', $search)
    			 		  ->get($this->table, $limit, $offset);

    	return $query->result_array();
    }

    /**
     * Get All Icon Which type is free
     * @param  [type] $limit  [description]
     * @param  [type] $offset [description]
     * @param  [type] $search [description]
     * @return [type]         [description]
     */
    public function get_free($limit, $offset, $search) {
    	$where = "(type = 'free') AND ((name LIKE '%".$search."%') OR (category LIKE '%".$search."%'))";
	    $query = $this->db->select('id, name, default_image, type, category')    					  
	    			 		->order_by('created_at', 'DESC')    	    			 		 
	    			 		->where($where)    			 		 
	    			 		->get($this->table, $limit, $offset);
    	

    	return $query->result_array();
    }

    /**
     * Get All Icon which type is paid
     * @param  [type] $limit  [description]
     * @param  [type] $offset [description]
     * @param  [type] $search [description]
     * @return [type]         [description]
     */
    public function get_paid($limit, $offset, $search) {
    	
    	$where = "(type = 'paid') AND ((name LIKE '%".$search."%') OR (category LIKE '%".$search."%'))";
	    $query = $this->db->select('id, name, default_image, type, category')    					  
	    			 	->order_by('created_at', 'DESC')    	    			 	
	    			 	->where($where)    			 		 
	    			 	->get($this->table, $limit, $offset);
    	

    	return $query->result_array();
    }


    public function get_one($selector, $field = NULL) {
        if(isset($field)) {
            $query = $this->db->get_where($this->table, array($field => $selector));
        } else {
            $query = $this->db->get_where($this->table, array('id' => $selector));
        }

        return $query->row();
    } 

    public function get_random($limit = 5) {
        $query = $this->db->order_by('id', 'RANDOM')
                  ->limit($limit)
                  ->get($this->table);

        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
}