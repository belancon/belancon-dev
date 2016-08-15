<?php defined('BASEPATH') OR exit('No direct script access allowed');


// include your composer dependencies
require_once(APPPATH.'vendor/autoload.php');

class Google {

   private $client;

   public function __construct() {
   	// Load config
   	$ci =& get_instance();
        $ci->load->config('google');
        
       if(!$this->client) {
       	   $this->client = new Google_Client();
       	   $this->client->setApplicationName("Demo Dev Belancon");
	   $this->client->setClientId($ci->config->item('google_client_id'));
	   $this->client->setClientSecret($ci->config->item('google_client_secret'));
	   $this->client->setRedirectUri($ci->config->item('google_redirect_url'));
	   $this->client->setDeveloperKey($ci->config->item('google_server_key'));
	   $this->client->addScope("https://www.googleapis.com/auth/userinfo.email");
       }
   }
   
   public function getClient() {
      return $this->client;
   }
   
   public function login_url() {
   	// Send Client Request
   	$client = $this->client;
   	return $client->createAuthUrl();
   }
 }