<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Trello_api 
{
	private $account = '';
	private $key = '';
	private $token = '';


	function __construct() {
		$this->ci =& get_instance();
		$this->ci->load->config('trello');
		$this->account = $this->ci->config->item('trello_account');
		$this->key = $this->ci->config->item('trello_key');
		$this->token = $this->ci->config->item('trello_token');
	}


	public function get_boards() {		
		$url = 'https://api.trello.com/1/member/'.$this->account.'/boards?key='.$this->key.'&token='.$this->token;
		$response = $this->_call_api('GET', $url);
		$result = json_decode($response);

		return $result;
	}

	public function insert_card($list_id, $data) {
		$profile = $this->get_profile();
		$member_id = $profile->id;

		$data['idMembers'] = $member_id;
		$data['idList'] = $list_id;
		
		$url = 'https://api.trello.com/1/cards/?key='.$this->key.'&token='.$this->token;
		$response = $this->_call_api('POST', $url, $data);

		$result = json_decode($response);

		return $result;
	}

	public function get_profile($fieldsArr = array()) {
		if(count($fieldsArr) === 0) {
			$fieldsArr[] = 'id';
		}

		$fields = implode (",", $fieldsArr);

		$url = 'https://api.trello.com/1/member/'.$this->account.'?fields='.$fields.'&key='.$this->key.'&token='.$this->token;
		$response = $this->_call_api('GET', $url);
		$result = json_decode($response);

		return $result;
	}

	protected function _call_api($method, $url, $data = false)
	{
	    $curl = curl_init();

	    switch ($method)
	    {
	        case "POST":
	            curl_setopt($curl, CURLOPT_POST, 1);

	            if ($data)
	                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	            break;
	        case "PUT":
	            curl_setopt($curl, CURLOPT_PUT, 1);
	            break;
	        default:
	            if ($data)
	                $url = sprintf("%s?%s", $url, http_build_query($data));
	    }

	    // Optional Authentication:
	    //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	    //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

	    curl_setopt($curl, CURLOPT_URL, $url);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	    $result = curl_exec($curl);

	    curl_close($curl);

	    return $result;
	}
}