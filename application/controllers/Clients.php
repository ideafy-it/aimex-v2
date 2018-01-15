<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {
    
    public function view($page = 'home') {
        if($this->session->userdata('username') != '') {
            if($this->session->userdata('role') != 'Manager' || $this->session->userdata('role') != 'Loans Processor') {
                if(!file_exists(APPPATH.'views/clients/'.$page.'.php')) {
                    show_404();
                }
                $data['title'] = ucfirst($page);
                $data['username'] = $this->session->userdata('username');

                $this->load->view('_partials/_header', $data);
                $this->load->view('_partials/_navbars/_clientsnavbar', $data);
                $this->load->view('clients/'.$page, $data);
                $this->load->view('_partials/_footer');
            } else {
                $this->load->controller('collections');
                $this->collections->view();
            }
        } else {
            $this->load->controller('pages');
            $this->pages->index();
        }
    }
}