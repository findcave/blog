<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller
{

    public function  __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['tags'] = $this->channel->get_all_item('tags');

        $data['page'] = 'tags/index';
        $this->load->view('tags/page', $data);

    }

    public function create()
    {
        $data['page'] = 'tags/create';
        $this->load->view('tags/page', $data);

    }

    public function store()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $data['page'] = 'tags/create';
            $this->load->view('tags/page', $data);

        }else {

            $datas = array(
                'name' => $this->input->post('name'),
            );
            $flag = $this->channel->item_insert('tags', $datas);


            if ($flag) {
                $this->session->set_flashdata('toast_success', 'Tag Added Successfully  !!!');
                redirect('tags');
            } else {
                $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
                redirect('tags/create');
            }
        }
    }

    public function edit($id)
    {
        $data['tag'] = $this->channel->get_one_item('tags', 'id', $id);
        $data['page'] = 'tags/edit';
        $this->load->view('tags/page', $data);
    }

    public function update()
    {
        $id =  trim($this->security->xss_clean($this->input->post('id')));

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('id', 'ID', 'trim|required');

        if($this->form_validation->run() == FALSE) {

            $data['page'] = 'tags/edit';
            $data['tag'] = '';
            $this->load->view('tags/page', $data);

        }
        else {
            $data = array(
                'name' => $this->input->post('name'),
            );
            $flag = $this->channel->update_one_item($id, 'id', 'tags', $data);
            if ($flag) {
                $this->session->set_flashdata('toast_success', 'Tag Updated Successfully  !!!');
                redirect('tags');
            } else {
                $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
                redirect('tags/edit/' . $id);
            }
        }
    }

    public function destroy($id)
    {
        $this->channel->delete($id,'id','tags');
        redirect('tags');
    }


}
