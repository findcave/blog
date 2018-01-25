<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function index()
	{
        $data['channels'] = $this->common->get_one_items('channel','status',1);
        $data['page'] = 'index';
        $this->load->view('page', $data);

	}


}
