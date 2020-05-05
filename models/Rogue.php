<?php

/**
 * Description of Rogue
 *
 * The rogue class is in charge of creating an object with all 
 * the information referring to the rogue entity as well as 
 * defining attributes, calculations, and statistics specific 
 * to the class.
 */
class Rogue extends Character{

    function __construct($name)
    {
        parent::__construct($name, 1, 4, 6, 10, 5, 5, 90);
    }

    /**
     * Make an attack on another character.
     * 
     * It generates all the necessary calculations to determine the damage 
     * that will be done to the other character with values of the rogue's 
     * skills.
     * 
     * @param ICharacter $target The character who will be attacked.
     * @return array Array with the properties of the attack carried out.
     */
    public function attack(\ICharacter $target): array
    {
        $isCritical = $this->isCritical((0.8 * $this->getAgi()) / 100);
        $damage = (!$isCritical) ? 1.2 * $this->getAgi() : (1.2 * $this->getAgi()) * 2.5;
        $result = $target->getDamage($damage, $this->isMagical());
        $dates = array('critical' => $isCritical, 'damage' => $damage, 'magical' => $result['magical'], 'takenDamage' => $result['takenDamage']);
        return $dates;
    }

    /**
     * It makes a defense with respect to an attack received.
     * 
     * It generates all the necessary calculations to determine the defense 
     * that will be done depending the values of the rogue's 
     * skills. The defense depends on the value of the damage and the type of 
     * blow. In addition, the character's stats are updated with the final damage.
     * 
     * @param float $value Damage received.
     * @param bool $isMagical Damage type.
     * @return array Array with the properties of the defense.
     */
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


    /**
     * Sets the rogue's stats.
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
     * Defines the rogue's stats in its initial state (Level 1).
     * 
     * @return void
     */
    public function resetStats(): void {
        $this->setStr(4);
        $this->setIntl(6);
        $this->setAgi(10);
        $this->setMDef(5);
        $this->setFDef(5);
        $this->setHp(90);
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
