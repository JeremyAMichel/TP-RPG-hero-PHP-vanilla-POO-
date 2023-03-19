<?php 

include_once('hero/magician.php');
include_once('hero/warrior.php');
include_once('hero/rogue.php');
include_once('monstres/gobelin.php');
include_once('monstres/ogre.php');
include_once('monstres/dragon.php');
include_once('difficulte/facile.php');
include_once('difficulte/moyen.php');
include_once('difficulte/hard.php');



session_start();


if(isset($_SESSION['nameHero']) && isset($_SESSION['classHero']) 
&& isset($_SESSION['levelHero']) && isset($_SESSION['hpHero']) 
&& isset($_SESSION['manaHero']) && isset($_SESSION['combats']) && isset($_SESSION['fight'])){
    

    $monster= $_SESSION['combats']->getCombats()[$_SESSION['fight']];

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
    echo 'VERSUS';
    echo '<br><br>';
    echo $monster;
    echo '<br><br>';

    $round=1;
    while(!$hero->isDead() && !$monster->isDead()){
        echo 'ROUND '.$round.'<br><br>';
        if($round%3==0){
            $hero->useAbility($monster);
        }else{
            $hero->attack($monster);
        }        
        if(!$monster->isDead()){
            $monster->attack($hero);
        }
        $round++;
    }
    
    if(!$hero->isDead()){
        //regen de 50% du mana manquant
        $manaRegen=($hero->getManaMax()-$hero->getMana())/2;
        echo $hero->getName(). ' regen '.$manaRegen.' mana et ';
        $hero->setMana($manaRegen);

        //regen de 50% des hp manquant
        $hpRegen=($hero->getHpMax()-$hero->getHp())/2;
        echo $hpRegen.' HP <br><br>';
        $hero->setHp($hpRegen);

        $hero->levelUp();
        echo 'VICTOIRE !<br><br>LEVEL UP !<br><br>';
        echo $hero;
        $_SESSION['hpHero']=$hero->getHp();
        $_SESSION['manaHero']=$hero->getMana();
        $_SESSION['levelHero']=$hero->getLevel();
        $_SESSION['fight']+=1;
        echo '<form action="test.php" method="post"><button type="submit">Retour au Hub</button></form>';

    }else {
        echo 'DEFAITE ...<br><br>';
        echo '<form action="supprHero.php" method="post"><button type="submit">Nouveau Perso</button></form>';

    }


    // echo $hero->getAbilityName();
    // echo $hero->getAbilityDamage();
    // echo $hero->getAbilityManaCost();
    // $_SESSION['levelHero']+=1;
    // $_SESSION['']

}

?>