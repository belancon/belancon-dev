<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['sendgrid'] = array(
	'protocol'  => 'smtp',
	'smtp_host' => 'smtp.sendgrid.net',
	'smtp_user' => 'belancon',
	'smtp_pass' => 'anggarizqi123',
	'smtp_port' => 587,
	'mailtype'  => 'html',
	'charset'   => 'iso-8859-1',
	'starttls'  => true,
	'crlf'      => "\r\n",
    'newline'   => "\r\n"
);