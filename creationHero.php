<?php 

include_once('hero/magician.php');
include_once('hero/warrior.php');
include_once('hero/rogue.php');

include_once('difficulte/facile.php');
include_once('difficulte/moyen.php');
include_once('difficulte/hard.php');


// var_dump($_POST);
session_start();

if(isset($_POST['name']) && isset($_POST['classe']) && isset($_POST['difficulte'])){
    if($_POST['classe']=== 'warrior'){
        $hero = new Warrior($_POST['name']);
    }else if($_POST['classe']=== 'magician'){
        $hero = new Magician($_POST['name']);
    }else if($_POST['classe']=== 'rogue'){
        $hero = new Rogue($_POST['name']);
    }

    if($_POST['difficulte']=== 'facile'){
        $difficulte = new Facile();
    }else if($_POST['difficulte']=== 'moyen'){
        $difficulte = new Moyen();
    }else if($_POST['difficulte']=== 'hard'){
        $difficulte = new Hard();
    }

}

$_SESSION['nameHero']= $hero->getName();
$_SESSION['classHero']= get_class($hero);
$_SESSION['levelHero']= $hero->getLevel();
$_SESSION['hpHero']= $hero->getHp();
$_SESSION['manaHero']= $hero->getMana();

$_SESSION['combats']=$difficulte;
$_SESSION['fight']=0;

header('location: test.php');


?>

