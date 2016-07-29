<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Icon extends MY_Controller {

	private $limit = 12;

	protected $_path_thumbnail = "";
	protected $_folder_png = "";
	protected $_folder_psd = "";
	protected $_folder_ai = "";

	function __construct()
    {
        parent::__construct();
        $this->load->library(array('user_belancon', 'form_validation'));
        $this->load->model(array('icon_model', 'file_model'));
        $this->_path_thumbnail = cloud('thumbnail');
        $this->_folder_png = cloud('png');
        $this->_folder_psd = cloud('psd');
        $this->_folder_ai = cloud('ai');
    }

	/**
	 * Get All Icon from model, and populate to array json and return from called ajax function
	 * @return [type] [description]
	 */
	public function get_all()
	{
		if( $this->input->is_ajax_request() ) {
			$page = (int)$this->input->post('page');
			$by = $this->input->post('by');
			$search = $this->input->post('search') ? $this->input->post('search') : "";

			$img_icon_folder = $this->_path_thumbnail;

			$icons = array();
			$data = $this->get_data($page, $by, $search);
			$cart = $this->cart_belancon->contents();
			$more = count($data) < $this->limit ? FALSE : TRUE;

			if(count($data) > 0) {
				
				foreach ($data as $icon) {
					$id = $icon['id'];
					$icons[] = array(
						'id' => $icon['id'],
						'name' => $icon['name'],
						'path' => $img_icon_folder."/".$icon['default_image'],
						'type' => $icon['type'],
						'url' => $icon['url'],
						'onCart' => isset($cart[$id]) ? TRUE : FALSE
					);
				}
			}

			echo json_encode(array('data' => $icons, 'page' => $page + 1, 'more' => $more, 'by'=> $by, 'search'=> $search));
		} else {
			redirect('/');
		}
	}

	public function get_one() {
		if($this->input->is_ajax_request()) {
			$id = $this->input->post('id');

			if($id) {
				$icon = $this->icon_model->get_one($id);
				$data = array('path' => $this->_folder_png."/".$icon->default_image);
				echo json_encode(array('status'=> TRUE, 'data' => $data));
			} else {

				echo json_encode(array('status'=> FALSE, 'error'=> 'icon not found'));
			}
		}
	}

	/**
	 * Get Icon members from model, and populate to array json and return from called ajax function
	 * @return [type] [description]
	 */
	public function get_by_user()
	{
		if( $this->input->is_ajax_request() ) {
			$icons = array();
			$user_id = user_login('id');
			$page = (int)$this->input->post('page');			
			$search = $this->input->post('search') ? $this->input->post('search') : "";
			$offset = ($this->limit * $page) - $this->limit;

			$img_icon_folder = $this->_path_thumbnail;			
			$data = $this->icon_model->get_by_user($user_id, $this->limit, $offset, $search);			
			$more = count($data) < $this->limit ? FALSE : TRUE;

			if(count($data) > 0) {
				
				foreach ($data as $icon) {
					$id = $icon['id'];
					$icons[] = array(
						'id' => $icon['id'],
						'name' => $icon['name'],
						'path' => $img_icon_folder."/".$icon['default_image'],						
					);
				}
			}

			echo json_encode(array('data' => $icons, 'page' => $page + 1, 'more' => $more, 'search'=> $search));
		} else {
			redirect('/');
		}
	}

	/**
	 * Filter Newest Icon, Popular Icon, Free Icon or Paid Icon
	 * @param  [type] $page   [description]
	 * @param  [type] $by     [description]
	 * @param  [type] $search [description]
	 * @return [type]         [description]
	 */
	private function get_data($page, $by, $search) {
		$offset = ($this->limit * $page) - $this->limit;

		switch ($by) {
			case 'newest':
				$data = $this->icon_model->get_newest($this->limit, $offset, $search);
				break;
			case 'popular':
				$data = $this->icon_model->get_popular($this->limit, $offset, $search);
				break;
			case 'free':
				$data = $this->icon_model->get_free($this->limit, $offset, $search);
				break;
			case 'paid':
				$data = $this->icon_model->get_paid($this->limit, $offset, $search);
				break;
			default:
				$data = $this->icon_model->get_newest($this->limit, $offset, $search);
				break;
		}

		return $data;
	}

	public function add() {         
		if( !$this->input->is_ajax_request() ) {
			redirect('/');
		}

        $this->form_validation->set_rules('name', 'Nama', 'required|min_length[3]');
        $this->form_validation->set_rules('category', 'Kategori', 'required|min_length[3]');
        $this->form_validation->set_rules('type', 'Tipe', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'integer');

        $this->form_validation->set_message('required', '{field} harap diisi');
        $this->form_validation->set_message('integer', '{field} harus berupa angka desimal');
        $this->form_validation->set_message('min_length', '{field} tidak boleh kurang dari {param} karakter.');

        if($this->form_validation->run() === TRUE) {
            //check file
            $png = 'filepng';
            $psd = 'filepsd';
            $ai = 'fileai';
            $file_png = $_FILES[$png];
            $file_psd = $_FILES[$psd];
            $file_ai = $_FILES[$ai];

            if($file_png['name'] == '' || $file_psd['name'] == '' || $file_ai['name'] == '') {
                echo json_encode(array('status'=> FALSE, 'message' => 'File PNG, PSD, and AI is required'));
            } else {
                //====== UPLOAD FILE =====//
                //insert file png
                $config_png = array(
                    'upload_path' => $this->config->item('upload_path')."png/",
                    'allowed_types' => 'png',
                    'max_size' => '2000',
                    'encrypt_name' => TRUE
                );

                $result_png = $this->_upload_file($png, $file_png, $config_png);
                //insert file psd
                $config_psd = array(
                    'upload_path' => $this->config->item('upload_path')."psd/",
                    'allowed_types' => 'psd',
                    'max_size' => '2000',
                    'encrypt_name' => TRUE
                );
                $result_psd = $this->_upload_file($psd, $file_psd, $config_psd);
                //insert file ai
                $config_ai = array(
                    'upload_path' => $this->config->item('upload_path')."ai/",
                    'allowed_types' => 'ai|eps',
                    'max_size' => '2000',
                    'encrypt_name' => TRUE
                );
                $result_ai = $this->_upload_file($ai, $file_ai, $config_ai);
                //====== END UPLOAD FILE =====//
                
                //check upload file 
                if($result_png['status'] === TRUE && $result_psd['status'] === TRUE && $result_ai['status'] === TRUE) {
                    //if upload files success
                    //get filenames
                    $files = array($result_png['filename'], $result_psd['filename'], $result_ai['filename']);

                    //===== INSERT ICON INTO TABLE =====//
                    $name = $this->input->post('name', TRUE);
                    $random_number = mt_rand();
                    $url = url_title($name)."_".$random_number;
                    $category = $this->input->post('category', TRUE);
                    $tags = $this->input->post('tags', TRUE);
                    $type = $this->input->post('type', TRUE);
                    $price = $this->input->post('price', TRUE);

                    $data = array(
                        'name' => $name,
                        'category' => $category,
                        'tags' =>  str_replace(" ","",$tags),
                        'type' => $type,
                        'price' => $price,
                        'url' => strtolower($url),
                        'created_by' => user_login('id'),
                        'created_at' => date("Y-m-d H:i:s"),
                        'default_image' => $result_png['filename']
                    );

                    //call method model
                    $result = $this->icon_model->insert($data, $files);

                    if($result) {
                        $this->session->set_flashdata('success_message', 'Berhasil menambah icon');
                        $response = array('status' => TRUE);
                    } else {
                        $response = array('status' => FALSE , 'message' => 'Gagal Menambah icon');
                    }

                    echo json_encode($response);
                    //===== END INSERT ICON INTO TABLE =====//

                } else {
                    //if upload files failed or error
                    $message = $result_png['error']."<br />".$result_psd['error']."<br />".$result_ai['error'];

                    echo json_encode(array('status' => FALSE, 'message' => $message));
                }
            }   
        } else {
            echo json_encode(array('status' => FALSE, 'message' => validation_errors()));
        }
    }

    public function update() {
    	if(!$this->input->is_ajax_request()) {
    		redirect('/');
    	}

    	//Form Validation rules
    	$this->form_validation->set_rules('name', 'Nama', 'required|min_length[3]');
        $this->form_validation->set_rules('category', 'Kategori', 'required|min_length[3]');
        $this->form_validation->set_rules('type', 'Tipe', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'integer');
        //set custom error validation
        $this->form_validation->set_message('required', '{field} harap diisi');
        $this->form_validation->set_message('integer', '{field} harus berupa angka desimal');
        $this->form_validation->set_message('min_length', '{field} tidak boleh kurang dari {param} karakter.');

        if($this->form_validation->run() === TRUE) {
        	//check file
            $png = 'filepng';
            $psd = 'filepsd';
            $ai = 'fileai';
            $file_png = $_FILES[$png];
            $file_psd = $_FILES[$psd];
            $file_ai = $_FILES[$ai];
			
			if($file_png['name'] != '') {
				//insert file png
                $config_png = array(
                    'upload_path' => $this->config->item('upload_path')."png/",
                    'allowed_types' => 'png',
                    'max_size' => '2000',
                    'encrypt_name' => TRUE
                );

                $result_png = $this->_upload_file($png, $file_png, $config_png);
			} else {
				$result_png = array('status' => TRUE, 'filename' => NULL);
			}


			if($file_psd['name'] != '') {
				//insert file psd
                $config_psd = array(
                    'upload_path' => $this->config->item('upload_path')."psd/",
                    'allowed_types' => 'psd',
                    'max_size' => '2000',
                    'encrypt_name' => TRUE
                );
                $result_psd = $this->_upload_file($psd, $file_psd, $config_psd);
			} else {
				$result_psd = array('status' => TRUE, 'filename' => NULL);
			}

			if($file_ai['name'] !='') {
				//insert file ai
                $config_ai = array(
                    'upload_path' => $this->config->item('upload_path')."ai/",
                    'allowed_types' => 'ai|eps',
                    'max_size' => '2000',
                    'encrypt_name' => TRUE
                );
                $result_ai = $this->_upload_file($ai, $file_ai, $config_ai);
			} else {
				$result_ai = array('status' => TRUE, 'filename' => NULL);
			}

			//check upload file 
            if($result_png['status'] === TRUE && $result_psd['status'] === TRUE && $result_ai['status'] === TRUE) {
            	$files = array();
            	//get filenames
               	if($result_png['filename'] !== NULL) {
               		$files[] = $result_png['filename'];
               	}

               	if($result_psd['filename'] !== NULL) {
               		$files[] = $result_psd['filename'];
               	}

               	if($result_ai['filename'] !== NULL) {
               		$files[] = $result_ai['filename'];
               	}

	        	//===== UPDATE ICON INTO TABLE =====//
	        	$id = $this->input->post('id', TRUE);
				$name = $this->input->post('name', TRUE);
				$random_number = mt_rand();
				$url = url_title($name)."_".$random_number;
				$category = $this->input->post('category', TRUE);
				$tags = $this->input->post('tags', TRUE);
				$type = $this->input->post('type', TRUE);
				$price = $this->input->post('price', TRUE);	
				$default_image = $result_png['filename'] !== NULL ? $result_png['filename'] : $this->input->post('default-image', TRUE);

				$data = array(
					'name' => $name,
					'category' => $category,
					'tags' =>  str_replace(" ","",$tags),
					'type' => $type,
					'price' => $price,
					'url' => strtolower($url),				
					'default_image' => $default_image
				);

				//call method model
				$where = array('id' => $id);
				$result = $this->icon_model->update($where, $data, $files);

				if($result) {
					$this->session->set_flashdata('success_message', 'Berhasil mengubah icon');
					$response = array('status' => TRUE);
				} else {
					$response = array('status' => FALSE , 'message' => 'Gagal mengubah icon');
				}

				echo json_encode($response);
				//===== END INSERT ICON INTO TABLE =====//
			}
        }
    }


    public function delete() {
    	$id = $this->input->post('id');
    	$name = $this->input->post('name');

    	if($id) {
	    	$result = $this->icon_model->delete($id);

	    	if($result) {
	    		$this->session->set_flashdata('success_message', "Sukses Menghapus Icon ".$name);
	    		$response = array('status' => TRUE);
	    	} else {
	    		$response = array('status' => FALSE, 'message' => 'Gagal Menghapus Icon' );
	    	}
    	} else {
    		$response = array('status' => FALSE, 'message' => 'Terjadi Kesalahan sistem' );
    	}

    	echo json_encode($response);
    }

    protected function _upload_file($name, $file, $config) {
        //process upload picture
        $this->load->library('upload');
        $this->upload->initialize($config);
        //validation upload FALSE
        if(!$this->upload->do_upload($name))
        {
            $response = array(
                'status'  => FALSE,
                'error' => $this->upload->display_errors()
            );
            
            return $response;
        }
        else//validation upload TRUE/success
        {
            $upload    = $this->upload->data();
            $filename  = $upload['file_name'];

            $response = array(
                'status' => TRUE,
                'filename' => $filename,
                'error' => ''
            );

            if($upload['file_ext'] === '.png') {
                $config = array(
                    'width'     => 80,
                    'height'    => 80,
                    'x_axis'    => '0',
                    'y_axis'    => '0',
                    'new_path'  => $this->config->item('upload_path')."thumbnail/"
                );

                $result = $this->_resize_image($config, $upload);
            }
        
            return $response;
        }
    }

	public function add_to_cart() {		
		if( $this->input->is_ajax_request() ) {
			$id = $this->input->post('id');		
			$img_icon_folder = $this->_path_thumbnail;
				
			$icon = $this->icon_model->get_one($id);

			if(isset($icon)) {
				$price = $icon->type === "free" ? 0 : $icon->price;
				$data = array(
			        'id'      => $icon->id,
			        'qty'     => 1,
			        'price'   => $price,
			        'name'    => $icon->name,
			        'category' => $icon->category,
			        'path_img' => $img_icon_folder."/".$icon->default_image,
			        'type' => $icon->type
				);

				$row_id = $this->cart_belancon->insert($data);

				if($row_id) {
					$icon->path = $img_icon_folder."/".$icon->default_image;
					$result = array(
						'status' => TRUE,						
					);
				} else {
					$result = array('status'=> FALSE, 'error' => 'failed added item to cart');	
				}
			} else {
				$result = array('status'=> FALSE, 'error' => 'icon not found');
			}

			echo json_encode($result);
		} else {
			redirect('/');
		}
	}

	public function remove_from_cart() {	
		if( $this->input->is_ajax_request() ) {	
			$id = $this->input->post('id');
			
				$deleted = $this->cart_belancon->remove($id);

				if($deleted) {
					$result = array('status'=> TRUE);	
				} else {
					$result = array('status'=> FALSE, 'error' => 'failed deleted item from cart');
				}			

			echo json_encode($result);
		} else {
			redirect('/');
		}
	}

	public function get_cart() {
		if( $this->input->is_ajax_request() ) {
			$data = array();
			$cart = $this->cart_belancon->contents();

			if(is_array($cart) && count($cart) > 0) {
				foreach($cart as $item) {
					$data[] = array(
						'id' => $item['id'],
						'name' => $item['name'],
						'category' => $item['category'],
						'price' => $item['price'],
						'type' => $item['type'],
						'path' => $item['path_img']
					);
				}
			}

			echo json_encode(array('data' => $data));
		} else {
			redirect('/');
		}
	}

	public function download_all() {
		$type = $this->input->post('type');
		$this->load->helper(array('file', 'download'));
		$this->load->library('zip');

		$dir = './download';
		$leave_files = array('index.html');

		foreach( glob("$dir/*") as $file ) {
		    if( !in_array(basename($file), $leave_files) )
		        unlink($file);
		}

		$cart = $this->cart_belancon->contents();
		
		//if cart not empty
		if(count($cart) > 0) {
			$files = array();
			$ids = array();
			
			//get ids icon
			foreach($cart as $item) {
				$ids[] = $item['id'];
			}

			//get filename & path file icon from database
			$result = $this->file_model->get_files($ids, 'icon_id', $type);
			
			if($result) {
				$check = 0;


				foreach($result as $item) {
					//set filename
					$name_string = strtolower($cart[$item->icon_id]['name']);
					$name = str_replace(" ","-",$name_string)."_".$item->filename;
					//get file
					$path = $this->_get_folder($type)."/".$item->filename;		
					$data = read_file($path);			

					if($data === FALSE) {
						//if file not found
						echo json_encode(array('status' => FALSE, 'message' => 'file '.$name_string.'.'.$type.' tidak ditemukan'));
						break;
					} else {
						//if file found
						$this->zip->add_data($name, $data);
						$check++;
					}
				}

				if($check === count($result)) {
					//add file license into zip
					$license= read_file(cloud_path('text/LICENSE.txt'));
					$this->zip->add_data('LICENSE.txt', $license);

					//get file zip
					$zip_content = $this->zip->get_zip();
					//generate random filename
					$random_num = rand();
					$text = $this->user_belancon->random_string('encrypt', $random_num);
					$pagename = "belancon-".strtolower($text);
					//get path file zip
					$newFileName = './download/'.$pagename.".zip";

					//check file zip exist or not
					if(file_put_contents($newFileName,$zip_content)!=FALSE){
						//if exist
						//set message success
						$this->session->set_flashdata('success_message', 'Icon berhasil didownload.');
						//clear cart
						$this->cart_belancon->clear();
						//increase total download
						$this->icon_model->increase_download($ids);
						//return callback success
						echo json_encode(array('status' => TRUE, 'path' => base_url().'download/'.$pagename.'.zip'));
					} else {
						//clear cart
						$this->cart_belancon->clear();
						//set message error
						$this->session->set_flashdata('error_message', 'Terjadi kesalahan pada saat proses download.');
						//return callback error
						echo json_encode(array('status' => FALSE));				
					}
				}
			}
		} else {
			$this->session->set_flashdata('error_message', 'Cart kosong.');
			echo json_encode(array('status' => FALSE));
		}
	}

	public function clear_cart() {		
		if($this->input->is_ajax_request()) {
			$this->cart_belancon->clear();
		} 
	}

	public function set_default_cart() {
		if($this->input->is_ajax_request()) {
			$result = $this->icon_model->get_random(2);
			$cart = $this->cart_belancon->contents();

			if($result && count($cart) < 1) {
				foreach($result as $item) {
					$data = array(
				        'id'      => $item->id,
				        'qty'     => 1,
				        'price'   => $item->price,
				        'name'    => $item->name,
				        'category' => $item->category,
				        'path_img' => $this->_path_thumbnail."/".$item->default_image,
				        'type' => $item->type
					);

					$this->cart_belancon->insert($data);
				}
			}
		}
	}

	protected function _get_folder($type) {
		switch ($type) {
			case 'png':
				return cloud_path('png');
				break;
			case 'psd':
				return cloud_path('psd');
				break;
			case 'ai':
				return cloud_path('ai');
				break;
			default:
				return cloud_path('png');
				break;
		}
	}
}