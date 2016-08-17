<?php
class Sidrerias extends CI_Model {

	public function __construct()
	{
	        parent::__construct();
	}


   public function reset_pasaporte($date = null){

		$datos = array(
			'user_email' => $this->session->userdata('correo'),
			'ta_parrilla' => 0,
			'ta_gascona' => 0,
			'ta_aguila' => 0,
			'ta_poniente' => 0,
			'ta_aviles' =>0,
			'fecha_fin' => $date
			);

		$this->db->set($datos);
		$this->db->where('user_email',$datos['user_email']);
		
		if($this->db->update('user_login', $datos)){	
		    return TRUE;
        }else{
        	return FALSE;
        }
   }


   public function reset_logros($id){

		$data = array(
		'user_id' => $id,
		'tres_visitas' => FALSE,
		'seis_visitas' => FALSE,
		'diez_visitas' => FALSE,
		'deluxe' => FALSE
		);

		$this->db->where('user_id',$id);
		$this->db->replace('premios', $data);

		return true;

   }


   public function visitar($chigre,$user){

		$this->db->query("
		    UPDATE user_login 
		    SET $chigre = $chigre + 1
		    WHERE id = '".$user."'
		    LIMIT 1
		");

		return true;

   }


}