
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Calories_Controller extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('set')){
			if($this->m_calories->can_update_calories($this->session->userdata('id'))){
				$data["calories"]=$this->m_calories->get_calories();
				$data["caloriesEaten"]=$this->m_calories->get_calories_eaten();
				$data["bliance"]=$this->m_calories->bilance_calories();
			}
			else{
				$data["calories"]="-";
				$data["caloriesEaten"]="-";
				$data["bliance"]="-";
			}

			$this->load->view('calories_view',$data);
		}
		else{
			$data["error"]=$this->alert->alert_succes("Sesja została zakończona");
			$this->load->view('index',$data);
		}
		
	}

	public function add_calories(){
		if($this->m_calories->can_update_calories($this->session->userdata('id'))){
			if($this->m_calories->update_calories($this->input->post("calories_add", TRUE))){
				$bliance=$this->m_calories->bilance_calories();
				if($bliance>0){
					echo "<message>
					<type>success</type>
					<text>Pozostało Ci $bliance kalorii do wykorzystania</text>
					<calories>".$this->m_calories->get_calories()."</calories>
					<caloriesEaten>".$this->m_calories->get_calories_eaten()."</caloriesEaten>
					<bilance>".$bliance."</bilance>
				  	</message>";
				}
				else{
					echo "<message>
					<type>warning</type>
					<text>Przekroczyłeś dzienne zapotrzebowanie kaloryczne</text>
					<calories>".$this->m_calories->get_calories()."</calories>
					<caloriesEaten>".$this->m_calories->get_calories_eaten()."</caloriesEaten>
					<bilance>0</bilance>
				  	</message>";
				}
			}
			else{
				echo "<message>
					<type>error</type>
					<text>Nieznany błąd</text>
				  </message>";
			}
		}
		else{
			echo "<message> 
					<type>error</type>
					<text>Uzupełnij profil BMI</text>
				  </message>";
		}	  
	}


}
?>