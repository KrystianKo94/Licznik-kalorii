<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register_Model extends CI_Model
{
	private $name;
	private $surname;
	private $login;
	private $password;

    public function create_user(){
        
        $sql = "SELECT * FROM user WHERE login = ?";
        $query =$this->db->query($sql, array($this->login));
        $row = $query->row();
        if(is_null($row)){
            $this->db->set($this->make_array());
            $this->db->insert("User");
            return true;   
        }
       else{
            return false;
       }
    }

    public function mapper_data($n,$s,$l,$p){
    	$this->name=$n;
    	$this->surname=$s;
    	$this->login=$l;
    	$this->password=$p;
    }

    private function make_array(){
    	$array_data = 
		array('name' => $this->name,
			'surname' => $this->surname,
			'login' => $this->login,
			'password' => $this->password
		 );
		return $array_data;
    }
    
    public function get_name() {
        return $this->name;
    }

    public function get_surname() {
        return $this->surname;
    }

    public function get_login() {
        return $this->login;
    }

    public function get_password() {
        return $this->password;
    }

    public function set_name($name) {
        $this->name = $name;
    }

    public function set_surname($surname) {
        $this->surname = $surname;
    }

    public function set_login($login) {
        $this->login = $login;
    }

    public function set_password($password) {
        $this->password = $password;
    }

}
?>