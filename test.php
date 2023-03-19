<?php 

include_once('hero/magician.php');
include_once('hero/warrior.php');
include_once('hero/rogue.php');
include_once('difficulte/facile.php');
include_once('difficulte/moyen.php');
include_once('difficulte/hard.php');

session_start();
// $_SESSION=[];
// session_destroy();

if(isset($_SESSION['nameHero']) && isset($_SESSION['classHero']) 
&& isset($_SESSION['levelHero']) && isset($_SESSION['hpHero']) 
&& isset($_SESSION['manaHero']) && isset($_SESSION['combats'])
&& isset($_SESSION['fight'])){
    if($_SESSION['classHero']=== 'Warrior'){
        $hero = new Warrior($_SESSION['nameHero']);
    }else if($_SESSION['classHero']=== 'Magician'){
        $hero = new Magician($_SESSION['nameHero']);
    }else if($_SESSION['classHero']=== 'Rogue'){
        $hero = new Rogue($_SESSION['nameHero']);
    }

    $hero->setLevel($_SESSION['levelHero']);
    $diff=$hero->getHp()-$_SESSION['hpHero'];
    $hero->setHp(-$diff);
    $diff=$hero->getMana()-$_SESSION['manaHero'];
    $hero->setMana(-$diff);

    echo $hero;

    

    echo '<br><br>';

    // $monster= $_SESSION['combats']->getCombats()[$_SESSION['fight']];
    // echo $monster;

    // var_dump(get_class($_SESSION['combats']));
    if(get_class($_SESSION['combats'])=='Facile'){
        $nbFights=6;
    }else if(get_class($_SESSION['combats'])=='Moyen'){
        $nbFights=8;
    }else if(get_class($_SESSION['combats'])=='Hard'){
        $nbFights=10;
    }
    
    ////FAIRE CHOIX DES COMBATS ICI

    if($_SESSION['fight']==$nbFights){
        echo 'JEU FINI, BRAVO !';
        echo '<form action="supprHero.php" method="post"><button type="submit">Nouveau Perso</button></form>';
    }else if($_SESSION['levelHero']<=6){
        echo '<form action="fight.php" method="post"><input name="gobelin" type="hidden"><button type="submit">Fight Gobelin</button></form>';
    }else if($_SESSION['levelHero']>6 && $_SESSION['levelHero']<=8){
        echo '<form action="fight.php" method="post"><input name="ogre" type="hidden"><button type="submit">Fight Ogre</button></form>'; 
    }else if($_SESSION['levelHero']>8 && $_SESSION['levelHero']<=10){
        echo '<form action="fight.php" method="post"><input name="dragon" type="hidden"><button type="submit">Fight Dragon</button></form>'; 
    }

    // $facile=new Hard();
    // print_r($facile->getCombats());
    
}else{
    include_once('formHero.php');
}




?>
