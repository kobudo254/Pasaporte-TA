<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->library('form_validation');

		//$this->output->enable_profiler(TRUE);		
	}

	// Show login page
	public function index() {


		if ( strtotime(date('Y-m-d')) < strtotime(VALIDED) ):
			

	 		if (!$this->user_model->check_login()){

	 			if($this->uri->segment(3)=="bye"):
						$this->session->set_flashdata('message_error', '<p class="ok">Ha salido correctamente. Hasta luego.</p>');
				endif;

				//Vista principal
				$data['seo']['titulo'] = 'Pasaporte Tierra Astur';
				$data['page'] = 'auth/login';
				$this->load->view('web/wrap',$data);

	 		}else{ 			
	 			redirect('auth/dashboard');
	 		}

		else:
			//Pasaporte no valido en verano, reactivación en 
			$data['nueva_fecha'] = date('d-m-Y',strtotime(REINICIO));

			//Vista principal
			$data['seo']['titulo'] = 'Pasaporte Tierra Astur';
			$data['page'] = 'auth/passport_invalid';
			$this->load->view('web/wrap',$data);

		endif;


	}


	// User dashboard
	public function dashboard(){


		if ($this->user_model->check_login()){
			
			//Get user info: id, email....
			$data['user_data'] = $this->user_model->read_user_information($this->session->userdata('correo'));
			$this->session->set_userdata('user_id',$data['user_data'][0]->id);

			//Count visits
			$data['total'] = 0;
			$data['total']= $data['user_data'][0]->ta_parrilla + $data['user_data'][0]->ta_gascona + $data['user_data'][0]->ta_aguila + $data['user_data'][0]->ta_poniente + $data['user_data'][0]->ta_aviles;

			//Lookup for avatar, if not use this one. Default s avatar.
			$data['user_avatar'] = 'img_perfil.jpg';


			//Vista principal
			$data['seo']['titulo'] = 'Pasaporte Tierra Astur';
			$data['page'] = 'auth/dashboard';
			$this->load->view('web/wrap',$data);	
		}else{
			$this->session->set_flashdata('message_error', 'Debe loguearse para acceder a su perfil');
			redirect('auth/login');
		}	

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
			$this->session->set_userdata('user_id',$this->db->insert_id());
			redirect('passport/init/'.$this->session->userdata('user_id'));
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
			$this->session->set_userdata('correo',$this->input->post('correo'));			
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
				redirect('auth/new_user_registration');

			}
		} //Validation

		$data['seo']['titulo'] = 'Pasaporte Tierra Astur';
		$this->load->view('web/wrap',$data);		
	}


	public function pass_check($chigre){

		$clave = $this->input->post('clave_chigre');

		switch($chigre){
			case "gascona": $super_clave = GASCONA;
							break;
			case "parrilla": $super_clave = PARRILLA;
								break;
			case "aviles": $super_clave = AVILES;
								break;
			case "aguila": $super_clave = AGUILA;
								break;
			case "poniente": $super_clave = PONIENTE;
							break;
			default: return false;
					break;
		}

		$data['ok'] = true;

		if($super_clave == $clave):
			echo "true";
		else:
			echo "false";
		endif;
	}

	//Change avatar{
 public function avatar()
    {

            $config['upload_path']          = './assets/img/avatars/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 3000;
            $config['max_width']            = 5000;
            $config['max_height']           = 5000;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('avatar'))
            {
                $this->session->set_flashdata('message',  $this->upload->display_errors());
                $avatar = 'img_perfil.jpg';
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $avatar = $this->upload->data('file_name');
            }

            json_response($data);
    }



	// Logout from admin page
	public function logout() {

		// Removing session data
		$this->session->sess_destroy();

		$this->session->set_flashdata('message_error', '<p class="ok">Usuario TA correcto, bienvenido a su pasaporte.</p>');
		
		$this->output->delete_cache();

		redirect('auth/index/bye');
	}




}