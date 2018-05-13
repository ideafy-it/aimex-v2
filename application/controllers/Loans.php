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
                    $data['loan_data'] = $this->loan_model->getLoansByClientId($id);
                    $data['loan_details'] = $this->loan_model->getLoanById($id);
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
        $this->form_validation->set_rules('loanTerms', 'Payment Terms', 'trim|numeric|max_length[50]');
        $this->form_validation->set_rules('monthlyPayment', 'Monthly Payment', 'trim|numeric|max_length[50]');
        $this->form_validation->set_rules('releaseDate', 'Release Date', 'required');
        $this->form_validation->set_rules('effectiveDate', 'Effective Date', 'required');
        $this->form_validation->set_rules('referenceCheck', 'Reference Check', 'trim|max_length[50]');
        $this->form_validation->set_rules('postAccount', 'Post to Account', 'trim|max_length[50]');
        $id = $this->uri->segment(3);
        if($this->form_validation->run()) {
            $this->load->model('loan_model');
            $loanKind = $this->input->post('loanKind');
            if($loanKind == "New Loan") {
                $data = array(
                    'client'=>$this->input->post('clientId'),
                    'referenceNumber'=>$this->input->post('referenceNumber'),
                    'loanType'=>$this->input->post('loanType'),
                    'loanKind'=>$this->input->post('loanKind'),
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
            } elseif ($loanKind == "Renewal Loan") {
                $data = array(
                    'client'=>$this->input->post('clientId'),
                    'referenceNumber'=>$this->input->post('referenceNumber'),
                    'loanType'=>$this->input->post('loanType'),
                    'loanKind'=>$this->input->post('loanKind'),
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
            } elseif ($loanKind == "Extension Loan") {
                $data = array(
                    'client'=>$this->input->post('clientId'),
                    'referenceNumber'=>$this->input->post('referenceNumber'),
                    'loanType'=>$this->input->post('loanType'),
                    'loanKind'=>$this->input->post('loanKind'),
                    'monthlyPayment'=>$this->input->post('monthlyPayment'),
                    'loanTerms'=>$this->input->post('loanTerms'),
                    'interest'=>$this->input->post('interestRate'),
                    'serviceFee'=>$this->input->post('serviceCharge'),
                    'notarialFee'=>$this->input->post('notarialFee'),
                    'releaseDate'=>$this->input->post('releaseDate'),
                    'effectiveDate'=>$this->input->post('effectiveDate'),
                    'paymentSchedule'=>$this->input->post('paymentSchedule'),
                    'referenceCheck'=>$this->input->post('referenceCheck'),
                    'postAccount'=>$this->input->post('postAccount'),
                    'remainingMonths' => $this->input->post('remainingMonths'),
                    'availMonths' => $this->input->post('monthsToAvail')
                );
            } elseif($loanKind == "Additional Loan") {
                $data = array(
                    'client'=>$this->input->post('clientId'),
                    'referenceNumber'=>$this->input->post('referenceNumber'),
                    'loanType'=>$this->input->post('loanType'),
                    'loanKind'=>$this->input->post('loanKind'),
                    'monthlyPayment'=>$this->input->post('monthlyPayment'),
                    'loanTerms'=>$this->input->post('loanTerms'),
                    'interest'=>$this->input->post('interestRate'),
                    'serviceFee'=>$this->input->post('serviceCharge'),
                    'notarialFee'=>$this->input->post('notarialFee'),
                    'releaseDate'=>$this->input->post('releaseDate'),
                    'effectiveDate'=>$this->input->post('effectiveDate'),
                    'paymentSchedule'=>$this->input->post('paymentSchedule'),
                    'referenceCheck'=>$this->input->post('referenceCheck'),
                    'postAccount'=>$this->input->post('postAccount'),
                    'addAmount'=>$this->input->post('loanAmountToAdd')
                );
            }
            
            $resultLoan = $this->loan_model->enrollLoan($data);
            redirect(base_url().'loans/home/'.$id);
        } else {
            $loan = $this->input->post('loanKind');
            if($loan == "New Loan") {
                redirect(base_url().'loans/addNewLoan/'.$id);
            } if($loan == "Renewal Loan") {
                redirect(base_url().'loans/addRenewLoan/'.$id);
            } if($loan == "Additional Loan") {
                redirect(base_url().'loans/addAdditionalLoan/'.$id);
            } if($loan == "Extension Loan") {
                redirect(base_url().'loans/addExtensionLoan/'.$id);
            }
        }
    }
}