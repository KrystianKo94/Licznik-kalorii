<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class BMI_Model extends CI_Model {

	private	$age;
	private	$weight ;
	private	$height;
	private	$gender;
	private $bmi;
	private	$bmr;
    private $calories_required;

	function __construct(){
        parent::__construct();
    }
    
    public function create_model($w,$h,$a,$g){
    	$this->weight= $w;
		$this->height= $h;
		$this->age= $a;
		$this->gender= $g;
		$this->bmi=$this->weight/($this->height/100*$this->height/100);
        $this->bmi=number_format($this->bmi, 2, '.', '');
		if($this->gender=="M"){
			$this->bmr=(9.99*$this->weight)+(6.25*$this->height)-(4.92*$this->age)+5;
		}
		else {
			$this->bmr=(9.99*$this->weight)+(6.25*$this->height)-(4.92*$this->age)-161;
		}
        $this->bmr= number_format($this->bmr, 2, '.', '');
        $calories_user = new Required_Calories();
        $this->calories_required=$calories_user->get_required_User($a,$w,$g);
        if(is_null($this->calories_required)){
            $this->calories_required=2500;
        }
    }

    public function fill_data_user($w,$h,$a,$bmi,$bmr,$c){
        $this->weight= $w;

        $this->height= $h;
        $this->age= $a;
        $this->bmi= number_format($bmi, 2, '.', '');
        $this->bmr= number_format($bmr, 2, '.', '');
        $this->calories_required=$c;
    } 
   
  


    public function update_calories($id){
    	if(is_null($this->bmi)){
    		return false;
    	}
    	else{
    		$this->db->where('id_user',$id);  
        	$this->db->update('user', $this->array_data());  
            $this->insert_calories($id);
            return true;
    	}
    }

    public function array_data(){
    	$arraydata = array(
                			'weight'  => $this->weight,
                			'height'     => $this->height,
                			'age' => $this->age,
                			'bmi' => $this->bmi,
                			'bmr'=> $this->bmr,
                            'calories' =>$this->calories_required
        			);
    	return $arraydata;
    }

    private function insert_calories($id_user){
        $sql = "SELECT * FROM calories WHERE id_user = ? AND `date`=CURDATE() ";
        $query =$this->db->query($sql, array($id_user));
        $row = $query->row();
        if(is_null($row)){  
            $this->calories->make_calories_empty($id_user,$this->calories_required);
            $this->db->insert('calories', $this->calories); 
        }
        else{
            $this->db->set(array('calories' => $this->calories_required)); 
            $this->db->where( array('id_user' => $id_user, 'date' => $row->date));   
            $this->db->update('calories');
        }
        return true;  
    }

    public function select_bmi_by_id($id_user)
    {
        $query = $this->db->get_where('user', array('id_user' => $id_user));  
        $row = $query->row();
        if(!is_null($row->bmi)){
            $this->fill_data_user($row->weight,$row->height,$row->age,$row->bmi,$row->bmr,$row->calories);
            return true;
        }
        else{
            return false;
        }
    }

    public function get_age() {
        return $this->age;
    }

    public function get_weight() {
        
        return number_format($this->weight, 2, '.', '');
    }

    public function get_height()
     {
        return number_format($this->height, 2, '.', '');
    }

    public function get_gender() {
        return $this->gender;
    }

    public function get_bmi() {
        return $this->bmi;
    }

    public function get_bmr() {
        return $this->bmr;
    }

    public function get_calories_required() {
       return $this->calories_required;
    }

    public function set_age($age) {
        $this->age = $age;
    }

    public function set_weight($weight) {
        $this->weight = $weight;
    }

    public function set_height($height) {
        $this->height = $height;
    }

    public function set_gender($gender) {
        $this->gender = $gender;
    }

    public function set_bmi($bmi) {
        $this->bmi = $bmi;
    }

    public function set_bmr($bmr) {
        $this->bmr = $bmr;
    }
    public function set_calories_required($calories_required) {
        $this->calories_required = $calories_required;
    }

 
} 
?>