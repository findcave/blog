<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function  __construct()
    {
        parent::__construct();
        $this->load->library('bcrypt');
    }


    public function index()
    {
        $data['channels'] = $this->post->get_all_item('channel');

        $data['page'] = 'register/index';
        $this->load->view('page', $data);
    }


    public function store()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[8]');


        if($this->form_validation->run() == FALSE){

            $data['page'] = 'register/index';
            $this->load->view('page', $data);

        }else{

            $datas = array(
                'name' =>$this->input->post('name'),
                'phone' =>$this->input->post('phone'),
                'email' =>$this->input->post('email'),
                'password' =>$this->bcrypt->hash_password($this->input->post('password')),
                'usertype' =>2
            );
            $flag = $this->registration->item_insert('users', $datas);

            $userid = $this->db->insert_id();
            if ($flag){

                $logindata = array(
                    'userid'  => $userid,
                    'username'  => $this->input->post('name'),
                    'email'     => $this->input->post('email'),
                    'usertype'     =>2,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($logindata);

                redirect('user/index');
            }else{
                $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
                redirect('register');
            }
        }
    }



}
