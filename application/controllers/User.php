<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function  __construct()
    {
        parent::__construct();
        $this->date = mdate('%Y-%m-%d %H:%M:%S', now());
    }


    public function index()
    {
        $date = $this->date;

        $data['posts'] = $this->post->get_one_items_less_equal('posts','status',1,'publishdate',$date);

        foreach($data["posts"] as $val){
            $data["channel"][] = $this->post->get_one_item('channel','id',$val->channelid);
            $data["users"][] = $this->post->get_one_item('users','id',$val->userid);

            $favorite = $this->post->get_one_items('favourite','postid',$val->id);
            $data["favourite"][] = sizeof($favorite);

            $isfavorite = $this->post->get_two_items('favourite','postid',$val->id,'userid',$_SESSION['userid']);
            if(!empty($isfavorite)):
              $data["isfavourited"][] = 1;
            else:
                $data["isfavourited"][] = 0;
            endif;


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

        $data['channels'] = $this->channel;
        $data['page'] = 'posts/index';

        $this->load->view('user/page', $data);

    }

    public function show(){
        $data['posts'] = $this->users->get_one_items('posts','userid',$_SESSION['userid']);
        $data["channel"] =array();

        if($data['posts']){
            foreach($data["posts"] as $val){
                $data["channel"][] = $this->users->get_one_item('channel','id',$val->channelid);
                $data["users"][] = $this->post->get_one_item('users','id',$val->userid);

                $favorite = $this->post->get_one_items('favourite','postid',$val->id);
                $data["favourite"][] = sizeof($favorite);

                $favorite = $this->post->get_one_items('favourite','postid',$val->id);
                $data["favourite"][] = sizeof($favorite);

                $isfavorite = $this->post->get_two_items('favourite','postid',$val->id,'userid',$_SESSION['userid']);
                if(!empty($isfavorite)):
                    $data["isfavourited"][] = 1;
                else:
                    $data["isfavourited"][] = 0;
                endif;


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
        $this->load->view('user/page', $data);

    }

    public function favourite($postid,$userid){
        $favourited = $this->users->get_two_items('favourite','postid',$postid,'userid',$userid);
        if(empty($favourited)){

            $data['postid']= $postid;
            $data['userid']= $userid;
            $this->users->item_insert('favourite',$data);

        }

        redirect('user');
    }

    public function unfavourite($postid,$userid){
        $favourited = $this->users->get_two_items('favourite','postid',$postid,'userid',$userid);
        if(!empty($favourited)){

            $this->users->delete($favourited[0]->id,'id','favourite');
        }

        redirect('user');
    }

}
