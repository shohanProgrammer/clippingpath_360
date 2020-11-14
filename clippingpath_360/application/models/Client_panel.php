<?php
class Client_panel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_login($slug)
    {

        $query = $this->db->get_where('user_section', array('user_name' => $slug['user'], 'user_pass' => $slug['pass'], 'user_type' => 'client'));
        return $query->num_rows();
    }

    //Client section
    public function service_types()
    {
        $this->db->select('*');
        $this->db->from('service_types');
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function request_submitted($value)
    {   $this->db->trans_start();
        $data = array(
            'service_type' => $value['service'],
            'job_title' => $value['title'],
            'description' => $value['text'],
            'attachment' => $value['file'],
            'budget' => $value['budget'],
            'duration' => $value['duration'],
            'status' => $value['status'],
            'client_id' => $value['client_id'],
            'posted' => $value['posted'],


        );
        $this->db->insert('all_req', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    public function revision($value)
    {   $this->db->trans_start();
        $data = array(
            'message' => $value['text'],
            'attachment' => $value['file'],
            'status' => 'new',
            'job_id' => $value['job_id'],
            'client_id' => $value['client_id'],
            'posted' => $value['posted'],
            'revision_limit' => $value['revision_limit']
        );
        $this->db->insert('revision', $data);
        $this->db->set('status', 'onrevision');
        $this->db->set('extra_status', 'onrevision');
        $this->db->where('id', $value['job_id']);
        $this->db->update('all_req');
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    public function paid($job_id)
    {
        $this->db->trans_start();
        $this->db->set('status', 'ongoing');
        $this->db->set('extra_status', 'ongoing');
        $this->db->where('id', $job_id);
        $this->db->update('all_req');
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    public function revision_data($value) {
        $this->db->select_max('revision_limit');
        $this->db->from('revision');
        $this->db->where('job_id',$value['job_id']);
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $rst) {
            return $rst;
        }
    }
    public function pending_req($status,$client_id) {
        $data= array('status'=>$status,'client_id'=>$client_id);
        $this->db->select('*');
        $this->db->from('all_req');
        $this->db->where($data);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $result = $query->result();

    }

    public function pending_req_details($id)
    {
        $this->db->select('*');
        $this->db->from('all_req');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $rst) {
            return $rst;
        }
    }
    public function support_info($id)
    {
        $this->db->select('*');
        $this->db->from('user_section');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $rst) {
            return $rst;
        }
    }
    public function balance($id)
    {
        $this->db->select('*');
        $this->db->from('fund');
        $this->db->where('client_id', $id);
        $this->db->where('permission', 'yes');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function new_ticket($value)
    {   $this->db->trans_start();
        $data = array(
            'category' => $value['category'],
            'subject' => $value['subject'],
            'description' => $value['description'],
            'status' => $value['status'],
            'client_id' => $value['client_id'],
            'posted' => $value['posted']
        );
        $this->db->insert('ticket', $data);
        $this->db->trans_complete();
        return$this->db->trans_status();
    }
    public function fund_request($value)
    {   $this->db->trans_start();
        $this->db->insert('fund', $value);
        $this->db->trans_complete();
        return$this->db->trans_status();
    }
    public function feedback($value)
    {   $this->db->trans_start();
        $data = array(
            'star' => $value['star'],
            'comment' => $value['comment'],
            'job_id' => $value['job_id'],
            'client_id' => $value['client_id'],
        );
        $this->db->insert('feedback', $data);
        $c = array(
            'status'=>'completed',
            'extra_status'=>'completed'
        );
        $this->db->where('id', $value['job_id']);
        $this->db->update('all_req', $c);
        $this->db->trans_complete();
        return$this->db->trans_status();
    }
    public function from_feedback($value)
    {   $this->db->select('*');
        $this->db->from('feedback');
        $this->db->where('job_id',$value);
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $rst) {
            return $rst;
        }
    }

    public function revision_info($data,$id) {
        $this->db->select('all_req.job_title,all_req.extra_status,revision.message,revision.posted,all_req.id, MAX(revision.revision_limit)');
        $this->db->from('revision');
        $this->db->where('revision.status', $data);
        $this->db->where('revision.client_id', $id);
        $this->db->join('all_req','all_req.id=revision.job_id','LEFT');
        $this->db->group_by("job_id");
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function revision_details($id)
    {
        $this->db->select('id,message,attachment,status,job_id,client_id,posted,revision_limit');
        $this->db->from('revision');
        $this->db->where('job_id', $id);
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function revision_max($id)
    {
        $this->db->select('MAX(revision_limit)');
        $this->db->from('revision');
        $this->db->where('job_id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $rst) {
            return $rst;
        }
    }
    public function job_status($id)
    {
        $this->db->select('*');
        $this->db->from('job_status');
        $this->db->where('job_id', $id);
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function all_tickets($client_id)
    {
        $this->db->select('user_section.first_name,user_section.last_name,user_section.email,ticket.subject,ticket.posted,ticket.id');
        $this->db->from('ticket');
        $this->db->where('ticket.client_id', $client_id);
        $this->db->join('user_section', 'user_section.user_id=ticket.client_id', 'LEFT');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $result = $query->result();

    }
    public function ticket_details($id)
    {
        $this->db->select('user_section.first_name,user_section.last_name,user_section.email,ticket.subject,ticket.posted,ticket.id,ticket.description,ticket.client_id,ticket.status');
        $this->db->from('ticket');
        $this->db->where('ticket.id', $id);
        $this->db->join('user_section', 'user_section.user_id=ticket.client_id', 'LEFT');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $info) {
            return $info;
        }

    }
    public function funding_req_($id)
    {
        $this->db->select('*');
        $this->db->from('fund');
        $this->db->where('client_id',$id);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function funding_req_details($id)
    {
        $this->db->select('*');
        $this->db->from('fund');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $rst) {
            return $rst;
        }
    }
}