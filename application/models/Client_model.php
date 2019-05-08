<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Models for Client MVC
 * 
 * This is the Model for Clients Controller where
 * it inserts, update, and retrieve date from database
 * 
 * @package aimex-v2\application\models
 * @author Renzo Beltran <renzobeltran@outlook.com>
 */
class Client_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database('aimex');
    }

    function get_client($firstname, $lastname) {
        $this->db->where('clientFirstName', $lastname);
        $this->db->where('clientLastName', $firstname);
        $query = $this->db->get('tbl_client');
        $client = $query->result();
        return $client;
    }

    function enroll_client($data=null) {
        if(!empty($data)) {
            $this->db->insert('tbl_client', $data);
            $ins_id = $this->db->insert_id();
            return $ins_id;
        } else {
            return false;
        }
    }

    function enroll_comaker($data=null) {
        if(!empty($data)) {
            $this->db->insert('tbl_comaker', $data);
            $ins_id = $this->db->insert_id();
            return $ins_id;
        } else {
            return false;
        }
    }

    function enroll_personalreference($data=null) {
        if(!empty($data)) {
            $this->db->insert('tbl_personalreference', $data);
            $ins_id = $this->db->insert_id();
            return $ins_id;
        } else {
            return false;
        }
    }

    function enroll_employmentdetails($data=null) {
        if(!empty($data)) {
            $this->db->insert('tbl_employmentdetails', $data);
            $ins_id = $this->db->insert_id();
            return $ins_id;
        } else {
            return false;
        }
    }

    public function fetch_client() {
        $query = $this->db->get('tbl_client');
        return $query;
    }

    public function fetch_search($filtered, $search) {
        $query = $this->db->get_where('tbl_client', array($filtered => $search));
        return $query;
    }
}