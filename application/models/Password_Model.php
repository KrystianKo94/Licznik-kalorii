<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Password_Model extends CI_Model
{

	private $password;

    public function update_password($id_user){
        $this->db->set($this->make_array());
        $this->db->where('id_user', $id_user);
		return $this->db->update("User");
		
    }
    private function make_array(){
    	$array_data = 
		array(
			'password' => $this->password
		 );
		return $array_data;
    }
    
    public function get_password() {
        return $this->password;
    }

    public function set_password($password) {
        $this->password = $password;
    }



}
?>