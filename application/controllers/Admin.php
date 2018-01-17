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

                $favorite = $this->post->get_one_items('favourite','postid',$val->id);
                $data["favourite"][] = sizeof($favorite);

                $tagss='';     $tag_array[]= '';
                if(!empty($val->tags))
                {
                    $tagss=explode(',',$val->tags);

                    $i = 0 ;
                    foreach($tagss as $tag)
                    {

                        $tag_array_val= $this->post->get_one_item('tags','id',$tag);
                        $tag_array[$i]= $tag_array_val->name;
                        $i++;
                    }
                }
                $data['tags'][] = $tag_array ;
            }
        }

        $data['page'] = 'posts/index';
        $this->load->view('admin/page', $data);

    }

    public function show()
    {
        $data['posts'] = $this->admin_model->get_one_items('posts','status',0);
        $data["channel"] =array();

        if($data['posts']){
            foreach($data["posts"] as $val){
                $data["channel"][] = $this->users->get_one_item('channel','id',$val->channelid);
                $data["users"][] = $this->post->get_one_item('users','id',$val->userid);
                $tagss='';     $tag_array[]= '';
                if(!empty($val->tags))
                {
                    $tagss=explode(',',$val->tags);

                    $i = 0 ;
                    foreach($tagss as $tag)
                    {

                        $tag_array_val= $this->post->get_one_item('tags','id',$tag);
                        $tag_array[$i]= $tag_array_val->name;
                        $i++;
                    }
                }
                $data['tags'][] = $tag_array ;
            }
        }

        $data['page'] = 'posts/index';
        $this->load->view('admin/page', $data);
    }


}
