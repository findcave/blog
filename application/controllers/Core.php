<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Core extends CI_Controller {

    public function do_upload()
    {

        $config['upload_path']          = 'assets/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('pic'))
        {
            $data = array('error' => $this->upload->display_errors());

        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
        }
        return $data ;
    }


}
