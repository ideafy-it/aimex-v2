<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller for Loans MVC
 */
class Loans extends CI_Controller {
    public function view($page = 'home') {
        if($this->session->userdata('username') != '') {
            if(!file_exists(APPPATH.'views/loans/'.$page.'.php')) {
                show_404();
            }

            $data['title'] = ucfirst($page);
            $data['username'] = $this->session->userdata('username');

            $this->load->view('_partials/_header', $data);
            $this->load->view('loans/'.$page, $data);
            $this->load->view('_partials/_footer');
        } else {
            redirect(base_url());
        }
    }
}