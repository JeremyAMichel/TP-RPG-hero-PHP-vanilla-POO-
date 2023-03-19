<?php 

include_once('hero.php');

class Rogue extends Hero
{
    /**
     * Rogue constructor.
     */
    public function __construct(string $name)
    {
        parent::__construct($name, 13, 11, 26);
        $this-> setAttributeUsingMainStat($this-> agility, $this -> agility);
        $this-> criticalDamage = 1.75;
        $this->ability = new Ability("Embuscade", ($this->agility*1.9), 160);
    }

    public function levelUp(): void
    {
        $this->level += 1;
        $this->setStrength(2);
        $this->setIntelligence(1);
        $this->setAgility(5);
        $this->setAttributeUsingMainStat($this-> agility, 5);
        $this->ability->setDamage(($this->agility)*1.9);
    }

}


?>