<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller for Pages MVC
 * 
 * This is the Controller for Pages where it connects
 * the Page_model Models to Pages View.
 * 
 * @package aimex-v2/application/controllers
 * @author Renzo Beltran <renzobeltran@outlook.com>
 */
class Pages extends CI_Controller {

	/**
	 * A function to call the index page
	 * 
	 * This function accepts $page where its defaulted to login
	 * 
	 * @param string $page defaulted to login
	 */
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

	/**
	 * A function to call views for Pages view
	 * 
	 * This function call view pages which is $page is defaulted to index.
	 * 
	 * @param string $page defaulted to index
	 */
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
	
	/**
	 * A private function for hashing password
	 *
	 * This functions hashes the password to Bcrypt for security
	 * 
	 * @param string $password do not hash
	 * @return boolean password_hash($password, PASSWORD_BCRYPT)
	 */	
	private function hash_password($password){
		return password_hash($password, PASSWORD_BCRYPT);
	}

	/**
	 * A funtcion that validates login
	 * 
	 * This function validates the user if the input are with valid 
	 * information and matches the username and password data and calls can_login
	 * function from pages_model and creates a user session else it returns to the
	 * login page with out a session id and throws error flashdata messages. 
	 *
	 * @return void
	 */
	function login_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('page_model');
			$user_id = $this->page_model->can_login($username, $password);
			if($user_id) {
				foreach($user_id as $user_id) {
					$session_data = array(
						'username' => $username, 
						'role' =>$user_id->employee_position, 
						'employeeId' =>$user_id->id,
						'name' => $user_id->employee_firstname. ' ' . $user_id->employee_lastname
					);
					$this->session->set_userdata($session_data);
					if($user_id->flag_deleted == '1') {
						$this->session->set_flashdata('error', 'User has been deactivated');
						$this->logout();
					} else if($user_id->employee_position == 'Loans Processor') {
						redirect(base_url().'clients/home');
					} else if($user_id->employee_position == 'Loans Collector') {
						redirect(base_url().'clients/home');
					} else if($user_id->employee_position == 'Manager') {
						redirect(base_url().'clients/home');
					} 
				}
			} else {
				$this->session->set_flashdata('error', 'Invalid Username and Password');
				$this->index();
			}
		} else {
			$this->index();
		}	
	}
	/**
	 * A function that logs out a user
	 * 
	 * This function logs out the the user by unset the userdata session
	 * and prevents unwanted access to pages beyond login and register.
	 * This function redirects the user being logged out back to the index page
	 *
	 * @return void
	 */
	function logout() {
		$this->session->unset_userdata('username');
		$this->index();	
	}
	/**
	 * A function that handles registration validation
	 * 
	 * This function handles the validations for registratin
	 * and transfers the data collected to the Page Models and
	 * redirects back to the index page.
	 *
	 * @return void
	 */
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
			$this->index();
		} else {
			$this->view('register');
		}
	}
}
