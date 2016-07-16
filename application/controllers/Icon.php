<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Icon extends CI_Controller {

	private $limit = 12;

	protected $_path_img = "";
	protected $_folder_png = "upload/png/";
	protected $_folder_psd = "upload/psd/";
	protected $_folder_ai = "upload/ai/";

	function __construct()
    {
        parent::__construct();
        $this->load->library('user_belancon');
        $this->load->model(array('icon_model', 'file_model'));
        $this->_path_img = base_url('assets/public/themes/belancon/img/');
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

			$img_icon_folder = $this->_path_img;

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
				$data = array('path' => $this->_path_img."/".$icon->default_image);
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

	public function cart() {
		$this->load->library('template');
        $this->template->set_platform('public');
        $this->template->set_theme('belancon');  

        $this->template->set_title('Belancon | Belanja Icon untuk Kebutuhan Desainmu');
        $this->template->set_meta('author','Angga Risky');
        $this->template->set_meta('keyword','Download free Icons, Download Icon Gratis, Flat Icon Gratis');
        $this->template->set_meta('description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');

        $this->template->set_css('bootstrap.css');
        $this->template->set_css('toastr.css');
        $this->template->set_css('sweetalert.css');  
        $this->template->set_css('toastr.css');  
        $this->template->set_css('style.css');
        $this->template->set_css('font-awesome.css');
        $this->template->set_js('jquery-1.12.1.min.js','header');
        $this->template->set_js('bootstrap.js','footer');
        $this->template->set_js('toastr.js','footer');
        $this->template->set_js('sweetalert.min.js','footer');
        $this->template->set_js('toastr.js','footer');
        
        $this->template->set_layout('cart_view');
        $this->template->render();
	}

	public function add_to_cart() {		
		if( $this->input->is_ajax_request() ) {
			$id = $this->input->post('id');
			$token = $this->input->post('token');
			$img_icon_folder = $this->_path_img;

		//if($token === $this->user_belancon->get_token()) {		
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
		// } else {
		// 	$result = array('status'=> false, 'error' => 'not authorized');
		// }

			echo json_encode($result);
		} else {
			redirect('/');
		}
	}

	public function remove_from_cart() {	
		if( $this->input->is_ajax_request() ) {	
			$id = $this->input->post('id');
			$token = $this->input->post('token');

			//if($token === $this->user_belancon->get_token()) {
				$deleted = $this->cart_belancon->remove($id);

				if($deleted) {
					$result = array('status'=> true);	
				} else {
					$result = array('status'=> false, 'error' => 'failed deleted item from cart');
				}
			// } else {
			// 	$result = array('status'=> false, 'error' => 'not authorized');
			// }

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

	public function download_all($type, $token) {
		$this->load->helper(array('file', 'download'));

		//if($token == $this->user_belancon->get_token()) {
			$cart = $this->cart_belancon->contents();
			$this->load->library('zip');

				if(count($cart) > 0) {
					$files = array();
					$ids = array();

					foreach($cart as $item) {
						$ids[] = $item['id'];
					}

					$result = $this->file_model->get_files($ids, 'icon_id', $type);

					if($result) {
						foreach($result as $item) {
							$name_string = strtolower($cart[$item->icon_id]['name']);
							$name = str_replace(" ","-",$name_string).".".$type;					
							$path = $this->_get_folder($type).$item->filename;						
							$checkFileIsExist = $this->zip->read_file($path, $name);	
							//$data = file_get_contents($path);
							//$files[$name] = $data;

							if($checkFileIsExist === false) {
								$this->cart_belancon->clear();
								$this->session->set_flashdata('error_message', 'Terdapat File yang tidak ditemukan. download gagal');

								redirect('/cart', 'refresh');
								die();
							}
						}
					}					
							
					$zip_content = $this->zip->get_zip();
					$random_num = rand();
					$text = $this->user_belancon->random_string('encrypt', $random_num);
					$pagename = "belancon-".strtolower($text);

					$newFileName = './download/'.$pagename.".zip";

					echo $newFileName;
			
					if(file_put_contents($newFileName,$zip_content)!=false){
					    $this->session->set_flashdata('success_message', 'Berhasil mendowload icon.');
					    $this->cart_belancon->clear();
					    force_download($newFileName, NULL);
					    redirect('/', 'refresh');
					} else{						
						$this->cart_belancon->clear();
					    $this->session->set_flashdata('error_message', 'Terjadi kesalahan pada saat proses download.');
					    redirect('/cart', 'refresh');
					}

				} else {
					redirect('/cart', 'refresh');
				}
		// } else {
		// 	echo "no";
		// }
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
				        'path_img' => $this->_path_img."/".$item->default_image,
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
				return $this->_folder_png;
				break;
			case 'psd':
				return $this->_folder_psd;
				break;
			case 'ai':
				return $this->_folder_ai;
				break;
			default:
				return $this->_folder_png;
				break;
		}
	}
}