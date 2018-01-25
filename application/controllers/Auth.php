<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function  __construct()
    {
        parent::__construct();
    }

    public function index(){

        $data['channels'] = $this->auth_model->get_all_item('channel');

        $data['page'] = 'login/index';
        $this->load->view('page', $data);

    }

    public function signin(){

        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $data['page'] = 'login/index';
            $this->load->view('page', $data);

        }else {

                $email = $this->input->post('email');
                $password = md5($this->input->post('password'));
                $signindata = $this->auth_model->get_two_item('users','email',$email,'password',$password);

                if($signindata) {

                    $logindata = array(
                        'userid'  => $signindata->id,
                        'username'  => $signindata->name,
                        'email'     => $signindata->email,
                        'usertype'     => $signindata->usertype,
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($logindata);

                    if($this->session->userdata('userid') == 1){
                        redirect('admin');
                    }else{
                        redirect('user');
                    }


                } else {
                    $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
                    redirect('auth');
                }
        }
    }

    public function signout()
    {
        unset(
        $_SESSION['userid'],
        $_SESSION['username'],
        $_SESSION['email'],
        $_SESSION['logged_in']
        );
        session_destroy();
        redirect('auth/');

    }

    public function edit(){

        $data['channels'] = $this->auth_model->get_one_items('channel','status',1);

        $data['page'] = 'login/edit';
        $this->load->view('user/page', $data);
    }

    public function update(){

        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $data['page'] = 'login/edit';
            $this->load->view('user/page', $data);

        }else {

            $data = array('password'=>md5($this->input->post('password'))) ;

            $flag = $this->post->update_one_item($this->session->userdata('userid'), 'id', 'users', $data);
            if($flag) {
                $this->session->set_flashdata('toast_success', 'Changed Successfully !!!');

                redirect('user');

            } else {
                $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
                redirect('auth/edit');
            }
        }
    }

    public function forgetpassword()
    {
        $email = $this->input->post('email');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if($this->form_validation->run() == FALSE){

            $data['page'] = 'login/index';
            $this->load->view('page', $data);

        }else{

            $userid = $this->auth_model->get_one_item('users','email',$email);

            $to_mail = $email;
            $from = "info@ynotinfo.info";

            $subject ="Reset Password";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From:'.$from. "\r\n" .
                       'Reply-To:'. $from. "\r\n".
                       'X-Mailer: PHP/' . phpversion();



            $messa  = " Hi,To reset your password, visit the following address: www.findcave.in/fashion/auth/changepassword/$userid->id  ";

            $messa .= 'Thank You';


            $config['protocol']='mail';
            $this->email->initialize($config);


            $this->email->from($from,'Blog');
            $this->email->to($to_mail);
            $this->email->subject($subject);
            $this->email->message($messa);
            $chk = $this->email->send();

            $data['page'] = 'login/index';
            $this->load->view('page', $data);
        }
    }


    public function changepassword($id){
        $data['userid']= $id ;
        $data['page'] = 'login/changepassword';
        $this->load->view('page', $data);

    }

    public function updatepassword()
    {
        $userid = $this->input->post('userid');
        $data = array('password'=>md5($this->input->post('password'))) ;

        $flag = $this->post->update_one_item($userid, 'id', 'users', $data);
        if($flag) {
            $this->session->set_flashdata('toast_success', 'Changed Successfully !!!');

            redirect('auth');

        } else {
            $this->session->set_flashdata('toast_error', 'Failed. Try Again !!!');
            redirect('auth');
        }
    }

}
