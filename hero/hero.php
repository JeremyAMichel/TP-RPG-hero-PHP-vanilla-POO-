<?php

include_once('RpgEntity.php');

abstract class Hero extends RpgEntity{
    protected string $name;
    // protected Race $race;
    protected int $strength = 0;
    protected int $intelligence = 0;
    protected int $agility = 0;

    public function __construct(
        string $name, int $strength,
        int $intelligence, int $agility
    ) {
        $this->name = $name;
        // $this->race = $race;
        $this->level = 1;
        $this->hp = $strength*19;
        $this->hpMax = $this->hp;
        $this->mana = $intelligence*17;
        $this->manaMax = $this->mana;
        $this->strength = $strength;
        $this->intelligence = $intelligence;
        $this->agility = $agility;
        $this->defense = round(($this->agility)/6,2);
        $this->scoreCriticalStrike = 12;
        $this->criticalDamage= 1.5;
    }

    // TOSTRING ex :
    public function __toString(): string {
        $string= 'Nom du Héros : ' . $this->name . ' <br> ';
        $string.= 'Classe : ' . get_class($this) . ' <br> ';
        $string.= 'Level : ' . $this->level . ' <br> ';
        $string.= 'Hp : ' . $this->hp . '/'.$this->hpMax.' <br> ';
        $string.= 'Mana : ' . $this->mana . '/'.$this->manaMax.' <br> ';
        $string.= 'Force : ' . $this->strength . ' <br> ';
        $string.= 'Intelligence : ' . $this->intelligence . ' <br> ';
        $string.= 'Agilité : ' . $this->agility . ' <br> ';
        $string.= 'Dommages MIN : ' . $this->damageMin . ' <br> ';
        $string.= 'Dommages MAX : ' . $this->damageMax . ' <br> ';
        $string.= 'Défense : ' . $this->defense . ' <br> ';
        $string.= 'Chance de crit : ' . $this->scoreCriticalStrike . '% <br> ';
        $string.= 'Multiplicateur crit : ' . ($this->criticalDamage*100) . '% <br> ';
        // $string.= 'Ability : '.$this->getAbilityName().'<br>';
        return $string;     
        
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name):self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the value of strength
     * strengthVariation est le nombre de points de force qu'on enlève ou ajoute
     * @return  self
     */ 
    public function setStrength($strengthVariation):self
    {
        $this->strength += $strengthVariation;
        $this->hpMax += $strengthVariation*19;
        $this->hp += $strengthVariation*19;

        return $this;
    }


    /**
     * Set the value of intelligence
     * intelVariation est le nombre de points de force qu'on enlève ou ajoute
     * @return  self
     */ 
    public function setIntelligence($intelVariation):self
    {
        $this->intelligence += $intelVariation;
        $this->manaMax += $intelVariation*17;
        $this->mana += $intelVariation*17;

        return $this;
    }

    /**
     * Set the value of agility
     * agiVariation est le nombre de points de force qu'on enlève ou ajoute
     * @return  self
     */ 
    public function setAgility($agiVariation):self
    {
        $this->agility += $agiVariation;
        $this->defense += round(($agiVariation/6),2);

        return $this;
    }

    /**
     * Set the value of damageMin
     * $carac est la caractéristique principale de classe du héros
     * @return  self
     */ 
    public function setAttributeUsingMainStat($carac,$caracAjouter):self
    {
        $this->damageMin = $carac*1.2;
        $this->damageMax = $carac*1.4;
        $this->scoreCriticalStrike += $caracAjouter*0.08; //pb ici quand on lvl up
        return $this;
    }

    public abstract function levelUp():void;

    public function setLevel(int $newLevel):void{
        
        if($newLevel>$this->level){
            for($i=$this->level;$i<$newLevel;$i++){
                $this->levelUp();
            }
        }
    }

}

?>