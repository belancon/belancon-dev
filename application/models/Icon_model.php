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

    	$query = $this->db->select('id, name, default_image, category, deleted, type, url')    					  
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
    	$query = $this->db->select('id, name, default_image, category, type, url')    					  
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
	    $query = $this->db->select('id, name, default_image, type, category, url')    					  
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
	    $query = $this->db->select('id, name, default_image, type, category, url')    					  
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


    public function get_one_with_detail($selector, $field = NULL) {
        if(isset($field)) {
            $query = $this->db->select('icons.*, files.id as file_id, files.filename')
                              ->from($this->table)
                              ->join($this->table_file, $this->table_file.".icon_id = ".$this->table.".id", 'left')
                              ->where($this->table_file.".type", 'png')
                              ->where($field, $selector)
                              ->get();
        } else {
            $query = $this->db->select('icons.*, files.id as file_id, files.filename')
                              ->from($this->table)
                              ->join($this->table_file, $this->table_file.".icon_id = ".$this->table.".id", 'left')
                              ->where($this->table_file.".type", 'png')
                              ->where('id', $selector)
                              ->get();
        }

        $icon = $query->row();

        if($icon) {
          $created_user = $icon->created_by;
          $ids = array();
          $ids[] = $icon->id;
          $query_other_icons = $this->db->select('id, default_image, url')
                                        ->limit(4)
                                        ->order_by('id', 'RANDOM')
                                        ->where('created_by', $created_user)
                                        ->where_not_in('id', $ids)
                                        ->get($this->table);
          $other_icons = $query_other_icons->num_rows() > 0 ? $query_other_icons->result() : array();

          return array(
            'icon' => $icon,
            'other_icons' => $other_icons
          );
        } else {
          return FALSE;
        }
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

    public function get_total_author($author_id) {
        $this->db->select('id');
        $this->db->where('deleted', 0);
        $this->db->where('created_by', $author_id);
        return $this->db->get($this->table)->num_rows();
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
        $this->db->insert($this->table, $data);
        $icon_id = $this->db->insert_id();
        $data_files = array();

  
        for ($i=0; $i < count($files); $i++) { 
            $ext = pathinfo($files[$i], PATHINFO_EXTENSION);
            $type = $ext === 'eps' ? 'ai' : $ext;

            $data_files[] = array(
                'icon_id' => $icon_id,
                'type'=> $type,
                'filename' => $files[$i],
                'created_at' => $data['created_at'],
                'created_by' => $data['created_by']
            );
        }

        $this->db->insert_batch($this->table_file, $data_files);

        return $icon_id;
    }

    public function update($where, $data, $files = array()) {
      $icon = $this->db->get_where($this->table, $where)->row();

      $this->db->trans_start(); # Starting Transaction
      $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well 
      $this->db->update($this->table, $data, $where);

      if(count($files) > 0) {
        for ($i=0; $i < count($files); $i++) { 
          $ext = pathinfo($files[$i], PATHINFO_EXTENSION);
          $type = $ext === 'eps' ? 'ai' : $ext;

          $data_files[] = array(            
            'filename' => $files[$i],            
          );

          $this->db->where('icon_id', $icon->id);
          $this->db->where('type', $type);
          $this->db->update($this->table_file, array('filename' => $files[$i]));
        }
      }

      $this->db->trans_complete(); # Completing transaction

      if ($this->db->trans_status() === FALSE) {
          # Something went wrong.
          $this->db->trans_rollback();
          return FALSE;
      } else {
          # Everything is Perfect. 
          # Committing data to the database.
          $this->db->trans_commit();
          return TRUE;
      }
    }

    public function delete($id) {
      $result = $this->db->update($this->table, array('deleted' => 1), array('id' => $id));

      return $result;
    }

    public function increase_download($ids) {
      if(is_array($ids)) {
        $this->db->where_in('id', $ids);
        $query = $this->db->get($this->table);
        $icons = $query->result();

        $this->db->trans_start();
        $this->db->trans_strict(FALSE);
        foreach($icons as $icon) {
          $total = $icon->downloads;
          $this->db->update($this->table, array('downloads' => $total + 1), array('id' => $icon->id));
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE) {
          $this->db->trans_commit();
          return TRUE;
        } else {
          return FALSE;
        }
      } else {
        $this->db->where('id', $ids);
        $query = $this->db->get($this->table);
        $icons = $query->row();

        $total = $icon->downloads;
          $this->db->update($this->table, array('downloads' => $total + 1), array('id' => $icon->id));

        return TRUE;
      }
    }
}