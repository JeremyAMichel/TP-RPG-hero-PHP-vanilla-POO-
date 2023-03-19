<?php 

include_once('hero.php');

class Magician extends Hero
{
    /**
     * Magician constructor.
     */
    public function __construct(string $name)
    {
        parent::__construct($name, 15, 27, 8);
        $this-> setAttributeUsingMainStat($this-> intelligence, $this->intelligence);
       
        $this->ability = new Ability("Boule de feu", ($this->intelligence*2), 110);
    }

    public function levelUp(): void
    {
        $this->level += 1;
        $this->setStrength(1);
        $this->setIntelligence(6);
        $this->setAgility(1);
        $this->setAttributeUsingMainStat($this->intelligence, 6);
        $this->ability->setDamage(($this->intelligence)*2);
    }

    public function useAbility(RpgEntity $rpgEntity):bool{
        // $name = get_class($this);
        $name2 = get_class($rpgEntity);
        // if($this instanceof Hero) {
        //     $name = $this ->getName();
        // }
        // if($rpgEntity instanceof Monstre) {
        //     $name2 = $rpgEntity ->getName();
        // }

        if ($this->getMana()<$this->ability->getcoutMana()) {
            echo $this->getName().' lance une tongue !';
            $this->attack($rpgEntity);
            return false;
        }else{
            echo $this->getName().' utilise '.$this->ability->getName().' et inflige '.$this->ability->getDamage().' dommages <br>';
            $rpgEntity->setHp(-($this->ability->getDamage()));
            echo 'il reste '.$rpgEntity->getHp().' hp à '.$name2.'<br> <br>';
            $this->setMana(-$this->getAbilityManaCost());
            return true;                    
        }
    }
}


?>