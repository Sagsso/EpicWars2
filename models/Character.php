<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Character
 *
 * @author pabhoz
 */
abstract class Character implements ICharacter{
    
    protected $name;
    protected $level;
    protected $str;
    protected $intl;
    protected $agi;
    protected $mDef;
    protected $fDef;
    protected $hp;

    function __construct($name, $level, $str, $intl, $agi, $mDef, $fDef, $hp) {
        $this->name = $name;
        $this->level = $level;
        $this->str = $str;
        $this->intl = $intl;
        $this->agi = $agi;
        $this->mDef = $mDef;
        $this->fDef = $fDef;
        $this->hp = $hp;
    }

    
    abstract public function attack(\ICharacter $target): array;

    abstract public function getDamage(float $value, bool $isMagical): array;

    abstract public function getStat(string $statName): float;

    public function getStats(): array {
        return ["level" => $this->getLevel(),"str" => $this->getStr(),"intl" => $this->getIntl(),"agi" => $this->getAgi()
                ,"mDef" => $this->getMDef(),"fDef" => $this->getFDef(),"hp" => $this->getHp()];
    }

    abstract public function iDie(): void;

    abstract public function setStat(string $statName, float $value): void;

    abstract public function setStats(array $stats): void;

    abstract public function resetStats(): void;
    
    protected function isCritical(float $rate) :bool {
        $roll = mt_rand(0,100);
        return ($roll <= $rate * 100) ? true: false;
    }

    protected function isMagical() :bool {
        $roll = mt_rand(0,1);
        return ($roll == 0) ? false: true;
    }
    
    function getName() {
        return $this->name;
    }

    function getLevel() {
        return $this->level;
    }

    function getStr() {
        return $this->str;
    }

    function getIntl() {
        return $this->intl;
    }

    function getAgi() {
        return $this->agi;
    }

    function getMDef() {
        return $this->mDef;
    }

    function getFDef() {
        return $this->fDef;
    }

    function getHp() {
        return $this->hp;
    }

    function setName($name): void {
        $this->name = $name;
    }

    function setLevel($level): void {
        $this->level = $level;
    }

    function setStr($str): void {
        $this->str = $str;
    }

    function setIntl($intl): void {
        $this->intl = $intl;
    }

    function setAgi($agi): void {
        $this->agi = $agi;
    }

    function setMDef($mDef): void {
        $this->mDef = $mDef;
    }

    function setFDef($fDef): void {
        $this->fDef = $fDef;
    }

    function setHp($hp): void {
        $this->hp = $hp;
    }

}
