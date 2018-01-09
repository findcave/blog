<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller
{

    public function  __construct()
    {
        parent::__construct();
        $this->load->model('post');
    }

    public function index()
    {

        $data['posts'] = $this->post->get_all_item('posts');
        $data["channels"] =array();

        foreach($data["posts"] as $val)
        {
            $data["channels"][] = $this->post->get_one_item('channel','id',$val->channelid);
        }


        $data['page'] = 'posts/index';
        $this->load->view('posts/page', $data);
    }

    public function create()
    {

        $data['channels'] = $this->post->get_one_items('channel','status',1);
        $data['page'] = 'posts/create';
        $this->load->view('posts/page', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('channel', 'Channel', 'trim|required');
        $this->form_validation->set_rules('slug', 'Slug', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $data['channels'] = $this->post->get_one_items('channel','status',1);
            $data['page'] = 'posts/create';
            $this->load->view('posts/page', $data);

        } else {
            $title = trim($this->security->xss_clean($this->input->post('title')));
            $description = trim($this->security->xss_clean($this->input->post('description')));
            $channel = trim($this->security->xss_clean($this->input->post('channel')));
            $checked = $this->input->post('status');
            if(isset($checked) == 1)
            {
               $status = 1 ;
            }
            else
            {
                $status = 0 ;
            }

            $datas = array(
                'title' => $title,
                'description' => $description,
                'channelid' => $channel,
                'status' => $status,
            );
            $flag = $this->post->item_insert('posts', $datas);
            if ($flag) {
                $this->session->set_flashdata('toast_success', 'Post Added Successfully  !!!');
                redirect('posts');
            } else {
                $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
                redirect('posts/create');
            }
        }
    }

    public function edit($id)
    {
        $data['channels'] = $this->post->get_one_items('channel','status',1);

        $data['post'] = $this->post->get_one_item('posts', 'id', $id);
        $data['page'] = 'posts/edit';
        $this->load->view('posts/page', $data);
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
            $title = trim($this->security->xss_clean($this->input->post('title')));
            $description = trim($this->security->xss_clean($this->input->post('description')));
            $channel = trim($this->security->xss_clean($this->input->post('channel')));
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
                redirect('posts');
            } else {
                $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
                redirect('posts/edit/' . $id);
            }
        }
    }

    public function destroy($id)
    {
        $this->post->delete($id, 'posts');
        redirect('posts');
    }

    public function changeStatus($id)
    {
        $status = $this->input->post('status');
        if($status == 1)
        {
            $data = array('status'=>0) ;
        }
        else
        {
            $data = array('status'=>1) ;
        }

        $flag = $this->post->update_one_item($id, 'id', 'posts', $data);

        if($flag)
        {
            $this->session->set_flashdata('toast_success', 'Updated Successfully  !!!');
            redirect('posts');
        }
        else{
            $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
            redirect('posts');
        }

    }
}
