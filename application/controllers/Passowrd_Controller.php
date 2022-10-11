<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Passowrd_Controller extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('set')){
			$this->load->view('password_view');			
		}
		else{
			$data["error"]=$this->alert->alert_succes("Sesja została zakończona");
			$this->load->view('index',$data);
		}
		
	}
	public function change_password()
	{
		$hash_passowrd = password_hash($this->input->post("password", TRUE), PASSWORD_BCRYPT);
		$this->m_password->set_password($hash_passowrd);
		echo $this->m_password->update_password($this->session->userdata('id'));
	}
	



}
?>