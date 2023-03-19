<?php

include_once('ability.php');
/**
 * Class RpgEntity.php
 *
 * @author Kevin Tourret
 */
abstract class RpgEntity
{

    protected int $hp = 0;

    protected int $hpMax = 0;

    protected int $mana = 0;

    protected int $manaMax = 0;

    protected float $defense = 0.0;

    protected int $level = 0;

    protected float $scoreCriticalStrike = 0.0;

    protected float $criticalDamage = 0.0;

    protected int $damageMin = 0;

    protected int $damageMax = 0;

    protected ?Ability $ability;

    public function getName(): string
    {
        return $this->ability->name;
    }
    
    public function getDamage(): int
    {
        return $this->ability->damage;
    }

    // public function getcoutMana(): int
    // {
    //     return $this->ability->coutMana;
    // }
    
    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @return float|int
     */
    public function getScoreCriticalStrike()
    {
        return $this->scoreCriticalStrike;
    }

        /**
     * Set the value of hp
     * $manaVariation est le nombre de point de mana qu'on ajoute ou enlève
     * @return  self
     */ 
    public function setHp($hpVariation):self
    {
        $this->hp += $hpVariation;

        return $this;
    }

    /**
     * @return float
     */
    public function getCriticalDamage(): float
    {
        return $this->criticalDamage;
    }

    /**
     * @return int
     */
    public function getDamageMin(): int
    {
        return $this->damageMin;
    }

    /**
     * @return int
     */
    public function getDamageMax(): int
    {
        return $this->damageMax;
    }

    /**
     * @return int
     */
    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    /**
     * @return int
     */
    public function getAgility(): int
    {
        return $this->agility;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @return int
     */
    public function getHp(): int
    {
        return $this->hp;
    }

    /**
     * @return int
     */
    public function getHpMax(): int
    {
        return $this->hpMax;
    }

    /**
     * @return int
     */
    public function getMana(): int
    {
        return $this->mana;
    }

        /**
     * Set the value of mana
     * $manaVariation est le nombre de point de mana qu'on ajoute ou enlève
     * @return  self
     */ 
    public function setMana($manaVariation):self
    {
        $this->mana += $manaVariation;

        return $this;
    }

    /**
     * @return int
     */
    public function getManaMax(): int
    {
        return $this->manaMax;
    }

    

    /**
     * @return float
     */
    public function getDefense(): float
    {
        return $this->defense;
    }

    /**
     * Une RpgEntity attaque une autre RpgEntity
     *
     * @param RpgEntity $rpgEntity
     */
    public function attack(RpgEntity $rpgEntity): bool
    {
        
        $name = get_class($this);
        $name2 = get_class($rpgEntity);
        if($this instanceof Hero) {
            $name = $this ->getName();
        }
        if($rpgEntity instanceof Hero) {
            $name2 = $rpgEntity ->getName();
        }

        if ($rpgEntity->isDead() || $this->isDead()) {
            echo $name.' ne peut pas attaquer '.$name2.' car il est déjà mort ! <br>';
            return false;
        }else{
            $rand=mt_rand($this->damageMin,$this->damageMax);
            if($this->scoreCriticalStrike>mt_rand(0,100)){
                $rand*=$this->criticalDamage;
                echo ' CRITICAL STRIKE ! <br>';
            }
            //reduction des dégat en fonction de la defense :
            $rand-=ceil(($rand*$rpgEntity->defense)/100);
            echo $name.' attaque '.$name2.' et lui inflige '.$rand.' dommages <br>';
            $rpgEntity->setHp(-$rand);
            echo 'il reste '.$rpgEntity->hp.' hp à '.$name2.'<br> <br>';
            return true;
        }

        
    }

    public function isDead(): bool
    {
        return $this->getHp() <= 0;
    }

    public function useAbility(RpgEntity $rpgEntity):bool{
        $name = get_class($this);
        $name2 = get_class($rpgEntity);
        if($this instanceof Hero) {
            $name = $this ->getName();
        }
        if($rpgEntity instanceof Hero) {
            $name2 = $rpgEntity ->getName();
        }

        if ($rpgEntity->isDead() || $this->isDead()) {
            echo $name.' ne peut pas attaquer '.$name2.' car il est déjà mort ! <br>';
            return false;
        }else{
            if(($this->getMana())<($this->ability->getcoutMana())){
                echo $name.' ne peut pas utiliser '.$this->ability->getName().' car il n\'a pas assez de mana<br>';
                $this->attack($rpgEntity);
                return false;
            }else{
                echo $name.' utilise '.$this->ability->getName().' et inflige '.$this->ability->getDamage().' dommages <br>';
                $rpgEntity->setHp(-($this->ability->getDamage()));
                echo 'il reste '.$rpgEntity->getHp().' hp à '.$name2.'<br> <br>';
                $this->setMana(-$this->getAbilityManaCost());
                return true;
            }        
        }
    }


    /**
     * return ability name
     * @return string
     */
    public function getAbilityName(): string
    {
        return $this->ability->getName();
    }


    /**
     * return ability damage
     * @return int
     */
    public function getAbilityDamage(): int
    {
        return $this->ability->getDamage();
    }

    /**
     * return ability mana cost
     * @return int
     */
    public function getAbilityManaCost(): int
    {
        return $this->ability->getcoutMana();
    }
}
