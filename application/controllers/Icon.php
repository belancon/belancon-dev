<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Icon extends MY_Controller {

	private $limit = 12;

	protected $_path_thumbnail = "";
	protected $_folder_png = "";
	protected $_folder_psd = "";
	protected $_folder_ai = "";

    private $_TYPE_FILES = array('png', 'psd', 'ai', 'cdr', 'svg');

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
            $input_user_id = $this->input->post('userId');
			$user_id = $input_user_id != null ? $input_user_id : user_login('id');
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
                        'url' => $icon['url'],			
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

    /**
     * Create New Icon
     */
	public function add() {     
        //check request is ajax    
		if( !$this->input->is_ajax_request() ) {
			redirect('/');
		}

        //set form validation rules
        $this->form_validation->set_rules('name', 'Nama', 'required|min_length[3]');
        $this->form_validation->set_rules('category', 'Kategori', 'required|min_length[3]');
        $this->form_validation->set_rules('type', 'Tipe', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'integer');
        //set custom error validation
        $this->form_validation->set_message('required', '{field} harap diisi');
        $this->form_validation->set_message('integer', '{field} harus berupa angka desimal');
        $this->form_validation->set_message('min_length', '{field} tidak boleh kurang dari {param} karakter.');

        if($this->form_validation->run() === TRUE) {
            //if validation true
            //check file
            $png = 'filepng';
            $psd = 'filepsd';
            $ai = 'fileai';
            $cdr = 'filecdr';
            $svg = 'filesvg';
            $file_png = $_FILES[$png];
            $file_psd = $_FILES[$psd];
            $file_ai = $_FILES[$ai];
            $file_cdr = $_FILES[$cdr];
            $file_svg = $_FILES[$svg];

            if($file_png['name'] == '') {
                //if file not selected
                echo json_encode(array('status'=> FALSE, 'message' => 'File PNG harap dipilih'));
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
                //insert file ai
                if($file_ai['name'] != '') {
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
                //insert file cdr
                if($file_cdr['name'] != '') {
                    $config_cdr = array(
                        'upload_path' => $this->config->item('upload_path')."cdr/",
                        'allowed_types' => 'cdr',
                        'max_size' => '2000',
                        'encrypt_name' => TRUE
                    );
                    $result_cdr = $this->_upload_file($cdr, $file_cdr, $config_cdr);
                } else {
                    $result_cdr = array('status' => TRUE, 'filename' => NULL);
                }
                //insert file svg
                if($file_svg['name'] != '') {
                    $config_svg = array(
                        'upload_path' => $this->config->item('upload_path')."svg/",
                        'allowed_types' => 'svg',
                        'max_size' => '2000',
                        'encrypt_name' => TRUE
                    );
                    $result_svg = $this->_upload_file($svg, $file_svg, $config_svg);
                } else {
                    $result_svg = array('status' => TRUE, 'filename' => NULL);
                }
                //====== END UPLOAD FILE =====//
                
                //check upload file 
                if($result_png['status'] === TRUE && $result_psd['status'] === TRUE && $result_ai['status'] === TRUE && $result_cdr['status'] === TRUE && $result_svg['status'] === TRUE) {
                    //if upload files success
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
                    if($result_cdr['filename'] !== NULL) {
                        $files[] = $result_cdr['filename'];
                    }
                    if($result_svg['filename'] !== NULL) {
                        $files[] = $result_svg['filename'];
                    }
                    //=====================//

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
                    //set message rror
                    $message = "";
                    if($result_png['error'] != null) {
                    	$message .= "File PNG Error : ".$result_png['error']."<br />";
                    }

                    if($result_psd['error'] != null) {
                    	$message .= "File PSD Error : ".$result_psd['error']."<br />";
                    }

                    if($result_ai['error'] != null) {
                    	$message .= "File AI Error : ".$result_ai['error']."<br />";
                    }                 

                    echo json_encode(array('status' => FALSE, 'message' => $message));
                }
            }   
        } else {
            //if upload file failed
            echo json_encode(array('status' => FALSE, 'message' => validation_errors()));
        }
    }

    /**
     * Update Exist Icon     
     */
    public function update() {
        //check request is ajax
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
			

            //check validation upload file PNG
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

            //check validation upload file PSD
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

            //check validation upload file AI
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

    /**
     * Delete Icon (Soft Delete)
     */
    public function delete() {
        //check request is ajax
        if(!$this->input->is_ajax_request()) {
            redirect('/');
        }  
        
        //get id & name icon from form input
    	$id = $this->input->post('id');
    	$name = $this->input->post('name');

        //if id found
    	if($id) {
            //call method on model to delete icon from table
	    	$result = $this->icon_model->delete($id);

	    	if($result) {
                //if success delete
	    		$this->session->set_flashdata('success_message', "Sukses Menghapus Icon ".$name);
	    		$response = array('status' => TRUE);
	    	} else {
                //failed deleted
	    		$response = array('status' => FALSE, 'message' => 'Gagal Menghapus Icon' );
	    	}
    	} else {
            //id not found
    		$response = array('status' => FALSE, 'message' => 'Terjadi Kesalahan sistem' );
    	}

    	echo json_encode($response);
    }

    /**
     * Upload File Icon
     * @param  String $name   input[type file] name
     * @param  Object $file   file
     * @param  Object $config config library upload
     * @return Object         
     */
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

            //create thumbnail for file PNG uploaded
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

    /**
     * Add Icon to Cart
     */
	public function add_to_cart() {		
        //check request is ajax
		if( $this->input->is_ajax_request() ) {
            //get id from form input
			$id = $this->input->post('id');		
            //set path icon folder
			$img_icon_folder = $this->_path_thumbnail;
			//get icon detail
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

                //insert to cart
				$row_id = $this->cart_belancon->insert($data);

				if($row_id) {
                    //if success added to cart
					$icon->path = $img_icon_folder."/".$icon->default_image;
					$result = array(
						'status' => TRUE,						
					);
				} else {
                    //failed added to cart
					$result = array('status'=> FALSE, 'error' => 'failed added item to cart');	
				}
			} else {
                //icon not found
				$result = array('status'=> FALSE, 'error' => 'icon not found');
			}

			echo json_encode($result);
		} else {
			redirect('/');
		}
	}

    /**
     * Remove Icon from Cart
     * @return Object response
     */
	public function remove_from_cart() {	
        //check ajax request
		if( $this->input->is_ajax_request() ) {	
            //get id from form input
			$id = $this->input->post('id');
			//action delete from cart
			$deleted = $this->cart_belancon->remove($id);

			if($deleted) {
                //if success deleted from cart
				$result = array('status'=> TRUE);	
			} else {
                //failed deleted from cart
				$result = array('status'=> FALSE, 'error' => 'failed deleted item from cart');
			}			

			echo json_encode($result);
		} else {
			redirect('/');
		}
	}

    /**
     * Get All Icon on Cart
     * @return [type] [description]
     */
	public function get_cart() {
        //check is ajax request
		if( $this->input->is_ajax_request() ) {
            //define variabel data
			$data = array();
            //get icons on cart
			$cart = $this->cart_belancon->contents();

            //check cart is empty or not
			if(is_array($cart) && count($cart) > 0) {
                //if not empty                
                //append icons on cart to data
				foreach($cart as $item) {
                    $files = $this->file_model->get_file($item['id'], 'icon_id', $this->_TYPE_FILES);

                    $available_png = FALSE;
                    $available_psd = FALSE;
                    $available_ai = FALSE;
                    $available_cdr = FALSE;
                    $available_svg = FALSE;

                    if($files) {
                        foreach($files as $file) {
                            switch ($file->type) {
                                case 'png':                                    
                                    $available_png = TRUE;
                                    break;
                                case 'psd':                                    
                                    $available_psd = TRUE;
                                    break;
                                case 'ai':                                    
                                    $available_ai = TRUE;
                                    break;
                                case 'cdr':                                    
                                    $available_cdr = TRUE;
                                    break;
                                case 'svg':                                    
                                    $available_svg = TRUE;
                                    break;
                                default:
                                    return TRUE;
                                    break;
                            }
                        }  
                    }

					$data[] = array(
						'id' => $item['id'],
						'name' => $item['name'],
						'category' => $item['category'],
						'price' => $item['price'],
						'type' => $item['type'],
						'path' => $item['path_img'],
                        'availablePng' => $available_png,
                        'availablePsd' => $available_psd,
                        'availableAi' => $available_ai,
                        'availableCdr' => $available_cdr,
                        'availableSvg' => $available_svg,
					);
				}
			}

            //return data
			echo json_encode(array('data' => $data));
		} else {
			redirect('/');
		}
	}

    /**
     * Download all/selected icon on cart
     * @return Object response
     */
	public function download_all() {
        //get file type selected
		$type = $this->input->post('type');
        //load helper file & download
		$this->load->helper(array('file', 'download'));
        //load library zip
		$this->load->library('zip');

        //init folder download
		$dir = './download';
        //init file except not deleted
		$leave_files = array('index.html');

        //delete older file temp download
		foreach( glob("$dir/*") as $file ) {
		    if( !in_array(basename($file), $leave_files) )
		        unlink($file);
		}

        //get icons on cart
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
					$license= read_file(cloud_path('text/License.pdf'));
					$this->zip->add_data('License.pdf', $license);

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
			} else {                
                echo json_encode(array('status' => FALSE, 'message' => 'Maaf Icon dengan tipe file yang anda pilih belum tersedia'));    
            }
		} else {
			$this->session->set_flashdata('error_message', 'Cart kosong.');
			echo json_encode(array('status' => FALSE));
		}
	}

    /**
     * Download Single Icon
     * @return Object response
     */
    public function download_single() {
        //get icon id & file type selected
        $id = $this->input->post('id');
        $type = $this->input->post('type');
        //load helper file & download
        $this->load->helper(array('file', 'download'));
        //load library zip
        $this->load->library('zip');

        //init folder download
        $dir = './download';
        //init file except not deleted
        $leave_files = array('index.html');

        //delete older file temp download
        foreach( glob("$dir/*") as $file ) {
            if( !in_array(basename($file), $leave_files) )
                unlink($file);
        }

        //get icons on cart
        $icon = $this->icon_model->get_one($id);
        
        //if icon found
        if($icon) {
            $files = array();
            $ids = array();
            
            //get ids icon
            $ids[] = $icon->id;

            //get filename & path file icon from database
            $result = $this->file_model->get_files($ids, 'icon_id', $type);
            
            if($result) {
                $check = 0;

                foreach($result as $item) {
                    //set filename
                    $name_string = $icon->name;
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
                    $license= read_file(cloud_path('text/License.pdf'));
                    $this->zip->add_data('License.pdf', $license);

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
                        //increase total download
                        $this->icon_model->increase_download($ids);
                        //return callback success
                        echo json_encode(array('status' => TRUE, 'path' => base_url().'download/'.$pagename.'.zip'));
                    } else {                      
                        //set message error
                        $this->session->set_flashdata('error_message', 'Terjadi kesalahan pada saat proses download.');
                        //return callback error
                        echo json_encode(array('status' => FALSE));             
                    }
                }
            }
        } else {
            $this->session->set_flashdata('error_message', 'Icon tidak ditemukan.');
            echo json_encode(array('status' => FALSE));
        }
    }


    /**
     * Remove All icon from cart
     * @return Object response
     */
	public function clear_cart() {	
        //check is ajax request	
		if($this->input->is_ajax_request()) {
            //call action to remove all icon on cart
			$this->cart_belancon->clear();
		} 
	}

    /**
     * Set Default Cart (for Demo)
     */
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

    /**
     * Get Folder Uploaded file icon
     * @param  String $type file type
     * @return Object       path folder icon
     */
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