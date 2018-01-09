<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller
{

    public function  __construct()
    {
        parent::__construct();
        $this->load->model('employee');

    }

    public function index()
    {

        $data['employees'] = $this->employee->get_all_item('employee');

        $data['page'] = 'employees/index';
        $this->load->view('employees/page', $data);


    }

    public function create()
    {
        $data['departments'] = $this->employee->get_one_items('department','status',1);

        $data['page'] = 'employees/create';
        $this->load->view('employees/page', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|max_length[10]|min_length[10]|required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('department', 'Department', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['departments'] = $this->employee->get_one_items('department','status',1);
            $data['page'] = 'employees/create';
            $this->load->view('employees/page', $data);

        } else {
            $name = trim($this->security->xss_clean($this->input->post('name')));
            $phone = trim($this->security->xss_clean($this->input->post('phone')));
            $email = trim($this->security->xss_clean($this->input->post('email')));
            $department = trim($this->security->xss_clean($this->input->post('department')));
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
                'phone' => $phone,
                'email' => $email,
                'departmentid' => $department,
                'status' => $status,
            );
            $flag = $this->employee->item_insert('employee', $datas);
            if ($flag) {
                $this->session->set_flashdata('toast_success', 'Employee Added Successfully  !!!');
                redirect('employees');
            } else {
                $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
                redirect('employees/create');
            }
        }
    }

    public function edit($id)
    {
        $data['departments'] = $this->employee->get_one_items('department','status',1);

        $data['employee'] = $this->employee->get_one_item('employee', 'id', $id);
        $data['page'] = 'employees/edit';
        $this->load->view('employees/page', $data);
    }

    public function update()
    {
        $id =  trim($this->security->xss_clean($this->input->post('id')));

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|max_length[10]|min_length[10]|required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('department', 'Department', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['departments'] = $this->employee->get_one_items('department','status',1);

            $data['page'] = 'employees/edit';
            $data['employee'] = '';
            $this->load->view('employees/page', $data);

        } else {
            $name = trim($this->security->xss_clean($this->input->post('name')));
            $phone = trim($this->security->xss_clean($this->input->post('phone')));
            $email = trim($this->security->xss_clean($this->input->post('email')));
            $department = trim($this->security->xss_clean($this->input->post('department')));

            $datas = array(
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'departmentid' => $department,
                'status' => 1,
            );

            $flag = $this->employee->update_one_item($id, 'id', 'employee', $datas);
            if ($flag) {
                $this->session->set_flashdata('toast_success', 'Employee Updated Successfully  !!!');
                redirect('employees');
            } else {
                $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
                redirect('employees/edit/'. $id);
            }
        }
    }

    public function destroy($id)
    {
        $this->employee->delete($id, 'employee');
        redirect('employees');
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

        $flag = $this->employee->update_one_item($id, 'id', 'employee', $data);

        if($flag)
        {
            $this->session->set_flashdata('toast_success', 'Updated Successfully  !!!');
            redirect('employees');
        }
        else{
            $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
            redirect('employees');
        }

    }
}
