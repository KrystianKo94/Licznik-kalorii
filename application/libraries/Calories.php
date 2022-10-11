<?php
class  Calories  {
    public  $id_user;
    public  $calories;
    public  $calories_eaten;


    public function __construct () { 
                
    }

    public function make_calories_empty ($id_user,$calories){
    	$this->id_user=$id_user;
    	$this->calories=$calories;
    	$this->calories_eaten=0;
    }
        

}



?>