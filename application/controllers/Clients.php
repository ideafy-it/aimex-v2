<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {
    
    public function view($page = 'home') {
        if($this->session->userdata('username') != '') {
            if($this->session->userdata('role') != 'Manager' || $this->session->userdata('role') != 'Loans Processor') {
                if(!file_exists(APPPATH.'views/clients/'.$page.'.php')) {
                    show_404();
                }
                
                $filtered = $this->input->post('filter');
                $searched = $this->input->post('search');
                
                $data['title'] = ucfirst($page);
                $data['username'] = $this->session->userdata('username');
                $data['role'] = $this->session->userdata('role');
                $data['name'] = $this->session->userdata('name');
                $this->load->model('client_model');
                if($filtered != null && $searched != null){
                    $data['searched'] = $this->client_model->fetch_search($filtered, $searched);
                } else {
                    $data['view_clients'] = $this->client_model->fetch_client();
                }


                $this->load->view('_partials/_header', $data);
                $this->load->view('_partials/_navbars/_clientsnavbar', $data);
                $this->load->view('clients/'.$page, $data);
                $this->load->view('_partials/_footer');
            } else {
                redirect(base_url().'collections/home');
            }
        } else {
            redirect(base_url());
        }
    }

    public function client_validation() {   
        $this->load->library('form_validation');
        // Client Basic Information Validations
        $this->form_validation->set_rules('clientFirstName', 'Client First Name', 'trim|max_length[50]|required');
        $this->form_validation->set_rules('clientLastName', 'Client Last Name', 'trim|max_length[50]|required');
        // $this->form_validation->set_rules('clientPhoto', 'Image', 'required');
        if($this->input->post('bank') == 'Others') {
            $this->form_validation->set_rules('others', 'Others', 'trim|max_length[50]|required');
        }
        $this->form_validation->set_rules('branch', 'Branch', 'trim|max_length[50]|required');
        $this->form_validation->set_rules('pensionNumber','Pension Number','trim|numeric|max_length[50]|required');
        $this->form_validation->set_rules('asOf', 'As Of', 'required');
        $this->form_validation->set_rules('withdrawalDate','WithdrawalDate','required');
        $this->form_validation->set_rules('birthDate','Birth Date','required');
        $this->form_validation->set_rules('clientAddress','Client Address','trim|max_length[100]|required');
        $this->form_validation->set_rules('contactNumber','Contact Number','trim|max_length[15]|numeric|required');
        if($this->input->post('hasSpouse') == 'y'){
            $this->form_validation->set_rules('spouseName', 'Spouse Name', 'trim|max_length[50]|required');
            $this->form_validation->set_rules('spouseBirthDate', 'Spouse Birthdate', 'required');
        }
        
        // CoMaker Information Validation
        $this->form_validation->set_rules('coMakerName','CoMaker Name','trim|max_length[50]|required');
        $this->form_validation->set_rules('coMakerAddress','CoMaker Address','trim|max_length[100]|required');
        $this->form_validation->set_rules('coMakerContact','CoMaker Contact','trim|max_length[50]|numeric|required');
        $this->form_validation->set_rules('coMakerRelation','CoMaker Relation','trim|max_length[50]|required');
        // Personal Reference Validation
        $this->form_validation->set_rules('referenceName','Reference Name','trim|max_length[50]|required');
        $this->form_validation->set_rules('referenceAddress','Reference Address','trim|max_length[100]|required');
        $this->form_validation->set_rules('referenceContact','Reference Contact','trim|max_length[50]|numeric|required');
        $this->form_validation->set_rules('referenceRelation','Reference Relation','trim|max_length[50]|required');
        // employment Details
        if($this->input->post('employmentType') == 'Employed') {
            $this->form_validation->set_rules('employerName','Employer Name','trim|max_length[50]|required');
            $this->form_validation->set_rules('employmentAddress','Employment Address','trim|max_length[100]|required');
        }
        $this->form_validation->set_rules('occupation','Occupation','trim|max_length[50]|required');
        $this->form_validation->set_rules('homeType','Home Type','trim|max_length[50]|required');
        $this->form_validation->set_rules('monthlyBill','Monthly Bill','trim|max_length[50]|required');

        if($this->form_validation->run()) {
            $this->load->model('client_model');
            $data = array(
                'clientFirstName'=>$this->input->post('clientFirstName'),
                'clientLastName'=>$this->input->post('clientLastName'),
                'clientPhoto'=>$this->input->post('image'),
                'pensionType'=>$this->input->post('pensionType'),
                'asOf'=>$this->input->post('asOf'),
                'withdrawalDate'=>$this->input->post('withdrawalDate'),
                'birthDate'=>$this->input->post('birthDate'),
                'clientAddress'=>$this->input->post('clientAddress'),
                'contactNumber'=>$this->input->post('contactNumber'),
                'pensionNumber'=>$this->input->post('pensionNumber'),
                'spouseName'=>$this->input->post('spouseName'),
                'spouseBirthDate'=>$this->input->post('spouseBirthDate'),
                'bank'=>($this->input->post('bank') != 'Others') ? $this->input->post('bank') : $this->input->post('bank').' - '.$this->input->post('others'),
                'branch'=>$this->input->post('branch'),
                'fkEmployeeId'=>$this->session->userdata('employeeId')
            );
            $resultClient = $this->client_model->enroll_client($data);
            $dataCoMaker = array(
                'coMakerName'=>$this->input->post('coMakerName'),
                'coMakerAddress'=>$this->input->post('coMakerAddress'),
                'coMakerContact'=>$this->input->post('coMakerContact'),
                'coMakerRelation'=>$this->input->post('coMakerRelation'),
                'fkClientId'=>$resultClient
            );
            $dataPersonalReference = array(
                'referenceName'=>$this->input->post('referenceName'),
                'referenceAddress'=>$this->input->post('referenceAddress'),
                'referenceContact'=>$this->input->post('referenceContact'),
                'referenceRelation'=>$this->input->post('referenceRelation'),
                'fkClientId'=>$resultClient
            );
            $dataemploymentDetails = array(
                'employerName'=>$this->input->post('employerName'),
                'employmentType'=>$this->input->post('employmentType'),
                'occupation'=>$this->input->post('occupation'),
                'homeType'=>$this->input->post('homeType'),
                'employmentAddress'=>$this->input->post('employmentAddress'),
                'monthlyBill'=>number_format($this->input->post('monthlyBill'), 2, '.', ','),
                'fkClientId'=>$resultClient
            );
            $resultemploymentDetails = $this->client_model->enroll_employmentdetails($dataemploymentDetails);
            $resultCoMaker = $this->client_model->enroll_comaker($dataCoMaker);
            $resultPersonalReference = $this->client_model->enroll_personalreference($dataPersonalReference);
            $this->view('registerSuccess');
        } else {
            $this->view('registerClient');
        }
    }

    // public function view_clients() {

    // }
}