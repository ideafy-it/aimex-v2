<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index($page = 'login') {
		if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
			show_404();
		}	

		$data['title'] = ucfirst($page);

		$this->load->view('_partials/_header', $data);
		$this->load->view('_partials/_navbars/_pagesnavbar');
		$this->load->view('pages/'.$page, $data);	
		$this->load->view('_partials/_footer');
	}

	public function view($page = 'index') {
		if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
			show_404();
		}	

		$data['title'] = ucfirst($page);

		$this->load->view('_partials/_header', $data);
		$this->load->view('_partials/_navbars/_pagesnavbar');
		$this->load->view('pages/'.$page, $data);	
		$this->load->view('_partials/_footer');
	}
	
	private function hash_password($password){
		return password_hash($password, PASSWORD_BCRYPT);
	}

	function login_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->load->model('page_model');
			if($this->page_model->can_login($username, $password)) {
				$session_data = array(
					'username' => $username //,
					//'employee_position' => $employee_position
				);
				$this->session->set_userdata($session_data);
				redirect(base_url().'loans/home');
			} else {
				$this->session->set_flashdata('error', 'Invalid Username and Password');
				redirect(base_url());
			}
		} else {
			$this->index();
		}	
	}

	function logout() {
		$this->session->unset_userdata('username');
		redirect(base_url());
	}
	
	function register_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('employee_firstname', 'First Name', 'trim|max_length[50]|required');
		$this->form_validation->set_rules('employee_lastname', 'Last Name',  'trim|max_length[50]|required');
		$this->form_validation->set_rules('employee_username', 'Username', 'trim|max_length[50]|required');
		$this->form_validation->set_rules('employee_password', 'Password', 'trim|min_length[8]|required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|min_length[8]|matches[employee_password]|required');

		if($this->form_validation->run()) {
			$data = array(
				'employee_firstname'=>$this->input->post('employee_firstname'),
				'employee_lastname'=>$this->input->post('employee_lastname'),
				'employee_username'=>$this->input->post('employee_username'),
				'password'=>$this->hash_password($this->input->post('employee_password')),
				'employee_position'=>$this->input->post('employee_position')
			);
			$this->load->model('page_model');
			$result = $this->page_model->register_employee($data);
			redirect(base_url());
		} else {
			$this->view('register');
		}
	}
}
