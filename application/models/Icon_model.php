<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Icon_model extends CI_Model {

	private $table = "icons";
  private $table_file = "files";

	/**
	 * Get All Icon and sort by created at
	 * @param  [type] $limit  [description]
	 * @param  [type] $offset [description]
	 * @param  [type] $search [description]
	 * @return [type]         [description]
	 */
    public function get_newest($limit, $offset, $search) {    
      $where = "(deleted = 0) AND ((name LIKE '%".$search."%') OR (category LIKE '%".$search."%') OR (tags LIKE '%".$search."%'))";

    	$query = $this->db->select('id, name, default_image, category, deleted')    					  
    			 		  ->order_by('created_at', 'DESC')    
    			 		  ->where($where)
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
      $where = "(deleted = 0) AND ((name LIKE '%".$search."%') OR (category LIKE '%".$search."%') OR (tags LIKE '%".$search."%'))";
    	$query = $this->db->select('id, name, default_image, category')    					  
    			 		  ->order_by('views', 'DESC')    
    			 		  ->where($where)
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
    	$where = "(type = 'free') AND (deleted = 0) AND ((name LIKE '%".$search."%') OR (category LIKE '%".$search."%') OR (tags LIKE '%".$search."%'))";
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
    	
    	$where = "(type = 'paid') AND (deleted = 0) AND ((name LIKE '%".$search."%') OR (category LIKE '%".$search."%') OR (tags LIKE '%".$search."%'))";
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

    public function get_total() {
        return $this->db->count_all($this->table);
    }

    public function get_by_user($user_id, $limit, $offset, $search) {        
        $where = "(created_by = ".$user_id.") AND (deleted = 0) AND ((name LIKE '%".$search."%') OR (category LIKE '%".$search."%') OR (tags LIKE '%".$search."%'))";
        $query = $this->db->select('id, name, default_image, type, category, created_by') 
                            ->order_by('created_at', 'DESC')                     
                            ->where($where)                      
                            ->get($this->table, $limit, $offset);
        

        return $query->result_array();
    }

    public function insert($data, $files) {
        $id = $this->db->insert($this->table, $data);
        $data_files = array();

        for ($i=0; $i < count($files); $i++) { 
            $ext = pathinfo($files[$i], PATHINFO_EXTENSION);
            $type = $ext === 'eps' ? 'ai' : $ext;

            $data_files[] = array(
                'icon_id' => $id,
                'type'=> $type,
                'filename' => $files[$i],
                'created_at' => $data['created_at'],
                'created_by' => $data['created_by']
            );
        }

        $this->db->insert_batch($this->table_file, $data_files);

        return $id;
    }

    public function delete($id) {
      $result = $this->db->update($this->table, array('deleted' => 1), array('id' => $id));

      return $result;
    }
}