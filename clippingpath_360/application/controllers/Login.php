<?php
class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('url_helper');
    }
    public function view($page = 'home')
    {
        if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->helper('url');
        $data['user_type']= 'admin';

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->view($page,$data);
    }

    public function index()
    {

        $data['user'] = $this->input->post('email');
        $data['pass'] = $this->input->post('password');
        $returnData=$this->login_model->get_login($data);
        if ($returnData ['user_type']=='admin'){
            $this->session->set_userdata($returnData);
            redirect('admin/dashboard');
        }elseif ($returnData ['user_type']=='client'){
            $this->session->set_userdata($returnData);
            redirect('client/dashboard');
        }
        else{
            redirect('login');
        }
    }
    public function signUp()
    {
        $data['user_name'] = $this->input->post('username');
        $data['user_pass'] = $this->input->post('password');
        $data['user_type'] = 'client';
        $data['first_name'] = $this->input->post('fName');
        $data['last_name'] = $this->input->post('lName');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        $data['country'] = $this->input->post('country');
        $returnData=$this->login_model->signUp($data);
        if ($returnData ['user_type']=='client'){
            $this->session->set_userdata($returnData);
            redirect('client/dashboard');
        }
        else{
            redirect('login');
        }
    }

}