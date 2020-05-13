<?php

/**
 * The warrior class is in charge of creating an object with all 
 * the information referring to the warrior entity as well as 
 * defining attributes, calculations, and statistics specific 
 * to the class.
 */
class Warrior extends Character{

    function __construct($name) {
        parent::__construct($name, 1, 10, 4, 6, 2, 6, 110);
    }
    
    /**
     * Make an attack on another character.
     * 
     * It generates all the necessary calculations to determine the damage 
     * that will be done to the other character with values of the warrior's 
     * skills.
     * 
     * @param ICharacter $target The character who will be attacked.
     * @return array Array with the properties of the attack carried out.
     */
    public function attack(\ICharacter $target): array {
        $isCritical = $this->isCritical( (0.6 * $this->getStr()) / 100);
        $damage = (!$isCritical) ? 1.4 * $this->getStr() : (1.4 * $this->getStr()) * 2 ;
        $result = $target->getDamage($damage, false);
        $dates = array('critical' => $isCritical, 'damage' => $damage, 'magical' => $result['magical'], 'takenDamage' => $result['takenDamage']);
        return $dates;
    }

    /**
     * It makes a defense with respect to an attack received.
     * 
     * It generates all the necessary calculations to determine the defense 
     * that will be done depending the values of the warrior's 
     * skills. The defense depends on the value of the damage and the type of 
     * blow. In addition, the character's stats are updated with the final damage.
     * 
     * @param float $value Damage received.
     * @param bool $isMagical Damage type.
     * @return array Array with the properties of the defense.
     */
    public function getDamage(float $value, bool $isMagical): array {
        $takenDamage = ($isMagical) ? $value - $this->getMDef(): $value - (0.8 * $this->getFDef());
        $this->setHp($this->getHp() - $takenDamage);
        $result = array('magical' => $isMagical, 'takenDamage' => $takenDamage);
        return $result;
    }

    /**
     * Sets the warrior's stats.
     * @param array $stats
     * @return void
     */
    public function setStats(array $stats): void {
        // Hay que hacer la validación de que el arreglo traiga todos los datos necesarios
        $this->setStr($stats['str']);
        $this->setIntl($stats['intl']);
        $this->setAgi($stats['agi']);
        $this->setMDef($stats['mdef']);
        $this->setFDef($stats['fdef']);
        $this->setHp($stats['hp']);
    }

    /**
     * Defines the warrior's stats in its initial state (Level 1).
     * 
     * @return void
     */
    public function resetStats(): void {
        $this->setStr(10);
        $this->setIntl(4);
        $this->setAgi(6);
        $this->setMDef(2);
        $this->setFDef(6);
        $this->setHp(110);
    }
        
    /**
     * Set the level, and perform the necessary calculations to 
     * update the stats depending on the new level.
     * 
     * @param array $stats
     * @return void
     */
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
