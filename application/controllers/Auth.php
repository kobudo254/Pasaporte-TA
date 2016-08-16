<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->library('form_validation');
	}

	// Show login page
	public function index() {
		//Vista principal
		$data['seo']['titulo'] = 'Pasaporte Tierra Astur';
		$data['page'] = 'auth/login';
		$this->load->view('web/wrap',$data);
	}


	// Show user dashboard
	public function dashboard(){

		
	}


	// Show registration page
	public function user_registration_show() {
		$this->load->view('registration_form');
	}

	// Validate and store registration data in database
	public function new_user_registration() {
		
		$data = array(
			'user_name' => $this->session->userdata('correo'),
			'user_email' => $this->session->userdata('correo'),
			'user_password' => null
			);
		$result = $this->user_model->registration_insert($data);

		if ($result == TRUE) {
			$this->session->set_flashdata('msg', '<p class="msg_ok text-center">Usuario TA creado correctamente. Bienvenido a su nuevo pasaporte.</p>');
			redirect('passport/init/'.$this->db->insert_id());
		} else {
			$this->session->set_flashdata('message_error', 'Error al darte de alta como usuario nuevo.');
			$this->load->view('auth/login', $data);
		}

	}

	// Check for user login process
	public function login() {


		if ($this->input->post('correo') == null) {	

				$data['page'] = 'auth/login';

		} else {
			$data = array(
				'username' => $this->input->post('correo'),
				'password' => null
				);
			$result = $this->user_model->login($data);
			if ($result == TRUE) {

				$username = $this->input->post('correo');
				$result = $this->user_model->read_user_information($username);
				if ($result != false) {
					$session_data = array(
						'username' => $result[0]->user_name,
						'email' => $result[0]->user_email,
						);
					// Add user data in session
					$this->session->set_flashdata('message_error', '<p class="ok">Usuario TA correcto, bienvenido a su pasaporte.</p>');
					redirect('auth/dashboard');
				}
			} else {
				//Guardamos el correo para darle el alta
				$this->session->set_userdata('correo',$this->input->post('correo'));
				redirect('auth/new_user_registration');

			}
		} //Validation

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