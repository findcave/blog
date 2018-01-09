<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Channels extends CI_Controller
{

    public function  __construct()
    {
        parent::__construct();
        $this->load->model('channel');

    }

    public function index()
    {
        $data['channels'] = $this->channel->get_all_item('channel');

        $data['page'] = 'channels/index';
        $this->load->view('channels/page', $data);


    }

    public function create()
    {
        $data['page'] = 'channels/create';
        $this->load->view('channels/page', $data);

    }

    public function store()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $data['page'] = 'channels/create';
            $this->load->view('channels/page', $data);

        } else {
            $name = trim($this->security->xss_clean($this->input->post('name')));
            $description = trim($this->security->xss_clean($this->input->post('description')));
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
                'name' => $name,
                'description' => $description,
                'status' => $status,
            );
            $flag = $this->channel->item_insert('channel', $datas);
            if ($flag) {
                $this->session->set_flashdata('toast_success', 'Channel Added Successfully  !!!');
                redirect('channels');
            } else {
                $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
                redirect('channels/create');
            }
        }
    }

    public function edit($id)
    {
        $data['channel'] = $this->channel->get_one_item('channel', 'id', $id);
        $data['page'] = 'channels/edit';
        $this->load->view('channels/page', $data);
    }

    public function update()
    {
         $id =  trim($this->security->xss_clean($this->input->post('id')));

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('id', 'ID', 'trim|required');

        if($this->form_validation->run() == FALSE) {

            $data['page'] = 'channels/edit';
            $data['channel'] = '';
            $this->load->view('channels/page', $data);

        }
        else {
            $name = trim($this->security->xss_clean($this->input->post('name')));
            $description = trim($this->security->xss_clean($this->input->post('description')));
            $checked = $this->input->post('status');
            if(isset($checked) == 1) {  $status = 1 ; } else { $status = 0 ;   }
            $data = array(
                'name' => $name,
                'description' => $description,
                'status' => $status,
            );
            $flag = $this->channel->update_one_item($id, 'id', 'channel', $data);
            if ($flag) {
                $this->session->set_flashdata('toast_success', 'Channel Updated Successfully  !!!');
                redirect('channels');
            } else {
                $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
                redirect('channels/edit/' . $id);
            }
        }
    }

    public function destroy($id)
    {
        $this->channel->delete($id, 'channel');
        redirect('channels');
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

        $flag = $this->channel->update_one_item($id, 'id', 'channel', $data);

        if($flag)
        {
            $this->session->set_flashdata('toast_success', 'Updated Successfully  !!!');
            redirect('channels');
        }
        else{
            $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
            redirect('channels');
        }

    }
}
