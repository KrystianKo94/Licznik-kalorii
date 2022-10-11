<?php
class  Required_Calories  {
    private  $calories_man = array(
                        array(2500,2300,1900),
                        array(2600,2400,2000),
                        array(2750,2500,2100),
                        array(2900,2600,2200),
                        array(3000,2700,2300),
                        array(3200,2800,2400),
                        array(3500,2900,2600)
                    );
    private  $calories_woman = array(
                        array(1750,1600,1400),
                        array(1850,1650,1500),
                        array(1950,1750,1550),
                        array(2050,1850,1600),
                        array(2150,1950,1650),
                        array(2250,2050,1700),
                        array(2400,2150,1750)
                    );
    public function __construct () { 
    }

    public function get_required_User($age,$weight,$gender){
        if($gender=="M"){
            return  $this->get_calories_man($age,$weight);
        }
        else{
            return  $this->get_calories_woman($age,$weight);
        }
    }
        
    private function get_calories_man($age,$weight){
        $row=$this->get_index_age($age);
        $column=$this->get_index_weight_man($weight);
        if(!is_null($row)){
            return $this->calories_man[$column][$row];
        }
        else{
            return null;
        }
    }

    private function get_calories_woman($age,$weight){
        $row=$this->get_index_age($age);
        $column=$this->get_index_weight_woman($weight);
        if(!is_null($row)){
            return $this->calories_woman[$column][$row];
        }
        else{
            return null;
        }
    }
    
    private function get_index_age($age){
        if($age>=18 && $age<=35){
            return 0;
        }  
        if ($age>=36 && $age<55) {
            return 1;
        }
        if($age>=55){
            return 2;
        }
        return null;
    }

    private function get_index_weight_man($weight){
        
        if($weight<65){
            return 0;
        }
        if($weight>=65 && $weight<70){
            return 1;
        }
        if($weight>=70 && $weight<75){
            return 2;
        }
        if($weight>=75 && $weight<80){
            return 3;
        }
        if($weight>=80 && $weight<85){
            return 4;
        }
        if($weight>=85 && $weight<90){
            return 5;
        }
        if($weight>=90){
            return 6;
        }   
    }
    private function get_index_weight_woman($weight){
        
        if($weight<50){
            return 0;
        }
        if($weight>=50 && $weight<55){
            return 1;
        }
        if($weight>=55 && $weight<60){
            return 2;
        }
        if($weight>=60 && $weight<65){
            return 3;
        }
        if($weight>=65 && $weight<70){
            return 4;
        }
        if($weight>=70 && $weight<75){
            return 5;
        }
        if($weight>=75){
            return 6;
        }   
    }

}
?>