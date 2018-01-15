<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller for Collection MVC
 */
class Collections extends CI_Controller {
    /**
     * A function to set views
     *
     * @param string $page defaulted to home
     * @return void
     */
    public function view($page = 'home') {
        if($this->session->userdata('username') != '') {
            if($this->session->userdata('role') != 'Loans Processor') {
                if(!file_exists(APPPATH.'views/collections/'.$page.'.php')) {
                    show_404();
                }
                $data['title'] = ucfirst($page);
                $data['username'] = $this->session->userdata('username');

                $this->load->view('_partials/_header', $data);
                $this->load->view('_partials/_navbars/_collectionsnavbar', $data);
                $this->load->view('collections/'.$page, $data);
                $this->load->view('_partials/_footer');
            } else {
                redirect(base_url().'loans/home');
            }
        } else {
            redirect(base_url());  
        }
    }
}