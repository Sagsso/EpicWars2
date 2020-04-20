<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Warrior
 *
 * @author pabhoz
 */
class Warrior extends Character{
    private $house;
     
    function __construct($name, $house) {
        parent::__construct($name, 1, 10, 4, 6, 2, 6, 110);
        $this->house = $house;
    }
    
    public function attack(\ICharacter $target): void {
        $damage = (!$this->isCritical( (0.6 * $this->getStr()) / 100)) ? 1.4 * $this->getStr() : (1.4 * $this->getStr()) * 2 ;
        $housePrint = (is_null($this->getHouse())) ? '' : " of ".$this->getHouse();
        echo $this->getName().$housePrint." burns ".$target->getName()." for ".$damage." hp! </br>";
        $target->getDamage($damage, true);
    }

    public function getDamage(float $value, bool $isMagical): void {
        $takenDamage = ($isMagical) ? $value - $this->getMDef(): $value - (0.8 * $this->getFDef());
        $this->setHp($this->getHp() - $takenDamage);
        echo $this->getName()." now has ".$this->getHp()." hp </br>";
    }

    public function getStat(string $statName): float {
        
    }

    public function iDie(): void {
        
    }

    public function setStat(string $statName, float $value): void {
        
    }

    public function setStats(array $stats): void {
        
    }
    
    function getHouse() {
        return $this->house;
    }

    function setHouse($house): void {
        $this->house = $house;
    }

        
    function setLevel($level): void {
        $this->level = $level;
        $this->setStr($this->getStr() * (2.3 * ($this->getLevel() - 1)));
        $this->setIntl($this->getIntl() * (1.5 * ($this->getLevel() - 1)));
        $this->setAgi($this->getAgi() * (1.6 * ($this->getLevel() - 1)));
        $this->setMDef($this->getMDef() * (1.6 * ($this->getLevel() - 1)));
        $this->setFDef($this->getFDef() * (1.1 * ($this->getLevel() - 1)));
        $this->setHp($this->getHp() * (1.5 * ($this->getLevel() - 1)));
    }
}
