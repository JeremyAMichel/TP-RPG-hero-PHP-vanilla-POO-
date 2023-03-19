<?php 

class Ability
{
    private string $name;
    private int $damage;    
    private int $coutMana;

    public function __construct(string $name, int $damage, int $coutMana)
    {
        $this->name = $name;
        $this->damage = $damage;
        $this->coutMana = $coutMana;
    }
   
    public function getName(): string
    {
        return $this->name;
    }
    
    public function getDamage(): int
    {
        return $this->damage;
    }

    public function getcoutMana(): int
    {
        return $this->coutMana;
    }

    public function setDamage($newDamage) : self {
        $this -> damage = $newDamage;
        return $this;
    }
}

?>