<?php 

include_once('difficulte.php');
include_once('monstres/gobelin.php');

class Facile extends Difficulte{

    public function __construct() {
        for($i=0;$i<=5;$i++){
            if($i==5){
                $this->combats[$i]=new Gobelin($i+2);
            }else{
                $this->combats[$i]=new Gobelin($i+1);
            }
        }
    }



}



?>