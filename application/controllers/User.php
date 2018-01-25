<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index()
    {

        $data['posts'] = $this->users->get_one_items('posts','userid',$_SESSION['userid']);
        $data["channel"] =array();

        if($data['posts']){
            foreach($data["posts"] as $val){
                $data["channel"][] = $this->users->get_one_item('channel','id',$val->channelid);
                $data["users"][] = $this->post->get_one_item('users','id',$val->userid);
            }
        }

        $data['page'] = 'posts/index';
        $this->load->view('user/page', $data);

    }


}
