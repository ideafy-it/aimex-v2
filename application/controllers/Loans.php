<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller for Loans MVC
 */
class Loans extends CI_Controller {
    public function view($page = 'home') {
        if($this->session->userdata('username') != '') {
           if($this->session->userdata('role') != 'Loans Collector') {
                if(!file_exists(APPPATH.'views/loans/'.$page.'.php')) {
                    show_404();
                }

                $data['title'] = ucfirst($page);
                $data['username'] = $this->session->userdata('username');
                $data['role'] = $this->session->userdata('role');

                $id = $this->uri->segment(3);
                $this->load->model('loan_model');
                if($id != null) {
                    $data['user_data'] = $this->loan_model->getClientById($id);
                }

                $this->load->view('_partials/_header', $data);
                $this->load->view('_partials/_navbars/_loansnavbar', $data);
                $this->load->view('loans/'.$page, $data);
                $this->load->view('_partials/_footer');
           } else {
                redirect(base_url().'collections/home');
           }
        } else {
            redirect(base_url());
        }
    }

    public function loan_validation() {
        $this->load->library('form_validation');
        // Loan Informatio
        $this->form_validation->set_rules('paymentTerms', 'Payment Terms', 'trim|numeric|max_length[50]|required');
        $this->form_validation->set_rules('monthlyPayment', 'Monthly Payment', 'trim|numeric|max_length[50]|required');
        $this->form_validation->set_rules('releaseDate', 'Release Date', 'required');
        $this->form_validation->set_rules('effectiveDate', 'Effective Date', 'required');
        $this->form_validation->set_rules('referenceCheck', 'Reference Check', 'trim|max_length[50]|required');
        $this->form_validation->set_rules('postAccount', 'Post to Account', 'trim|max_length[50]|required');
        $id = $this->uri->segment(3);
        if($this->form_validation->run()) {
            $this->load->model('loan_model');
            $data = array(
            'client'=>$this->input->post('clientId'),
            'loanType'=>$this->input->post('loanType'),
            'loanKind'=>"New Loan",
            'monthlyPayment'=>$this->input->post('monthlyPayment'),
            'loanTerms'=>$this->input->post('loanTerms'),
            'interest'=>$this->input->post('interestRate'),
            'serviceFee'=>$this->input->post('serviceCharge'),
            'notarialFee'=>$this->input->post('notarialFee'),
            'releaseDate'=>$this->input->post('releaseDate'),
            'effectiveDate'=>$this->input->post('effectiveDate'),
            'paymentSchedule'=>$this->input->post('paymentSchedule'),
            'referenceCheck'=>$this->input->post('referenceCheck'),
            'postAccount'=>$this->input->post('postAccount')
            );
            $resultLoan = $this->loan_model->enrollLoan($data);
            redirect(base_url().'loans/home/'.$id);
        } else {
            redirect(base_url().'loans/addNewLoan/'.$id);
        }
    }
}