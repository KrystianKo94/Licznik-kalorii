<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main_Page_Controller extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('set')){
			if($this->m_bmi->select_bmi_by_id($this->session->userdata('id'))){
			$data["weight"]=$this->m_bmi->get_weight();
				$data["height"]=$this->m_bmi->get_height();
				$data["age"]=$this->m_bmi->get_age();
				$data["calories"]=$this->m_bmi->get_calories_required();
				$data["bmi"]=$this->m_bmi->get_bmi();
				$bmi=$this->m_bmi->get_bmi();
					$color=["bg-red","bg-pink","bg-blue","bg-orange","bg-teal","bg-purple", "bg-lime", "bg-green"];
					if ($bmi<16){
						$data["color"]= $color[6];
					}
					elseif ($bmi>=16 && $bmi<=16.99) {
						$data["color"]=  $color[0];
					}
					elseif ($bmi>=17 && $bmi<=18.49) {
						$data["color"]=  $color[1];
					}
					elseif ($bmi>=18.5 && $bmi<=24.99) {
						$data["color"]= $color[2];
					}
					elseif ($bmi>=25 && $bmi<=29.99){
						$data["color"]= $color[3];
					}
					elseif ($bmi>=30 && $bmi<=34.99) {
					$data["color"]= $color[4];
					}
					elseif ($bmi>=35 && $bmi<=39.99) {
					$data["color"]= $color[5];
					}
					elseif ($bmi>=40) {
						$data["color"]= $color[7];

					}
			}
				
			else{
				$data["weight"]="-";
				$data["height"]="-";
				$data["age"]="-";
				$data["calories"]="-";
				$data["bmi"]="-";
				$data["color"]="bg-blue";
						}
					$this->load->view('main_view',$data);
		}
		else{
			$data["error"]=$this->alert->alert_succes("Sesja została zakończona");
			$this->load->view('index',$data);
		}
		
	



}
}
?>