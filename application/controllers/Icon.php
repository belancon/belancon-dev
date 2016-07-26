<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Icon extends CI_Controller {

	private $limit = 12;

	protected $_path_thumbnail = "";
	protected $_folder_png = "";
	protected $_folder_psd = "";
	protected $_folder_ai = "";

	function __construct()
    {
        parent::__construct();
        $this->load->library('user_belancon');
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
			$more = count($data) < $this->limit ? false : true;

			if(count($data) > 0) {
				
				foreach ($data as $icon) {
					$id = $icon['id'];
					$icons[] = array(
						'id' => $icon['id'],
						'name' => $icon['name'],
						'path' => $img_icon_folder."/".$icon['default_image'],
						'onCart' => isset($cart[$id]) ? true : false
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
						'status' => true,						
					);
				} else {
					$result = array('status'=> false, 'error' => 'failed added item to cart');	
				}
			} else {
				$result = array('status'=> false, 'error' => 'icon not found');
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
					$result = array('status'=> true);	
				} else {
					$result = array('status'=> false, 'error' => 'failed deleted item from cart');
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
					$name = str_replace(" ","-",$name_string).".".$type;
					//get file
					$path = $this->_get_folder($type)."/".$item->filename;		
					$data = read_file($path);			

					if($data === false) {
						//if file not found
						echo json_encode(array('status' => false, 'message' => 'file '.$name_string.'.'.$type.' tidak ditemukan'));
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
					if(file_put_contents($newFileName,$zip_content)!=false){
						//if exist
						//set message success
						$this->session->set_flashdata('success_message', 'Icon berhasil didownload.');
						//clear cart
						$this->cart_belancon->clear();
						//return callback success
						echo json_encode(array('status' => true, 'path' => base_url().'download/'.$pagename.'.zip'));
					} else {
						//clear cart
						$this->cart_belancon->clear();
						//set message error
						$this->session->set_flashdata('error_message', 'Terjadi kesalahan pada saat proses download.');
						//return callback error
						echo json_encode(array('status' => false));				
					}
				}
			}
		} else {
			$this->session->set_flashdata('error_message', 'Cart kosong.');
			echo json_encode(array('status' => false));
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