<?php
class Login_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_login($slug = FALSE)
    {
        $query = $this->db->get_where('user_section', array('email' => $slug['user'], 'user_pass' => $slug['pass']));

        if ($query->num_rows()== 1){return $query->row_array();}else return false;
    }
    public function signUp($value)
    {   $this->db->insert('user_section', $value);
        $query = $this->db->get_where('user_section', array('user_name' => $value['user_name'], 'user_pass' => $value['user_pass']));
        if ($query->num_rows()== 1){return $query->row_array();}else return false;
    }
}