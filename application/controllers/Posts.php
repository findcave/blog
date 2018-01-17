<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller
{
    var $data;

    public function  __construct()
    {
        parent::__construct();

        $this->channel = $this->post->get_one_items('channel','status',1);
        $this->tags = $this->post->get_all_item('tags');
        $this->date = mdate('%Y-%m-%d', now());
    }


    public function index(){

        $date = $this->date;

        $data['posts'] = $this->post->get_one_items_less_equal('posts','status',1,'publishdate',$date);

        foreach($data["posts"] as $val){
            $data["channel"][] = $this->post->get_one_item('channel','id',$val->channelid);
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

        $data['channels'] = $this->channel;
        $data['page'] = 'posts/index';

        $this->load->view('page', $data);

    }

    public function create()
    {

        $data['channels'] = $this->channel;
        $data['tags'] = $this->post->get_all_item('tags');
        $data['page'] = 'posts/create';
        $this->load->view('user/page', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('channel', 'Channel', 'trim|required');
        $this->form_validation->set_rules('publishingdate', 'Publishing Date', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required|trim|alpha_dash|is_unique[posts.slug]');

        if($this->form_validation->run() == FALSE){

            $data['channels'] =  $this->channel;
            $data['tags'] = $this->tags;

            $data['page'] = 'posts/create';
            $this->load->view('user/page', $data);

        }else {

            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $channel = $this->input->post('channel');
            $publishingdate = $this->input->post('publishingdate');
            $slug = $this->input->post('slug');



            $tagarr = $this->input->post('tag');
            $tags='';
            if(sizeof($tagarr)>1)
            {
                foreach($tagarr as $tag)
                {
                    if($tags == ''){ $tags =  $tag;   }
                    else{ $tags = $tags.','. $tag;  }
                }
            }

            $pic ='';
            $filename =   $_FILES["pic"]["name"];

            if(!empty($filename))
            {
                $return = array('status'=>false);
                $file_name = 'post_img';

                $config['upload_path']   =   "assets/blogpost/";
                $config['allowed_types'] =   "gif|jpg|jpeg|png";
                $config['max_size']      =   "5000";
                $config['max_width']     =   "1024000";
                $config['max_height']    =   "768000";
                $config['file_name'] = $file_name."_".base_convert(time(),10,36).'.jpg';
                $config['overwrite'] = false;

                $this->upload->initialize($config);

                if(!$this->upload->do_upload('pic'))
                {
                    echo $this->upload->display_errors();
                }
                else
                {
                    $data = $this->upload->data();
                    $return['file']= $data['file_name'].'_'.base_convert(time(),10,36);
                    $config = array();
                    $config['source_image']	= "assets/blogpost/".$data['file_name'];
                    $config['new_image']	= "assets/blogpost/thumb/".$data['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']	= 121;
                    $config['height']	= 92;

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $return['status']= true;

                    $pic = $data['raw_name'].$data['file_ext'];
                }

            }

            $datas = array(
                'title' => $title,
                'description' => $description,
                'channelid' => $channel,
                'userid' => $_SESSION['userid'],
                'slug' => $slug,
                'publishdate' => $publishingdate,
                'tags' =>$tags,
                'image' => $pic,
            );
            $flag = $this->post->item_insert('posts', $datas);

            if($flag){
                $this->session->set_flashdata('toast_success','Post Added Successfully  !!!');
                redirect('user');
            }else{
                $this->session->set_flashdata('toast_error','Failed. Try Again !!!');
                redirect('posts/create');
            }
        }
    }

    public function edit($slug)
    {
        $data['channels'] = $this->channel;
        $data['tags'] = $this->tags ;

        $data['post'] = $this->post->get_one_item('posts','slug',$slug);
        $data['page'] = 'posts/edit';

        $this->load->view('user/page', $data);
    }

    public function update()
    {
        $id =  trim($this->security->xss_clean($this->input->post('id')));

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('channel', 'Channel', 'trim|required');
        $this->form_validation->set_rules('publishingdate', 'Publishing Date', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['channels'] = $this->channel;
            $data['tags'] = $this->tags ;
            $data['page'] = 'posts/edit';
            $data['post'] = '';
            $this->load->view('user/page', $data);

        } else {


            $tagarr = $this->input->post('tag');
            $tags='';
            if(sizeof($tagarr)>1)
            {
                foreach($tagarr as $tag)
                {
                    if($tags == ''){ $tags =$tag;   }
                    else{ $tags = $tags.','. $tag;  }
                }
            }

            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'channelid' =>$this->input->post('channel'),
                'publishdate' => $this->input->post('publishingdate'),
                'tags' =>$tags,
            );

            $flag = $this->post->update_one_item($id, 'id', 'posts', $data);

            if ($flag) {
                $this->session->set_flashdata('toast_success', 'Post Updated Successfully  !!!');
                redirect('user/show');
            } else {
                $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
                redirect('user/show');
            }
        }
    }

    public function destroy($slug)
    {
        $image = $this->post->get_one_item('posts','slug',$slug);
        if((!empty($image->image)))
        {
            unlink('assets/blogpost/'.$image->image);
            unlink('assets/blogpost/thumb/'.$image->image);
        }
        $this->post->delete($slug,'slug','posts');

        redirect('user/show');
    }

    public function changeStatus($id)
    {
        $status = $this->input->post('status');
        if($status == 1) { $data = array('status'=>0) ; } else { $data = array('status'=>1) ; }

        $flag = $this->post->update_one_item($id, 'id', 'posts', $data);

        if($flag)
        {
            $this->session->set_flashdata('toast_success', 'Updated Successfully  !!!');
            redirect('admin');
        }
        else{
            $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
            redirect('admin');
        }

    }

    public function show($field,$value)
    {
        $date = $this->date;

        if($field == 'auther'){

           if($this->session->userdata('userid') != ""){
               $data["posts"] = $this->post->get_one_items('posts','userid',$value);
            }
            else{
                $data["posts"] = $this->post->get_two_items_less_equal('posts','userid',$value,'status',1,'publishdate',$date);
            }
        }

        if($field == 'channel'){
            if($this->session->userdata('usertype') == 2){
                $data["posts"] = $this->post->get_two_items('posts','channelid',$value,'userid',$this->session->userdata('userid'));
            }
            elseif($this->session->userdata('usertype') == 1){
                $data["posts"] = $this->post->get_one_items('posts','channelid',$value);
            }
            else{
                $data["posts"] = $this->post->get_two_items_less_equal('posts','channelid',$value,'status',1,'publishdate',$date);
            }
        }

        if($field == 'tags'){

            $tag = $this->post->get_one_item('tags','name',$value);

            if($this->session->userdata('usertype') == 2){
                $data["posts"] = $this->post->get_one_items_like('posts','tags',$tag->id,'userid',$this->session->userdata('userid'));
            }
            elseif($this->session->userdata('usertype') == 1){
                $data["posts"] = $this->post->get_items_like('posts','tags',$tag->id);
            }
            else{
                $data["posts"] = $this->post->get_one_items_less_equal_like('posts','tags',$tag->id,'status',1,'publishdate',$date);
            }
        }


        foreach($data["posts"] as $val){
            $data["channel"][] = $this->post->get_one_item('channel','id',$val->channelid);
            $data["users"][] = $this->post->get_one_item('users','id',$val->userid);
            $tagss='';     $tag_array[]= '';

            $favorite = $this->post->get_one_items('favourite','postid',$val->id);
            $data["favourite"][] = sizeof($favorite);


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

        $data['channels'] = $this->post->get_all_item('channel');
        $data['page'] = 'posts/index';

        if($this->session->userdata('userid') != ""){
           $this->load->view('user/page', $data);
        }
        else{
            $this->load->view('posts/page', $data);
        }
    }

    public function updateimage(){
        $filename =   $_FILES["pic"]["name"];

        $id = $this->input->post('id');
        if(!empty($filename))
        {
            $return = array('status'=>false);
            $file_name = 'post_img';

            $config['upload_path']   =   "assets/blogpost/";
            $config['allowed_types'] =   "gif|jpg|jpeg|png";
            $config['max_size']      =   "5000";
            $config['max_width']     =   "1024000";
            $config['max_height']    =   "768000";
            $config['file_name'] = $file_name."_".base_convert(time(),10,36).'.jpg';
            $config['overwrite'] = false;

            $this->upload->initialize($config);

            if(!$this->upload->do_upload('pic'))
            {
                echo $this->upload->display_errors();
            }
            else
            {
                $data = $this->upload->data();
                $return['file']= $data['file_name'].'_'.base_convert(time(),10,36);
                $config = array();
                $config['source_image']	= "assets/blogpost/".$data['file_name'];
                $config['new_image']	= "assets/blogpost/thumb/".$data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width']	= 121;
                $config['height']	= 92;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $return['status']= true;

                $data = array(
                    'image' => $data['raw_name'].$data['file_ext'],
                );
                $flag = $this->post->update_one_item($id, 'id', 'posts', $data);
                if ($flag) {
                    $this->session->set_flashdata('toast_success', 'Post Updated Successfully  !!!');
                    redirect('user/show');
                } else {
                    $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
                    redirect('user/show');
                }

            }

        }else{
            redirect('user/show');
        }
    }

}
