<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @package      Content Delivery Network -  BelanCon.com | Belanja Icon 
* @version      1.0
* @author       Belancon Dev Team
* @copyright    Copyright © 2016 Belancon - Belanja Icon.
* @link         https://belancon.com
*/

 //function CDN - Content Delivery Network
 if(!function_exists('cdn'))
 {
 	function cdn($str = NULL)
 	{
 		return get_instance()->config->item('cdn') . $str;
 	}
 }

 //function CLOUD - Server Management storage
 if(!function_exists('cloud'))
 {
 	function cloud($str = NULL)
 	{
 		return get_instance()->config->item('cloud') . $str;
 	}
 } 