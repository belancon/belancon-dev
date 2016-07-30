<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();      
    }

    protected function _resize_image($config = array(), $data = array())
    {
        $image_config["image_library"] = "gd2";
        $image_config["source_image"] = $data["full_path"];
        $image_config['create_thumb'] = FALSE;
        $image_config['maintain_ratio'] =TRUE;
        $image_config['new_image'] = $config['new_path'].''. $data["file_name"];
        $image_config['quality'] = "100%";
        $image_config['width'] = $config['width'];
        $image_config['height'] = $config['width'];
        $dim = (intval($data["image_width"]) / intval($data["image_height"])) - ($image_config['width'] / $image_config['height']);
        $image_config['master_dim'] = ($dim > 0)? "height" : "width";

        $this->load->library('image_lib');
        $this->image_lib->initialize($image_config);

        if(!$this->image_lib->resize()) {
            $errors =  $this->image_lib->display_errors();
            $result = array(
                'status' => FALSE,
                'msg'   => $errors
                );

            return $result;
        }else {
            $image_config['image_library'] ='gd2';
            $image_config['source_image']= $config['new_path'].''. $data["file_name"];
            $image_config['new_image'] = $config['new_path'].''. $data["file_name"];
            $image_config['quality'] = "100%";
            $image_config['maintain_ratio'] = FALSE;
            $image_config['width'] = $config['width'];
            $image_config['height'] = $config['height'];
            $image_config['x_axis'] = $config['x_axis'];
            $image_config['y_axis'] = $config['y_axis'];

            $this->image_lib->clear();
            $this->image_lib->initialize($image_config);

            if(!$this->image_lib->crop()) {
                $errors =  $this->image_lib->display_errors();

                $result = array(
                    'status' => FALSE,
                    'msg'   => $errors
                    );

                return $result;

            }else {

                $result = array(
                    'status' => TRUE,
                    'filename' => $data['file_name']
                    );

                return $result;
            }
        }
    }
}