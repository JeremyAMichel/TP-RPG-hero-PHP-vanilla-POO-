<?php 

include_once('moyen.php');
include_once('monstres/Dragon.php');

class Hard extends Moyen{
    public function __construct() {
        parent::__construct();
        for($i=8;$i<=9;$i++){
            if(count($this->combats)==9){
                $this->combats[$i]=new Dragon($i+2);
            }else{
                $this->combats[$i]=new Dragon($i+1);
            }
            
        }
    }    
}



?>