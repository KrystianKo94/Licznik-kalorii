

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_Controller extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('set')){
			$this->load->view('main_view');
		}
		else{
			$data["error"]="";
			$this->load->view('index',$data);
		}
		
	}

	public function validate_user(){
		$array_data = array( );
		$password=$this->input->post("password");
		if($this->m_login->user_is_set($this->input->post("login", TRUE))){
			if($this->m_login->equals_password($password)){
				if($this->m_login->completed_registration()){
					$array_data=$this->m_login->make_session("");
					$this->m_login->insert_calories($array_data['id']);
						$data["weight"]=$this->m_login->get_weight();
				$data["height"]=$this->m_login->get_height();
				$data["age"]=$this->m_login->get_age();
				$data["calories"]=$this->m_login->get_cal();
				$data["bmi"]=$this->m_login->get_bmi();
				$bmi=$this->m_login->get_bmi();
					$color=["bg-red","bg-pink","bg-blue","bg-orange","bg-teal","bg-purple", "bg-lime", "bg-green"];
					if ($bmi<16){
						$data["color"]= $color[7];
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
						$data["color"]= $color[6];

					}


				}
				else{
					$array_data=$this->m_login->make_session($this->alert->span_badges("1"));
					$data["weight"]="-";
				$data["height"]="-";
				$data["age"]="-";
				$data["calories"]="-";
				$data["bmi"]="-";
				$data["color"]="bg-blue";
				}	
							
				$this->session->set_userdata($array_data);
				$this->load->view('main_view' ,$data);
			}
			else{
				$data["error"]= $this->alert->alert_error("Podane hasło jest nieprawidłowe");
                $this->load->view('index',$data);
			}
		}
		else{
			$data["error"]= $this->alert->alert_error("Podane konto nie istnieje");
            $this->load->view('index',$data);
		}
	}
 	public function logout(){
		$this->session->sess_destroy();
		$data["error"]=$this->alert->alert_succes("Zostałeś wylogowany z systemu");
		$this->load->view('index',$data);
 	}

}
?>