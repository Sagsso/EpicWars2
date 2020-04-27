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

    public function attack(\ICharacter $target): array
    {
        $isCritical = $this->isCritical((0.8 * $this->getAgi()) / 100);
        $damage = (!$isCritical) ? 1.2 * $this->getAgi() : (1.2 * $this->getAgi()) * 2.5;
        $result = $target->getDamage($damage, $this->isMagical());
        $dates = array('critical' => $isCritical, 'damage' => $damage, 'magical' => $result['magical'], 'takenDamage' => $result['takenDamage']);
        return $dates;
    }

    public function getDamage(float $value, bool $isMagical): array
    {
        $takenDamage = ($isMagical) ? $value -  $this->getMDef() : $value - $this->getFDef();
        $this->setHp($this->getHp() - $takenDamage);
        $result = array('magical' => $isMagical, 'takenDamage' => $takenDamage);
        return $result;
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
        $this->setStr(4);
        $this->setIntl(6);
        $this->setAgi(10);
        $this->setMDef(5);
        $this->setFDef(5);
        $this->setHp(90);
    }
        
    function setLevel($level): void {
        $this->level = $level;
        if ($this->level > 1) {
            $newStats = array ('str' => $this->getStr() * (1.6 * ($this->getLevel() - 1)),
            'intl' => $this->getIntl() * (1.5 * ($this->getLevel() - 1)),
            'agi' => $this->getAgi() * (1.9 * ($this->getLevel() - 1)),
            'mdef' => $this->getMDef() * (1.6 * ($this->getLevel() - 1)),
            'fdef' => $this->getFDef() * (1.6 * ($this->getLevel() - 1)),
            'hp' => $this->getHp() * (1.3 * ($this->getLevel() - 1))
            );
            $this->setStats($newStats);
        }
    }
}
