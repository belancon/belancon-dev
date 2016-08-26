<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_generals_model extends MY_Model
{
    public $table = 'setting_generals'; // you MUST mention the table name
    public $primary_key = 'id'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();      
    }
}