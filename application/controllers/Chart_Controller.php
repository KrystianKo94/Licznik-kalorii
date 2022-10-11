<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chart_Controller extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('set')){
			$this->load->view('chart_view');

		}
		else{
			$data["error"]=$this->alert->alert_succes("Sesja została zakończona");
			$this->load->view('index',$data);
		}
		
	}
	public function show_chart($id)
	{
		echo $this->m_chart->make_xml($id);
	}

}
?>