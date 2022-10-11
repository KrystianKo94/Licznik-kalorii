<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('register');
	}
	
	public function register_data()
	{
		$hash_passowrd = password_hash($this->input->post("password", TRUE), PASSWORD_BCRYPT);
		$this->m_register->mapper_data($this->input->post("name", TRUE),
			 $this->input->post("surname", TRUE),
			 $this->input->post("login", TRUE),
			 $hash_passowrd
			);
		echo $this->m_register->create_user();
	}

}
?>