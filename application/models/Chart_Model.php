<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chart_Model extends CI_Model{

	public function make_xml($id){
		$xml="<days>";
		$query=$this->select_calories_by_id($id);
		if(!is_null($query)){  
			foreach ($query->result() as $row){
		      	$xml.="<day>";
		      	$xml.="<date>".$row->date."</date>";
		      	$xml.="<calc>".$row->calories_eaten."</calc>";
		      	$xml.="<calcBMI>".$row->calories."</calcBMI>";
				$xml.="</day>";
			}

		}
		else{
			$xml.="<day>";
		      	$xml.="<date></date>";
		      	$xml.="<calc></calc>";
		      	$xml.="<calcBMI></calcBMI>";
				$xml.="</day>";
		}
		$xml.="</days>";
		return $xml;
	}

	private function select_calories_by_id($id_user){ 
		$sql = "SELECT * FROM calories WHERE id_user = ?";
        $query =$this->db->query($sql, array($id_user));
        return $query;
	}
}
?>
