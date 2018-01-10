<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Models for Pages MVC
 * 
 * This is the Model for Pages Controller where 
 * it inserts and checks data from database.
 * 
 * @package aimex-v2\application\models
 * @author  Renzo Beltran <renzobeltran@outlook.com>
 */
 class Page_model extends CI_Model {

    /**
     * A function where loads the libraries for the whole class 
     * 
     * This constructor loads the database in database configuration file.
     */
    public function __construct() {
        parent::__construct();
        $this->load->database('aimexlocal');
    }
    /**
     * A function that checks users 
     * 
     * This function attempts to check if username exist and verifies
     * if hashed password is same as input password from login page.
     * It passes the result of user if user exist.
     * 
     * @param string $username
     * @param string $password Do not hash
     * 
     * @return array $user returns the result of $user and true else it returns false
     */
    function can_login($username, $password) {
        $this->db->where('employee_username', $username);
        $query = $this->db->get('uat.tbl_employee');
        $user = $query->result();

        if (isset($user[0]->password)){
            if(password_verify($password, $user[0]->password)) {
                if($query->num_rows() > 0) {
                    return $user;
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }    
        } else {
            return false;
        }
         
    }

    /**
     * A function that registers an employee
     * 
     * This function accepts and array which is defaulted to null to
     * check if the user has inputed data with out any validation error.
     * 
     * @param array $data default to null
     * @return array $ins_id inserts the data to database else it returns false
     */
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