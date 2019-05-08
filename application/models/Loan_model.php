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
class Loan_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database('aimex');
    }

    function getClientById($id) {
        $query = $this->db->get_where('tbl_client', array('id' => $id));
        return $query;
        // SELECT * FROM tbl_client where id = '$id'
    }

    function enrollLoan($data=null) {
        if(!empty($data)) {
            $this->db->insert('tbl_loans', $data);
            $ins_id = $this->db->insert_id();
            return $ins_id;
        } else {
            return false;
        }
    }

    function getLoansByClientId($id) {
        $query = $this->db->get_where('tbl_loans', array('client' => $id));
        return $query;
    }

    function getLoanById($id) {
        $query = $this->db->get_where('tbl_loans', array('id' => $id));
        return $query;
    }
}