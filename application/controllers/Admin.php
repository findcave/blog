<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {

        $data['posts'] = $this->admin_model->get_all_item('posts');
        $data["channel"] =array();

        if($data['posts']){
            foreach($data["posts"] as $val){
                $data["channel"][] = $this->users->get_one_item('channel','id',$val->channelid);
                $data["users"][] = $this->post->get_one_item('users','id',$val->userid);
            }
        }

        $data['page'] = 'posts/index';
        $this->load->view('admin/page', $data);

    }


}
