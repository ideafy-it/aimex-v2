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
}