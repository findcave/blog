<?php
class My_controller extends CI_Controller {
    public $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function site_data()
    {
        $this->load->model('common');
        $data['channels'] = $this->common->get_all_item('channel');
        return $data;
    }
}