<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller
{

    public function  __construct()
    {
        parent::__construct();
        $this->load->model('departments');

    }

    public function index()
    {
        $data['departments'] = $this->departments->get_all_item('department');

        $data['page'] = 'department/index';
        $this->load->view('department/page', $data);


    }

    public function create()
    {
        $data['page'] = 'department/create';
        $this->load->view('department/page', $data);

    }

    public function store()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('location', 'Location', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $data['page'] = 'department/create';
            $this->load->view('department/page', $data);

        } else {
            $name = trim($this->security->xss_clean($this->input->post('name')));
            $description = trim($this->security->xss_clean($this->input->post('description')));
            $location = trim($this->security->xss_clean($this->input->post('location')));
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
                'location' => $location,
                'status' => $status,
            );
            $flag = $this->departments->item_insert('department', $datas);
            if ($flag) {
                $this->session->set_flashdata('toast_success', 'Department Added Successfully  !!!');
                redirect('department');
            } else {
                $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
                redirect('department/create');
            }
        }
    }

    public function edit($id)
    {
        $data['department'] = $this->departments->get_one_item('department', 'id', $id);
        $data['page'] = 'department/edit';
        $this->load->view('department/page', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $location = trim($this->security->xss_clean($this->input->post('location')));

        if ($this->form_validation->run() == FALSE) {


            $data['department'] = $this->departments->get_one_item('department', 'id', $id);

            $data['page'] = 'department/edit';
            $this->load->view('department/page', $data);

        } else {
            $name = trim($this->security->xss_clean($this->input->post('name')));
            $description = trim($this->security->xss_clean($this->input->post('description')));
            $location = trim($this->security->xss_clean($this->input->post('location')));

            $data = array(
                'name' => $name,
                'description' => $description,
                'location' => $location,
            );
            $flag = $this->departments->update_one_item($id, 'id', 'department', $data);
            if ($flag) {
                $this->session->set_flashdata('toast_success', 'Department Updated Successfully  !!!');
                redirect('department');
            } else {
                $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
                redirect('department/edit/' . $id);
            }
        }
    }

    public function destroy($id)
    {
        $this->departments->delete($id, 'department');
        redirect('department');
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

        $flag = $this->departments->update_one_item($id, 'id', 'department', $data);

        if($flag)
        {
            $this->session->set_flashdata('toast_success', 'Updated Successfully  !!!');
            redirect('department');
        }
        else{ $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!'); redirect('department'); }

    }



}
