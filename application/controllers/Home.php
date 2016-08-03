<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    private $_TYPE_FILES = array('png', 'psd', 'ai', 'cdr', 'svg');

    function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->template->set_platform('public');
        $this->template->set_theme('belancon');        
    }

    public function index()
    {       

        $this->template->set_title('Belancon | Belanja Icon untuk Kebutuhan Desainmu');
        $this->template->set_meta('author','Belancon Team');
        $this->template->set_meta('keyword','Download free Icons, Download Icon Gratis, Flat Icon Gratis');
        $this->template->set_meta('description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');
            
        $this->_loadcss();
        $this->_loadjs();
        $this->_loadpart();
        $this->_load_script();

        $this->template->set_layout('layouts/main');
        $this->template->set_content('pages/site/home');
        $this->template->render();
    }

    public function icons($icon_url) {
        $this->load->helper(array('dateindo','form', 'share'));
        $this->load->library('cart_belancon');
        $this->load->model(array('icon_model', 'file_model'));

        if($icon_url == null) {
            redirect('/', 'refresh');
        }

        $result = $this->icon_model->get_one_with_detail($icon_url, 'url');
        $cart = $this->cart_belancon->contents();

        if($result) {
            $icon = $result['icon'];
            $data['files'] = $this->file_model->get_file($icon->id, 'icon_id', $this->_TYPE_FILES);
            $data['icon'] = $icon;
            $data['on_cart'] = isset($cart[$icon->id]) ? "true" : "false";
            $data['other_icons'] = $result['other_icons'];
            $data['page_url'] = site_url().'icons/'.$icon->url;
            $data['page_identifier'] = $icon->url;
            $data['show_disqus'] = (ENVIRONMENT == 'production') ? TRUE : FALSE;
            $share_fb = share_url('facebook',  array('url'=> $data['page_url'], 'text'=> $icon->name));
            $share_twitter = share_url('twitter',  array('url'=> $data['page_url'], 'text'=> $icon->name.' untuk icon gratis didesain oleh belancon', 'original_referer'=> $data['page_url']));
            $data['share_fb'] = "MyWindow=window.open('".$share_fb."',
            'MyWindow','width=600,height=300'); return false;";            
            $data['share_twitter'] = "MyWindow=window.open('".$share_twitter."',
            'MyWindow','width=600,height=300'); return false;";


            $this->template->set_title('Belancon | Belanja Icon untuk Kebutuhan Desainmu');
            $this->template->set_meta('author','Belancon Team');
            $this->template->set_meta('keyword','Download free Icons, Download Icon Gratis, Flat Icon Gratis');
            $this->template->set_meta('description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');            
            $this->template->set_meta_property('og:title', $icon->name." untuk icon gratis didesain oleh belancon", TRUE);

            //set meta tags for share twitter
            $this->template->set_meta('twitter:card','summary_large_image');
            $this->template->set_meta('twitter:site','@belancon');
            $this->template->set_meta('twitter:creator','@belancon');
            $this->template->set_meta('twitter:title', $icon->name." untuk icon gratis didesain oleh belancon");
            $this->template->set_meta('twitter:description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');
            $this->template->set_meta('twitter:image', cloud_path('png/'.$icon->filename));
            $this->template->set_meta('twitter:domain', site_url());

            //set meta property for share facebook
            $this->template->set_meta_property('og:site_name', 'Belancon', TRUE);
            $this->template->set_meta_property('og:url', $data['page_url'], TRUE);
            $this->template->set_meta_property('og:description', 'Download gratis Icon untuk kebutuhan design website, design flyer, design print-out', TRUE);            
            $this->template->set_meta_property('og:image', cloud_path('png/'.$icon->filename), TRUE);
            $this->template->set_meta_property('og:image:width', '600', TRUE);
            $this->template->set_meta_property('og:image:height', '315', TRUE);
            $this->template->set_meta_property('og:image:type', 'image/png', TRUE);
            $this->template->set_meta_property('fb:app_id', '237152040017888', TRUE);
           
            $breadcrumb = array(
                array(
                    'name' => 'Home',
                    'path' => site_url()
                ),
                array(
                    'name' => 'Icons',
                    'path' => site_url()
                ),
                array(
                    'name' => $icon->name,
                    'path' => null
                ),
            );
            $this->template->set_props('breadcrumb', $breadcrumb);

            $this->_loadcss();
            $this->_loadjs();
            $this->_loadpart();
            $this->_load_script();
            
            $this->template->set_layout('layouts/custom');
            $this->template->set_content('pages/site/detail-icon', $data);
            $this->template->render();
        } else {
            redirect('/');
        }
    }

    public function result()
    {       
        $data['searchText'] = $this->input->get('search', TRUE);
        
        $this->template->set_title('Belancon | Belanja Icon untuk Kebutuhan Desainmu');
        $this->template->set_meta('author','Belancon Team');
        $this->template->set_meta('keyword','Download free Icons, Download Icon Gratis, Flat Icon Gratis');
        $this->template->set_meta('description','Download gratis Icon untuk kebutuhan design website, design flyer, design print-out');

        $this->_loadcss();
        $this->_loadjs();
        $this->_loadpart();
        $this->_load_script();
        
        $this->template->set_layout('layouts/main');
        $this->template->set_content('pages/site/result', $data);
        $this->template->render();
    }

    protected function _loadpart() {
        $this->template->set_part('header', '_parts/header');  
        $this->template->set_part('navbar', '_parts/navbar'); 
        $this->template->set_part('loader', '_parts/loader');
        $this->template->set_part('notification', '_parts/notification');
        $this->template->set_part('footer', '_parts/footer');
    }

    protected function _loadcss() {
        $this->template->set_css('bootstrap.css');
        $this->template->set_css('sweetalert.css'); 
        $this->template->set_css('toastr.css');  
        $this->template->set_css('style.css');            
        $this->template->set_css('font-awesome.css');
    }

    protected function _loadjs() {
        $this->template->set_js('jquery-1.12.1.min.js','header');
        $this->template->set_js('bootstrap.js','footer');
        $this->template->set_js('sweetalert.min.js','footer');    
        $this->template->set_js('toastr.js','footer');
    }

    protected function _load_script() {
        $path = base_url().'js/';

        $this->template->set_js($path.'general.js','footer', 'remote');
        $this->template->set_js($path.'user.js','footer', 'remote');
        $this->template->set_js($path.'icon.js','footer', 'remote');
        $this->template->set_js($path.'cart.js','footer', 'remote');
        $this->template->set_js($path.'script.js','footer', 'remote');
    }
}