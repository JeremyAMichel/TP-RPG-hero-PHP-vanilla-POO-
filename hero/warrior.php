<?php 

include_once('hero.php');

class Warrior extends Hero
{
    /**
     * Warrior constructor.
     */
    public function __construct(string $name)
    {
        parent::__construct($name, 24, 14, 12);
        $this-> setAttributeUsingMainStat($this-> strength, $this-> strength);
        $this->ability = new Ability('Heurtoir', ceil(($this->strength)*1.8), 150);

    }

    public function levelUp(): void
    {
        $this->level += 1;
        $this->setStrength(5);
        $this->setIntelligence(2);
        $this->setAgility(1);
        $this->setAttributeUsingMainStat($this-> strength, 5);
        $this->ability->setDamage(($this->strength)*1.8);
    }
}


?>