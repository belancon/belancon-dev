<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Settings.
| -------------------------------------------------------------------------
*/
$config['app_id'] 		= '1738455646408994'; 		// Your app id
$config['app_secret'] 	= '8773dc2eaa706be1b30814539b319413'; 		// Your app secret key
$config['scope'] 		= 'email'; 	// custom permissions check - http://developers.facebook.com/docs/reference/login/#permissions
$config['redirect_uri'] = ''; 		// url to redirect back from facebook. If set to '', site_url('') will be used