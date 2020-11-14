<?php
class Frontend extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('url_helper');
    }
    public function view()
    {
        $this->load->helper('url');
        $this->load->view('frontend/includes/top');
        $this->load->view('frontend/includes/header');
        $this->load->view('frontend/slider');
        $this->load->view('frontend/feature');
        $this->load->view('frontend/about');
        $this->load->view('frontend/offer');
        $this->load->view('frontend/project');
        //$this->load->view('frontend/counter');
        $this->load->view('frontend/testimonial');
        $this->load->view('frontend/pricing');
        $this->load->view('frontend/blog');
        $this->load->view('frontend/includes/footer');
        $this->load->view('frontend/includes/bottom');
    }
    public function single_portfolio()
    {
        $this->load->helper('url');
        $this->load->view('frontend/includes/top');
        $this->load->view('frontend/single_project');
        $this->load->view('frontend/includes/footer');
        $this->load->view('frontend/includes/bottom');
    }

}