<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Error_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('404_view');
		
		
	}
}
?>