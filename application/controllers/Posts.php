<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller
{

    public function  __construct()
    {
        parent::__construct();
    }

    public function index(){

        $date = mdate('%Y-%m-%d %H:%i:%s', now());

        $data['posts'] = $this->post->get_one_item_less_equal('posts','status',1,'publishdate',$date);

        foreach($data["posts"] as $val){
            $data["channel"][] = $this->post->get_one_item('channel','id',$val->channelid);
            $data["users"][] = $this->post->get_one_item('users','id',$val->userid);

            $tagss='';     $tag_array = '';
            if(!empty($val->tags))
            {
                $tagss=explode(',',$val->tags);

                foreach($tagss as $tag)
                {

                    $tag_array_val= $this->post->get_one_items('tags','id',$tag);

                    if($tag_array == ''){
                        $tag_array = $tag_array_val[0]->name ;
                    }
                    else{
                        $tag_array = $tag_array.','.$tag_array_val[0]->name;
                    }

                }
             }
             $data['tags'][] = $tag_array ;
        }

        $data['channels'] = $this->post->get_all_item('channel');
        $data['page'] = 'posts/index';

        $this->load->view('page', $data);

    }

    public function create()
    {

        $data['channels'] = $this->post->get_one_items('channel','status',1);
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
            $data['channels'] = $this->post->get_one_items('channel','status',1);
            $data['page'] = 'posts/create';
            $this->load->view('posts/page', $data);
        }else {
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $channel = $this->input->post('channel');
            $publishingdate = $this->input->post('publishingdate');
            $slug = $this->input->post('slug');

            $checked = $this->input->post('status');
            if(isset($checked) == 1) { $status = 1; } else { $status = 0; }

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

            $pic ='default.png';
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
                'tags' => $tags,
                'image' => $pic,
                'status' => $status,
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
        $data['channels'] = $this->post->get_one_items('channel','status',1);

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

        if ($this->form_validation->run() == FALSE) {

            $data['channels'] = $this->post->get_one_items('channel','status',1);

            $data['page'] = 'posts/edit';
            $data['post'] = '';
            $this->load->view('posts/page', $data);

        } else {
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $channel = $this->input->post('channel');
            $checked = $this->input->post('status');
            if(isset($checked) == 1)  { $status = 1 ;  } else { $status = 0; }

            $data = array(
                'title' => $title,
                'description' => $description,
                'channelid' => $channel,
                'status' => $status,
            );
            $flag = $this->post->update_one_item($id, 'id', 'posts', $data);
            if ($flag) {
                $this->session->set_flashdata('toast_success', 'Post Updated Successfully  !!!');
                redirect('user');
            } else {
                $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
                redirect('posts/edit/' . $id);
            }
        }
    }

    public function destroy($slug)
    {
        $this->post->delete($slug,'slug','posts');
        redirect('user');
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
        if($field == 'auther'){
            $data["posts"] = $this->post->get_one_items('posts','userid',$value);
        }
        if($field == 'channel'){
            if($this->session->userdata('userid') != ""){
                $data["posts"] = $this->post->get_two_items('posts','channelid',$value,'userid',$this->session->userdata('userid'));
            }
            else{
                $data["posts"] = $this->post->get_one_items('posts','channelid',$value);
            }
        }
        foreach($data["posts"] as $val){
            $data["channel"][] = $this->post->get_one_item('channel','id',$val->channelid);
            $data["users"][] = $this->post->get_one_item('users','id',$val->userid);
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
                    redirect('user');
                } else {
                    $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
                    redirect('user');
                }

            }

        }else{
            redirect('user');
        }
    }
}
