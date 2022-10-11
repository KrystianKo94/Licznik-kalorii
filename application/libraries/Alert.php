<?php  defined ( 'BASEPATH' )  or  exit ( "Brak bezpośredniego dostępu do skryptu" );

class  Alert  {
        public  function  __construct (  ) 
        { 
                
        }
        
        public function alert_error($message)
         {
          return " <div class=\"alert bg-red\">
                                 $message
                            </div>";
         }

         public function alert_succes($message)
         {
          return " <div class=\"alert bg-green\" >
                                 $message
                            </div>";
         }

         public function span_badges($val)
          {
          		return "<span id=\"spanValue \" class=\"badge\">$val</span>";
          } 
}
?>