<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Login_Model extends CI_Model{

    private $id_user;
    private $name;
    private $surname;
    private $login;
    private $password;
    private $weight;
    private $height;
    private $age;
    private $bmi;
    private $bmr;
    private $cal;
    

    public function user_is_set( $login){
        $sql = "SELECT * FROM user WHERE login = ?";
        $query =$this->db->query($sql, array($login));
        $row = $query->row();
        if(isset($row)){
           $this->mapper_data($row);
           return true; 
        }
        else{
            return false;
        }
    }

    public function equals_password($password_user){
       if(password_verify($password_user,$this->password)){
        return true;
       }
       else{
        return false;
       }
    }

    public function completed_registration()
    {
        if(!is_null($this->weight)){
            return true;
        }
        else{
            return false;
        }
    }

    private function mapper_data($data){
        $this->id_user=$data->id_user;
        $this->name=$data->name;
        $this->surname=$data->surname;
        $this->login=$data->login;
        $this->password=$data->password;
        $this->weight=$data->weight;
        $this->height=$data->height;
        $this->age=$data->age;
        $this->bmi=$data->bmi;
        $this->bmr=$data->bmr;
        $this->cal=$data->calories;
       
    }

    public function make_session($alert){
        $array_data = array(
               'id'  => $this->id_user,
               'login'     => $this->login,
               'set' => TRUE,
               'message' => $alert
            );
        return $array_data;
    }

    public function insert_calories($id_user){
        $sql = "SELECT * FROM calories WHERE id_user = ? AND `date`=CURDATE() ";
        $query =$this->db->query($sql, array($id_user));
        $row = $query->row();
        if(!isset($row)){
            $this->calories->make_calories_empty($id_user,$this->cal);  
            $this->db->insert('calories', $this->calories);  
                    } 
    }

    public function get_id_user() {
        return $this->id_user;
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

    public function get_weight() {

        return number_format($this->weight, 2, '.', '');
    }

    public function get_height() {
        return $this->height;
    }

    public function get_age() {
        return $this->age;
    }

    public function get_bmi() {
        return number_format($this->bmi, 2, '.','');
    }

    public function get_bmr() {
        return $this->bmr;
    }
      public function get_cal() {
        return $this->cal;
    }
    

    public function set_id_user($id_user) {
        $this->id_user = $id_user;
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

    public function set_weight($weight) {
        $this->weight = $weight;
    }

    public function set_height($height) {
        $this->height = $height;
    }

    public function set_age($age) {
        $this->age = $age;
    }

    public function set_bmi($bmi) {
        $this->bmi = $bmi;
    }

    public function set_bmr($bmr) {
        $this->bmr = $bmr;
    }
       public function set_cal($cal) {
        $this->cal = $cal;
    }

    
    



}
?>