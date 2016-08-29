<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
	'protocol'  => 'smtp',
	'smtp_host' => 'ssl://smtp.googlemail.com',
	'smtp_user' => 'belancon.dev@gmail.com',
	'smtp_pass' => 'mohokuoso',
	'smtp_port' => 465,
	'mailtype'  => 'html',
	'charset'   => 'iso-8859-1',
	'starttls'  => true,
	'crlf'      => "\r\n",
	'wordwrap' => TRUE,
        'newline'   => "\r\n"
);