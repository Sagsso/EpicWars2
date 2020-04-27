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

    function __construct($name) {
        parent::__construct($name, 1, 10, 4, 6, 2, 6, 110);
    }
    
    public function attack(\ICharacter $target): array {
        $isCritical = $this->isCritical( (0.6 * $this->getStr()) / 100);
        $damage = (!$isCritical) ? 1.4 * $this->getStr() : (1.4 * $this->getStr()) * 2 ;
        $result = $target->getDamage($damage, false);
        $dates = array('critical' => $isCritical, 'damage' => $damage, 'magical' => $result['magical'], 'takenDamage' => $result['takenDamage']);
        return $dates;
    }

    public function getDamage(float $value, bool $isMagical): array {
        $takenDamage = ($isMagical) ? $value - $this->getMDef(): $value - (0.8 * $this->getFDef());
        $this->setHp($this->getHp() - $takenDamage);
        $result = array('magical' => $isMagical, 'takenDamage' => $takenDamage);
        return $result;
    }

    public function getStat(string $statName): float {
        
    }

    public function iDie(): void {
        
    }

    public function setStat(string $statName, float $value): void {
        
    }

    public function setStats(array $stats): void {
        // Hay que hacer la validación de que el arreglo traiga todos los datos necesarios
        $this->setStr($stats['str']);
        $this->setIntl($stats['intl']);
        $this->setAgi($stats['agi']);
        $this->setMDef($stats['mdef']);
        $this->setFDef($stats['fdef']);
        $this->setHp($stats['hp']);
    }

    public function resetStats(): void {
        $this->setStr(10);
        $this->setIntl(4);
        $this->setAgi(6);
        $this->setMDef(2);
        $this->setFDef(6);
        $this->setHp(110);
    }
        
    function setLevel($level): void {
        $this->level = $level;
        if ($this->level > 1) {
            $newStats = array (
            'str' => $this->getStr() * (2.3 * ($this->getLevel() - 1)),
            'intl' => $this->getIntl() * (1.5 * ($this->getLevel() - 1)),
            'agi' => $this->getAgi() * (1.6 * ($this->getLevel() - 1)),
            'mdef' => $this->getMDef() * (1.6 * ($this->getLevel() - 1)),
            'fdef' => $this->getFDef() * (1.1 * ($this->getLevel() - 1)),
            'hp' => $this->getHp() * (1.5 * ($this->getLevel() - 1))
            );
            $this->setStats($newStats);
        }
    }
}
