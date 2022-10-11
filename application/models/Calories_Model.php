<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Calories_Model extends CI_Model
{
    private $id_user;
    private $calories_eaten;
    private $calories;
    private $date;

    public function can_update_calories($id_user){
        $sql = "SELECT * FROM calories WHERE id_user = ? AND `date`=CURDATE() ";
        $query =$this->db->query($sql, array($id_user));
        $row = $query->row();
        if(is_null($row)){
            return false;
        }
        else{
            $this->mapper_data($row,$id_user);  
            return true;
        }
    }

    private function mapper_data($row,$id_user){
        $this->calories=$row->calories;
        $this->calories_eaten=$row->calories_eaten;
        $this->id_user=$id_user;
        $this->date=$row->date;
    }

    public function update_calories($cal_to_add){
        $this->calories_eaten=($this->calories_eaten+$cal_to_add);
        $this->db->set(array('calories_eaten' => $this->calories_eaten));
        $this->db->where( array('id_user' => $this->id_user, 'date' => $this->date));
        return $this->db->update('calories');
    }

    public function bilance_calories(){
        return number_format($this->calories-$this->calories_eaten,2,'.','');
    }
        public function get_id_user() {
        return $this->id_user;
    }

    public function get_calories_eaten() {
        return number_format($this->calories_eaten, 2, '.', '');
    }

    public function get_calories() {
        return number_format($this->calories, 2, '.', '');       
    }

    public function get_date() {
        return $this->date;
    }

    public function set_id_user($id_user) {
        $this->id_user = $id_user;
    }

    public function set_calories_eaten($calories_eaten) {
        $this->calories_eaten = $calories_eaten;
    }

    public function set_calories($calories) {
        $this->calories = $calories;
    }

    public function set_date($date) {
        $this->date = $date;
    }
}
?>
