<?php
Class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->output->enable_profiler(TRUE);

	}

	// Show login page
	public function index() {
		//Vista principal
		$data['seo']['titulo'] = 'Pasaporte Tierra Astur';
		$data['page'] = 'auth/login';
		$this->load->view('web/wrap',$data);
	}

	// Show registration page
	public function user_registration_show() {
		$this->load->view('registration_form');
	}

	// Validate and store registration data in database
	public function new_user_registration() {

	// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('registration_form');
		} else {
			$data = array(
				'user_name' => $this->input->post('username'),
				'user_email' => $this->input->post('email_value'),
				'user_password' => $this->input->post('password')
				);
			$result = $this->login_database->registration_insert($data);
			if ($result == TRUE) {
				$data['message_display'] = 'Registration Successfully !';
				$this->load->view('login_form', $data);
			} else {
				$data['message_display'] = 'Username already exist!';
				$this->load->view('registration_form', $data);
			}
		}
	}

	// Check for user login process
	public function login() {

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {

				$this->session->set_userdata('error_msg', 'Email no válido, compruébelo');
				$data['page'] = 'auth/login';

		} else {
			$data = array(
				'username' => $this->input->post('email'),
				'password' => null
				);
			$result = $this->login_database->login($data);
			if ($result == TRUE) {

				$username = $this->input->post('email');
				$result = $this->login_database->read_user_information($username);
				if ($result != false) {
					$session_data = array(
						'username' => $result[0]->user_name,
						'email' => $result[0]->user_email,
						);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					$this->session->set_flashdata('message', 'Usuario TA correcto, bienvenido a su pasaporte.');
					$data['page'] = 'auth/dashboard';
				}
			} else {
				$this->session->set_flashdata('message', 'Email no válido, compruébelo');				
				$data['page'] = 'auth/login';

			}
		}

		$data['seo']['titulo'] = 'Pasaporte Tierra Astur';
		$this->load->view('web/wrap',$data);		
	}

	// Logout from admin page
	public function logout() {

	// Removing session data
		$sess_array = array(
			'username' => ''
			);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('login_form', $data);
	}

}