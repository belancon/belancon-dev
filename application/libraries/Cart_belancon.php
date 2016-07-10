<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_belancon {

	/**
	 * Reference to CodeIgniter instance
	 *
	 * @var object
	 */
	protected $CI;

	/**
	 * Contents of the cart
	 *
	 * @var array
	 */
	protected $_cart_contents = array();

	protected $_cart_total = 0;


	function __construct($params = array())
	{
		$this->CI =& get_instance();
		// Are any config settings being passed manually?  If so, set them
		$config = is_array($params) ? $params : array();

		// Load the Sessions class
		$this->CI->load->driver('session', $config);

		$this->_cart_contents = $this->CI->session->userdata('cart_belancon');

		if(count($this->_cart_contents) > 0) {
			$this->_cart_total = count($this->_cart_contents);
		}

	}

	public function insert($item) {
		
		if(isset($item)) {
			$cart = $this->_cart_contents;	

			if(isset($item['id'])) {
				$cart[$item['id']] = $item;
				$this->_cart_contents = $cart;
				$this->_save_cart($cart);

				return $item['id'];
			}

			return FALSE;
		}
		
		return FALSE;
	}

	public function contents() {
		return $this->CI->session->userdata('cart_belancon');
	}

	public function update() {

	}

	public function remove($id) {
		if(isset($id)) {
			$cart = $this->_cart_contents;	
			unset($cart[$id]);			
			$this->_save_cart($cart);

			return TRUE;
		}

		return FALSE;
	}

	public function total() {
		$cart = $this->CI->session->userdata('cart_belancon');
		return count($cart);
	}

	public function clear() {
		$this->CI->session->unset_userdata('cart_belancon');
	}

	private function _save_cart($cart) {
		$this->CI->session->set_userdata('cart_belancon', $cart);
		return TRUE;
	}
}