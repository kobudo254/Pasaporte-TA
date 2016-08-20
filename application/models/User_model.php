<?php
class User_model extends CI_Model {

	public function __construct()
	{
	        parent::__construct();
	}


	//If is logged ...
	public function check_login(){
		return (bool) $this->session->userdata('correo');
	}

	// Insert registration data in database
	public function registration_insert($data) {
		// Query to check whether username already exist or not
		$condition = "user_name =" . "'" . $data['user_name'] . "'";
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
			if ($query->num_rows() == 0) {

			// Query to insert data in database
				$this->db->insert('user_login', $data);
				if ($this->db->affected_rows() > 0) {
					return true;
				}
			} else {
				return false;
			}
	}

	// Read data using username and password
	public function login($data) {

		$condition = "user_name =" . "'" . $data['username']."'";
		if($data['password']!=null){ 
			$condition .=" AND " . "user_password =" . "'" . $data['password'] . "'";
		}
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

			if ($query->num_rows() == 1) {
			return true;
			} else {
			return false;
			}
	}

	// Read data from database to show data in admin page
	public function read_user_information($username) {

		$condition = "user_name =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

			if ($query->num_rows() == 1) {
			return $query->result();
			} else {
			return false;
			}
	}


    
	public function existe_email($email){
	    $this->db->select('email_usuario');
	    $this->db->where('email_usuario', $email); 
	    $query = $this->db->get('usuario');
	    if ($query->num_rows() > 0){
	       return 1;
	    }
	    return 0;
   }
   
   public function usuario_login($email){
      $this->db->where('email_usuario', $email); 
      //$this->db->where('clave', md5($clave)); 
      $query = $this->db->get('usuario');
      if ($query->num_rows() > 0){
         return $query->row();
      }
      return 0;
   }
   

   public function get_user_correo(){
   		if($this->session->userdata('correo')!=null):
   				return $this->session->userdata('correo');
   		else:
   				return false;

   		endif;
   }
   

   public function inserta_usuario($datos = array()){
      if(!$this->_required(array("email_usuario","clave"), $datos)){
         return FALSE;
      }
      //clave, encripto
      $datos['clave']=md5($datos['clave']);
   
      $this->db->insert('usuario', $datos);
      return TRUE;
   }




}