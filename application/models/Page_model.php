<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database('aimexlocal');
    }
    function can_login($username, $password) {
        $this->db->where('employee_username', $username);
        $this->db->where('flag_deleted', 'f');
        $query = $this->db->get('uat.tbl_employee');
        $user = $query->result();

        if(password_verify($password, $user[0]->password)) {
            if($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }     
    }

    function register_employee($data=null) {
        if(!empty($data)) {
            $this->db->insert('uat.tbl_employee', $data);
            $ins_id = $this->db->insert_id();
            return $ins_id;
        } else {
            return false;
        }
    }
}