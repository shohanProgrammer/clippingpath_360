<?php
class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
public function dashboard()
    { if ($_SESSION['user_type'] == 'admin'){
            $page='content';
            $data['title'] = ucfirst($page); // Capitalize the first letter
            $this->load->view('templates/header');
            $this->load->view('templates/admin_sidebar');
            $this->load->view('admin/'.$page.'.php');
            $this->load->view('templates/footer');

    }else redirect('login',"refresh");
    }
    public function image_upload($image)
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types']  = 'gif|jpg|png';
        $config['file_name']='screenshot';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($image)) {
            $error = array('error' => $this->upload->display_errors());

            print_r($error);
        }
    }

    public function log_out()
    {
        session_destroy();
        redirect(base_url(),'refresh');
    }
    public function new_project()
    {if ($_SESSION['user_type'] == 'admin'){
        $status = 'pending';
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $data['portlate_title'] = "New Projects";
        $data['date_title'] = "Deadline";
        $this->load->model('admin_panel');
        $data['menu_item'] = $this->admin_panel->pending_req($status);
        $this->load->view('admin/pending_request',$data);
        $this->load->view('templates/footer');
    }else redirect('login',"refresh");
    }
    public function fund_request()
    {if ($_SESSION['user_type'] == 'admin'){
        $status = 'new';
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $data['portlate_title'] = "Fund Request";
        $data['date_title'] = "Date";
        $this->load->model('admin_panel');
        $data['menu_item'] = $this->admin_panel->funding_req($status);
        $this->load->view('admin/fund_request',$data);
        $this->load->view('templates/footer');
    }else redirect('login',"refresh");
    }
    public function payment_history()
    {if ($_SESSION['user_type'] == 'admin'){
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $data['portlate_title'] = "Payment History";
        $data['date_title'] = "Date";
        $this->load->model('admin_panel');
        $data['menu_item'] = $this->admin_panel->funding_req_();
        $this->load->view('admin/fund_history',$data);
        $this->load->view('templates/footer');
    }else redirect('login',"refresh");
    }
    public function fund_details()
    { if ($_SESSION['user_type'] == 'admin'){
        $id = $this->input->post('id');
        $this->load->model('admin_panel');
        $data['item'] = $this->admin_panel->funding_req_details($id);
        $client_id = $data['item']['client_id'];
        $data['info'] = $this->admin_panel->client_info($client_id);
        $this->load->view('admin/fund_view',$data);
    }else redirect('login',"refresh");
    }
    public function project_details()
    { if ($_SESSION['user_type'] == 'admin'){
        $id = $this->input->post('id');
        $this->load->model('admin_panel');
        $data['item'] = $this->admin_panel->pending_req_details($id);
        $data['rev'] = $this->admin_panel->revision_details($id);
        $data['status'] = $this->admin_panel->job_status($id);
        $data['feed'] = $this->admin_panel->from_feedback($id);
;        $this->load->view('admin/admin_view',$data);
    }else redirect('login',"refresh");
    }
    public function ongoing()
    {   if ($_SESSION['user_type'] == 'admin'){
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $data['portlate_title'] = "Ongoing Projects";
        $data['date_title'] = "Posted on";
        $status = 'ongoing';
        $this->load->model('admin_panel');
        $data['menu_item'] = $this->admin_panel->pending_req($status);
            $this->load->view('admin/pending_request',$data);
        $this->load->view('templates/footer');
    }else redirect('login',"refresh");
    }
    public function rejected()
    {   if ($_SESSION['user_type'] == 'admin'){
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $data['portlate_title'] = "Rejected Projects";
        $data['date_title'] = "Posted On";
        $status = 'rejected';
        $this->load->model('admin_panel');
        $data['menu_item'] = $this->admin_panel->pending_req($status);
            $this->load->view('admin/pending_request',$data);
        $this->load->view('templates/footer');
    }else redirect('login',"refresh");
    }
    public function completed()
    {   if ($_SESSION['user_type'] == 'admin'){
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $data['portlate_title'] = "Completed Projects";
        $data['date_title'] = "Posted On";
        $status = 'completed';
        $this->load->model('admin_panel');
        $data['menu_item'] = $this->admin_panel->pending_req($status);
            $this->load->view('admin/pending_request',$data);
        $this->load->view('templates/footer');
    }else redirect('login',"refresh");
    }
    public function client_info()
    { $client_id=$this->input->post('id');
        $this->load->model('admin_panel');
        $data['info'] = $this->admin_panel->client_info($client_id);
        $this->load->view('admin/client_info',$data);
    }
    public function adjustment()
    {   $data['id']=$this->input->post('job_id');
       $data['client_id']=$this->input->post('client_id');
        $this->load->view('admin/adjustment',$data);
    }
    public function new_tickets()
    {   if ($_SESSION['user_type'] == 'admin'){
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $data['portlate_title'] = "Support Tickets";
        $data['date_title'] = "Posted on";
        $status = 'new';
        $this->load->model('admin_panel');
        $data['menu_item'] = $this->admin_panel->new_ticket($status);
        $this->load->view('admin/ticket',$data);
        $this->load->view('templates/footer');
    }else redirect('login',"refresh");
    }
    public function all_tickets()
    {   if ($_SESSION['user_type'] == 'admin'){
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $data['portlate_title'] = "Support Tickets";
        $data['date_title'] = "Posted on";
        $status = 'all';
        $this->load->model('admin_panel');
        $data['menu_item'] = $this->admin_panel->new_ticket($status);
        $this->load->view('admin/ticket',$data);
        $this->load->view('templates/footer');
    }else redirect('login',"refresh");
    }
    public function service_type()
    { if ($_SESSION['user_type'] == 'admin'){
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->model('admin_panel');
        $data['menu_item'] = $this->admin_panel->service_types();
        $this->load->view('admin/service_type',$data);
        $this->load->view('templates/footer');
    }else redirect('login',"refresh");
    }
    public function delete_service()
    { if ($_SESSION['user_type'] == 'admin'){
        $delete_service=$this->input->post('service_id');
        $this->load->model('admin_panel');
        $data['delete']=$this->admin_panel->delete_service_type($delete_service);
        echo json_encode($data);
    }else redirect('login',"refresh");
    }
    public function upStatus()
    { if ($_SESSION['user_type'] == 'admin'){
        $client_id=$this->input->post('id');
    $state= 'pending';
    $job_id=$this->input->post('job_id');
        $this->load->model('admin_panel');
        $data['status']=$this->admin_panel->onApprove($client_id,$state,$job_id);
        echo json_encode($data);
    }else redirect('login',"refresh");
    }
    public function ticket_solved()
    { if ($_SESSION['user_type'] == 'admin'){
        $client_id=$this->input->post('client_id');
    $state= 'all';
    $id=$this->input->post('ticket_id');
        $this->load->model('admin_panel');
        $data['status']=$this->admin_panel->ticket_solved($client_id,$state,$id);
        echo json_encode($data);
    }else redirect('login',"refresh");
    }
    public function rejStatus()
    { if ($_SESSION['user_type'] == 'admin'){
        $client_id=$this->input->post('id');
    $state = 'rejected';
        $job_id=$this->input->post('job_id');
        $this->load->model('admin_panel');
        $data['status']=$this->admin_panel->upStatus($client_id,$state,$job_id);
        echo json_encode($data);
    }else redirect('login',"refresh");
    }
    public function adjustment_submit()
    { if ($_SESSION['user_type'] == 'admin'){
        $data['subject'] = $this->input->post('subject');
        $data['amount'] = $this->input->post('amount');
        $data['client_id'] = $this->input->post('client_id');
        $data['permission'] = 'yes';
        $data['status'] = 'adjustment';
        $data['project_id'] = $this->input->post('job_id');
        $this->load->model('admin_panel');
        $val['status']=$this->admin_panel->adjustment_submit($data);
        echo json_encode($val);
    }else redirect('login',"refresh");
    }
    public function accStatus()
    { if ($_SESSION['user_type'] == 'admin'){
        $app_amount=$this->input->post('amount');
    $state = 'completed';
    $per = 'yes';
        $job_id=$this->input->post('req_id');
        $this->load->model('admin_panel');
        $data['status']=$this->admin_panel->accStatus($app_amount,$state,$per,$job_id);
        echo json_encode($data);
    }else redirect('login',"refresh");
    }
    public function rej_fundStatus()
    { if ($_SESSION['user_type'] == 'admin'){
        $client_id=$this->input->post('id');
    $state = 'rejected';
    $per = 'No';
        $job_id=$this->input->post('req_id');
        $this->load->model('admin_panel');
        $data['status']=$this->admin_panel->accStatus($client_id,$state,$per,$job_id);
        echo json_encode($data);
    }else redirect('login',"refresh");
    }
    public function reqComplete()
    { if ($_SESSION['user_type'] == 'admin'){
        $client_id=$this->input->post('id');
    $state ='onapproval';
        $job_id=$this->input->post('job_id');
        $this->load->model('admin_panel');
        $data['status']=$this->admin_panel->onApprove($client_id,$state,$job_id);
        echo json_encode($data);
    }else redirect('login',"refresh");
    }
    public function submit_status()
    { if ($_SESSION['user_type'] == 'admin'){
        $this->image_upload('userfile');
        $value = array(
            'comment'=>$this->input->post('text'),
            'screenshot' => $this->upload->data('file_name'),
            'job_id'=>$this->input->post('job_id'),
            'revision_number'=>$this->input->post('rev_num')
        );
        $value2 = array(
            'comment'=>$this->input->post('text'),
            'screenshot' => $this->upload->data('file_name'),
            'job_id'=>$this->input->post('job_id')
        );
        if ($value['revision_number']==null){
            $this->load->model('admin_panel');
            $data['element'] = $this->admin_panel->jobStatus($value2);
        }else{
        $this->load->model('admin_panel');
        $data['element'] = $this->admin_panel->jobStatus($value);
        }
        echo json_encode($data);
    }else redirect('login',"refresh");
    }
    public function revision_list()
    {   if ($_SESSION['user_type'] == 'admin'){
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $data['portlate_title'] = "New Revision";
        $data['date_title'] = "Posted On";
        $status = 'new';
        $this->load->model('admin_panel');
        $data['menu_item'] = $this->admin_panel->revision_info($status);
        $this->load->view('admin/revision',$data);
        $this->load->view('templates/footer');
    }else redirect('login',"refresh");
    }
    public function ticket_details()
    { if ($_SESSION['user_type'] == 'admin'){
        $id = $this->input->post('id');
        $this->load->model('admin_panel');
        $data['item'] = $this->admin_panel->ticket_details($id);
        $this->load->view('admin/ticket_details',$data);
    }else redirect('login',"refresh");
    }
    public function service_type_input()
    { if ($_SESSION['user_type'] == 'admin'){
        $service = $this->input->post('service');
        //var_dump($service);exit();
        $this->load->model('admin_panel');
        $data['serv'] = $this->admin_panel->service_type_input($service);
        echo json_encode($data);
    }else redirect('login',"refresh");
    }


}