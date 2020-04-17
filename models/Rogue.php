<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rogue
 *
 * @author pabhoz
 */
class Rogue extends Character{

    function __construct($name)
    {
        parent::__construct($name, 1, 4, 6, 10, 5, 5, 90);
    }

    public function attack(\ICharacter $target): void
    {
        $damage = (!$this->isCritical((0.8 * $this->getAgi()) / 100)) ? 1.2 * $this->getAgi() : (1.2 * $this->getAgi()) * 2.5;
        echo $this->getName(). " attacks to " . $target->getName() . " for " . $damage . " hp! </br>";
        $target->getDamage($damage, true);
    }

    public function getDamage(float $value, bool $isMagical): void
    {
        $takenDamage = ($isMagical) ? $value -  $this->getMDef() : $value - $this->getFDef();
        $this->setHp($this->getHp() - $takenDamage);
        echo $this->getName() . " now has " . $this->getHp() . " hp </br>";
    }

    public function getStat(string $statName): float
    {
    }

    public function iDie(): void
    {
    }

    public function setStat(string $statName, float $value): void
    {
    }

    public function setStats(array $stats): void
    {
    }


    function setLevel($level): void
    {
        $this->level = $level;
        $this->setStr($this->getStr() * (1.6 * ($this->getLevel() - 1)));
        $this->setIntl($this->getIntl() * (1.5 * ($this->getLevel() - 1)));
        $this->setAgi($this->getAgi() * (1.9 * ($this->getLevel() - 1)));
        $this->setMDef($this->getMDef() * (1.6 * ($this->getLevel() - 1)));
        $this->setFDef($this->getFDef() * (1.6 * ($this->getLevel() - 1)));
        $this->setHp($this->getHp() * (1.3 * ($this->getLevel() - 1)));
    }
}
