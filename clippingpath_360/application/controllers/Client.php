<?php
class Client extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url','date'));
        $this->load->model('client_panel');
        $this->load->library('session');
    }

    public function view($page = 'home')
    {
        if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->helper('url');

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->view($page);
    }
    public function dashboard()
    {
        if (isset($_SESSION['user_type'])){
        $page='content';
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $id= $_SESSION['user_id'];
        $b['balance'] = $this->client_panel->balance($id);
        $b['client'] = $this->client_panel->support_info($id);
        $this->load->view('header',$b);
        $this->load->view('client_sidebar');
        $this->load->view('admin/'.$page.'.php');
        $this->load->view('footer');


    }else redirect('login',"refresh");


    }
    public function log_out()
    {
        session_destroy();
        redirect(base_url(),'refresh');
    }
    public function image_upload($image)
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types']  = '*';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($image)) {
            $error = array('error' => $this->upload->display_errors());

            print_r($error);
        }
    }
    public function new_request()
    {if (isset($_SESSION['user_type'])){
        $data['services']=$this->client_panel->service_types();
        $id= $_SESSION['user_id'];
        $b['balance'] = $this->client_panel->balance($id);
        $b['client'] = $this->client_panel->support_info($id);
        $this->load->view('header',$b);
        $this->load->view('client_sidebar');
        $this->load->view('client/new_request',$data);
        $this->load->view('footer');
    }else redirect('login',"refresh");
    }
    public function request_submitted(){
        $this->image_upload('userfile');
        $value = array('title'=>$this->input->post('name'),
            'service'=>$this->input->post('service_types'),
            'text'=>$this->input->post('text'),
            'file' => $this->upload->data('file_name'),
            'budget'=>$this->input->post('budget'),
            'posted'=>date('d-m-Y'),
            'duration'=>$this->input->post('duration'),
            'status'=>$this->input->post('status'),
            'client_id'=>$_SESSION['user_id']
            );
        $data['jobs']=$this->client_panel->request_submitted($value);
        echo json_encode($data);
    }

    public function faq()
    {
        $id= $_SESSION['user_id'];
        $b['balance'] = $this->client_panel->balance($id);
        $b['client'] = $this->client_panel->support_info($id);
        $this->load->view('header',$b);
        $this->load->view('client_sidebar');
        $this->load->view('client/faq');
        $this->load->view('footer');
    }
    public function pending_request()
    {if (isset($_SESSION['user_type'])){
        $client_id= $_SESSION['user_id'];
        $status = 'pending';
        $id= $_SESSION['user_id'];
        $b['balance'] = $this->client_panel->balance($id);
        $b['client'] = $this->client_panel->support_info($id);
        $this->load->view('header',$b);
        $this->load->view('client_sidebar');
        $data['portlate_title'] = "Pending Projects";
        $data['date_title'] = "Posted On";
        $data['menu_item'] = $this->client_panel->pending_req($status,$client_id);
        $this->load->view('client/pending_request',$data);
        $this->load->view('footer');
    }else redirect('login',"refresh");
    }
    public function project_details()
    { if (isset($_SESSION['user_type'])){
        $job_id = $this->input->post('id');
        $data['item'] = $this->client_panel->pending_req_details($job_id);
        $data['rev'] = $this->client_panel->revision_details($job_id);
        $data['status'] = $this->client_panel->job_status($job_id);
        $data['feed'] = $this->client_panel->from_feedback($job_id);
        $data['revmax'] = $this->client_panel->revision_max($job_id);
        $this->load->view('client/admin_view',$data);
    }else redirect('login',"refresh");
    }
    public function ongoing()
    {   if (isset($_SESSION['user_type'])){
        $client_id= $_SESSION['user_id'];
        $id= $_SESSION['user_id'];
        $b['balance'] = $this->client_panel->balance($id);
        $b['client'] = $this->client_panel->support_info($id);
        $this->load->view('header',$b);
        $this->load->view('client_sidebar');
        $data['portlate_title'] = "Ongoing Projects";
        $data['date_title'] = "Posted On";
        $status = 'ongoing';
        $data['menu_item'] = $this->client_panel->pending_req($status,$client_id);
        $this->load->view('client/pending_request',$data);
        $this->load->view('footer');
    }else redirect('login',"refresh");
    }
    public function completed()
    {   if (isset($_SESSION['user_type'])){
        $client_id= $_SESSION['user_id'];
        $id= $_SESSION['user_id'];
        $b['balance'] = $this->client_panel->balance($id);
        $b['client'] = $this->client_panel->support_info($id);
        $this->load->view('header',$b);
        $this->load->view('client_sidebar');
        $data['portlate_title'] = "Completed Projects";
        $data['date_title'] = "Posted On";
        $status = 'completed';
        $data['menu_item'] = $this->client_panel->pending_req($status,$client_id);
        $this->load->view('client/pending_request',$data);
        $this->load->view('footer');
    }else redirect('login',"refresh");
    }
    public function contact_support() {
        if (isset($_SESSION['user_type'])){
            $id= $_SESSION['user_id'];
            $data['client_info'] = $this->client_panel->support_info($id);
            $id= $_SESSION['user_id'];
            $b['balance'] = $this->client_panel->balance($id);
            $b['client'] = $this->client_panel->support_info($id);
            $this->load->view('header',$b);
            $this->load->view('client_sidebar');
        $this->load->view('client/contact_support',$data);
        $this->load->view('footer');
        }else redirect('login',"refresh");
    }
    public function fund() {
        if (isset($_SESSION['user_type'])){
            $id= $_SESSION['user_id'];
            $data['client_info'] = $this->client_panel->support_info($id);
            $id= $_SESSION['user_id'];
            $b['balance'] = $this->client_panel->balance($id);
            $b['client'] = $this->client_panel->support_info($id);
            $this->load->view('header',$b);
            $this->load->view('client_sidebar');
        $this->load->view('client/fund',$data);
        $this->load->view('footer');
        }else redirect('login',"refresh");
    }
    public function submitted_ticket() {
        if (isset($_SESSION['user_type'])){
            $client_id= $_SESSION['user_id'];
            $id= $_SESSION['user_id'];
        $b['balance'] = $this->client_panel->balance($id);
            $b['client'] = $this->client_panel->support_info($id);
        $this->load->view('header',$b);
            $this->load->view('client_sidebar');
            $data['portlate_title'] = "support ticket";
            $data['date_title'] = "Posted On";
            $data['menu_item'] = $this->client_panel->all_tickets($client_id);
            $this->load->view('client/ticket',$data);
            $this->load->view('footer');
        }else redirect('login',"refresh");
    }
    public function payment_history() {
        $id= $_SESSION['user_id'];
        $b['balance'] = $this->client_panel->balance($id);
        $b['client'] = $this->client_panel->support_info($id);
        $this->load->view('header',$b);
        $this->load->view('client_sidebar');
        $data['portlate_title'] = "Payment History";
        $data['date_title'] = "Date";
        $id= $_SESSION['user_id'];
        $data['history'] = $this->client_panel->funding_req_($id);
        $this->load->view('client/payment',$data);
        $this->load->view('footer');
    }

    public function fund_details()
    { if ($_SESSION['user_type'] == 'client'){
        $id = $this->input->post('id');
        $data['item'] = $this->client_panel->funding_req_details($id);
        $this->load->view('client/payment_view',$data);
    }else redirect('login',"refresh");
    }
    public function pay_now() {
        $val['client_balance'] = $this->input->post('amount');
        $val['project_amount'] = $this->input->post('job_budget');
        $job_id = $this->input->post('job_id');
        if ($val['client_balance'] >= $val['project_amount']){
            $data['subject'] = 'paid';
            $data['amount'] = $val['project_amount'];
            $data['client_id']= $_SESSION['user_id'];
            $data['permission']= 'yes';
            $content['item'] = $this->client_panel->fund_request($data);
            $this->client_panel->paid($job_id);
            echo json_encode($content);
        }else{
            echo json_encode('You do not have enough fund! ');
        }


    }
    public function ticket_details()
    { if (isset($_SESSION['user_type'])){
        $id = $this->input->post('id');
        $this->load->model('client_panel');
        $data['item'] = $this->client_panel->ticket_details($id);
        $this->load->view('client/ticket_details',$data);
    }else redirect('login',"refresh");
    }
    public function new_ticket(){
        $value = array(
            'category'=>$this->input->post('category'),
            'subject'=>$this->input->post('subject'),
            'description'=>$this->input->post('description'),
            'status'=>'new',
            'client_id'=>$_SESSION['user_id'],
            'posted'=>date('d-m-Y')
        );
        $data['ticket']=$this->client_panel->new_ticket($value);
        echo json_encode($data);
    }
    public function fund_request(){
        $value = array(
            'subject'=>$this->input->post('subject'),
            'amount'=>$this->input->post('amount'),
            'client_id'=>$_SESSION['user_id'],
            'message'=>$this->input->post('description'),
            'payment_method'=>$this->input->post('p_method'),
            'status'=>'new',

        );
        if (!empty($_FILES['files']['name'])) {
            $value['attachment']= $this->file_upload();
        }
        $data['fund_data']=$this->client_panel->fund_request($value);
        echo json_encode($data);
    }
    public function feedback(){
        $value = array(
            'star'=>$this->input->post('star'),
            'comment'=>$this->input->post('comment'),
            'job_id'=>$this->input->post('job_id'),
            'client_id'=>$_SESSION['user_id']
        );
        $data['fed']=$this->client_panel->feedback($value);
        echo json_encode($data);
        redirect('client/dashboard');
    }
    public function revision(){
        $this->image_upload('userfile');
        $value = array(
            'job_id'=>$this->input->post('job_id'),
            'text'=>$this->input->post('text'),
            'file' => $this->upload->data('file_name'),
            'client_id'=>$_SESSION['user_id'],
            'posted'=>date('d-m-Y'),

        );

        $rev=$this->client_panel->revision_data($value);
       if ($rev == null){
           $value['revision_limit'] = 1;
       }
        if ($rev['revision_limit'] < 3){
            $value['revision_limit'] = $rev['revision_limit'] +1;
        }
        $data['rev'] =$this->client_panel->revision($value);
        echo json_encode($data);
    }
    public function revision_list()
    {   if (isset($_SESSION['user_type'])){
        $id= $_SESSION['user_id'];
        $b['balance'] = $this->client_panel->balance($id);
        $b['client'] = $this->client_panel->support_info($id);
        $this->load->view('header',$b);
        $this->load->view('client_sidebar');
        $data['portlate_title'] = "Ongoing Revision";
        $data['date_title'] = "Posted On";
        $status = 'new';
        $client_id = $_SESSION['user_id'];
        $data['menu_item'] = $this->client_panel->revision_info($status,$client_id);
        $this->load->view('client/revision',$data);
        $this->load->view('footer');
    }else redirect('login',"refresh");
    }
    public function file_upload()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf|ppt|pptx|doc|docx';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('files'))
        {
            $error = array('error' => $this->upload->display_errors());

            print_r($error);
        } else {
            return $this->upload->data('file_name');
        }
    }


}