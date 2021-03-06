<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Recaptcha configuration settings
 * 
 * recaptcha_sitekey: Recaptcha site key to use in the widget
 * recaptcha_secretkey: Recaptcha secret key which is used for communicating between your server to Google's
 * lang: Language code, if blank "en" will be used
 * 
 * recaptcha_sitekey and recaptcha_secretkey can be obtained from https://www.google.com/recaptcha/admin/
 * Language code can be obtained from https://developers.google.com/recaptcha/docs/language
 * 
 * @author Damar Riyadi <damar@tahutek.net>
 */

$config['recaptcha_sitekey'] = (ENVIRONMENT === 'production') ? "6Le57iQTAAAAAL_BRbiXfgZSkYIYn9GrNcSy_PPJ" : "6Ld37yQTAAAAAINorhtMH0ljUD3p_ZXjP7M9Nr_g";
$config['recaptcha_secretkey'] = (ENVIRONMENT === 'production') ? "6Le57iQTAAAAAGPBcr1BiS5FSRhW5D61ExJ7e1_q" : "6Ld37yQTAAAAAJ25tqkDPHe7NLCG5xRbYa-qmjob";
$config['lang'] = "";