<?php

class Admin_panel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function pending_req($data)
    {
        $this->db->select('*');
        $this->db->from('all_req');
        $this->db->where('status', $data);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function funding_req($data)
    {
        $this->db->select('*');
        $this->db->from('fund');
        $this->db->where('status', $data);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function funding_req_()
    {
        $this->db->select('*');
        $this->db->from('fund');
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

    public function revision_details($id)
    {
        $this->db->select('*');
        $this->db->from('revision');
        $this->db->where('job_id', $id);
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function client_info($client_id)
    {
        $this->db->select('first_name,last_name,email,phone');
        $this->db->from('user_section');
        $this->db->where('user_id', $client_id);
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $info) {
            return $info;
        }
    }
    public function delete_service_type($service_id)
    {   $this->db->trans_start();
        $this->db->where('id', $service_id);
        $this->db->delete('service_types');
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    public function service_types()
    {
        $this->db->select('*');
        $this->db->from('service_types');
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function upStatus($client_id, $state, $job_id)
    {
        $this->db->trans_start();
        $this->db->set('status', $state);
        $this->db->where('client_id', $client_id);
        $this->db->where('id', $job_id);
        $this->db->update('all_req');
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function accStatus($app_amount, $state,$per, $id)
    {
        $this->db->trans_start();
        $this->db->set('status', $state);
        $this->db->set('permission', $per);
        $this->db->set('approved_amount', $app_amount);
        $this->db->where('id', $id);
        $this->db->update('fund');
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function adjustment_submit($data)
    {
        $this->db->trans_start();
        $this->db->insert('fund', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function onApprove($client_id, $state, $job_id)
    {
        $this->db->trans_start();
        $this->db->set('extra_status', $state);
        $this->db->where('client_id', $client_id);
        $this->db->where('id', $job_id);
        $this->db->update('all_req');
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    public function ticket_solved($client_id, $state, $id)
    {
        $this->db->trans_start();
        $this->db->set('status', $state);
        $this->db->where('client_id', $client_id);
        $this->db->where('id', $id);
        $this->db->update('ticket');
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function jobStatus($value)
    {
        $this->db->trans_start();
        $this->db->insert('job_status', $value);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    public function job_status($id)
    {
        $this->db->select('*');
        $this->db->from('job_status');
        $this->db->where('job_id', $id);
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function revision_info($data)
    {
        $this->db->select('all_req.job_title,revision.message,revision.posted,all_req.id, MAX(revision.revision_limit)');
        $this->db->from('revision');
        $this->db->where('revision.status', $data);
        $this->db->join('all_req', 'all_req.id=revision.job_id', 'LEFT');
        $this->db->group_by("job_id");
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function new_ticket($status)
    {
        $this->db->select('user_section.first_name,user_section.last_name,user_section.email,ticket.subject,ticket.posted,ticket.id');
        $this->db->from('ticket');
        $this->db->where('ticket.status', $status);
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
    public function service_type_input($service)
    {
        $this->db->trans_start();
        $data = array(
            'service_name' => $service,
        );
        $this->db->insert('service_types', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();

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


}