<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BMI_Controller extends CI_Controller {

	public function index(){
		if($this->session->userdata('set')){
			if($this->m_bmi->select_bmi_by_id($this->session->userdata('id'))){
				$data["bmi"]=$this->m_bmi->get_bmi();
				$data["bmr"]=$this->m_bmi->get_bmr();
				$data["calories"]=$this->m_bmi->get_calories_required();
			}
			else{
				$data["bmi"]="-";
				$data["bmr"]="-";
				$data["calories"]="-";
			}
			$this->load->view('bmi_view',$data);
		}
		else{
			$data["error"]=$this->alert->alert_succes("Sesja została zakończona");
			$this->load->view('index',$data);
		}	
	}

	public function bmi_calculate(){
		$this->m_bmi->create_model($this->input->post("weight", TRUE),
			$this->input->post("height", TRUE),
			$this->input->post("age", TRUE),
			$this->input->post("gender", TRUE));

		$bmi=$this->m_bmi->get_bmi();	
		$bmr=$this->m_bmi->get_bmr();	
		$calories=$this->m_bmi->get_calories_required();	
		$id=$this->session->userdata('id');
		$this->session->message="";
		$this->m_bmi->update_calories($id);
		echo "<val><bmi>$bmi</bmi><bmr>$bmr</bmr><calories>$calories</calories></val>";  
	}


}
?>