<?php 

include_once('facile.php');
include_once('monstres/ogre.php');

class Moyen extends Facile{
    public function __construct() {
        parent::__construct();
        // for($i=count($this->combats)-1;$i<count($this->combats)+1;$i++){
        //     $this->combats[$i]=new Ogre($i+1);
        // }
        for($i=6;$i<=7;$i++){
            $this->combats[$i]=new Ogre($i+1);
        }
    }
    
}



?>