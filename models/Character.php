<?php

/**
 * The character class is in charge of defining all 
 * the attributes that belong to all the characters in general.
 */
abstract class Character implements ICharacter{
    
    /**
     * @var string $name Character's name.
     * @var int $level Character's level.
     * @var int $str Character's strenght.
     * @var int $intl Character's intellect.
     * @var int $agi Character's agility.
     * @var int $mDef Character's magic defense.
     * @var int $fDef Character's physical defense.
     * @var int $id Character's ID.
     */
    protected $name;
    protected $level;
    protected $str;
    protected $intl;
    protected $agi;
    protected $mDef;
    protected $fDef;
    protected $hp;
    protected $id;

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

    /**
     * Manages the character's stats.
     * 
     * Returns all stats of the character's instance.
     * 
     * @return array
     */
    public function getStats(): array {
        return ["level" => $this->getLevel(),"str" => $this->getStr(),"intl" => $this->getIntl(),"agi" => $this->getAgi()
                ,"mdef" => $this->getMDef(),"fdef" => $this->getFDef(),"hp" => $this->getHp()];
    }

    abstract public function resetStats(): void;
    
    /**
     * Determines a critical hit
     * 
     * It generates a logic, where a random number is obtained 
     * to determine the probability of taking a critical hit 
     * within the given range.
     * 
     * @param float $rate 
     * @return bool
     */
    protected function isCritical(float $rate) :bool {
        $roll = mt_rand(0,100);
        return ($roll <= $rate * 100) ? true: false;
    }

    /**
     * Determines a magical hit
     * 
     * It generates a logic, where a random number is obtained 
     * to determine the probability of taking a magical hit.
     * 
     * @return bool
     */
    protected function isMagical() :bool {
        $roll = mt_rand(0,1);
        return ($roll == 0) ? false: true;
    }
    
    /**
     * Gets the character's name.
     * @return string
     */
    function getName() {
        return $this->name;
    }

    /**
     * Gets the character's level.
     * @return int
     */
    function getLevel() {
        return $this->level;
    }

    /**
     * Gets the character's str.
     * @return int
     */
    function getStr() {
        return $this->str;
    }

    /**
     * Gets the character's intl.
     * @return int
     */
    function getIntl() {
        return $this->intl;
    }

    /**
     * Gets the character's agi.
     * @return int
     */
    function getAgi() {
        return $this->agi;
    }

    /**
     * Gets the character's mDef.
     * @return int
     */
    function getMDef() {
        return $this->mDef;
    }

    /**
     * Gets the character's fDef.
     * @return int
     */
    function getFDef() {
        return $this->fDef;
    }

    /**
     * Gets the character's hp.
     * @return int
     */
    function getHp() {
        return $this->hp;
    }

    /**
     * Sets the character's name.
     * @param string $name
     * @return void
     */
    function setName($name): void {
        $this->name = $name;
    }

    /**
     * Sets the character's level.
     * @param int $level
     * @return void
     */
    function setLevel($level): void {
        $this->level = $level;
    }

    /**
     * Sets the character's str.
     * @param int $str
     * @return void
     */
    function setStr($str): void {
        $this->str = $str;
    }

    /**
     * Sets the character's intl.
     * @param int $intl
     * @return void
     */
    function setIntl($intl): void {
        $this->intl = $intl;
    }

    /**
     * Sets the character's agi.
     * @param int $agi
     * @return void
     */
    function setAgi($agi): void {
        $this->agi = $agi;
    }

    /**
     * Sets the character's mDef.
     * @param int $mDef
     * @return void
     */
    function setMDef($mDef): void {
        $this->mDef = $mDef;
    }

    /**
     * Sets the character's fDef.
     * @param int $fDef
     * @return void
     */
    function setFDef($fDef): void {
        $this->fDef = $fDef;
    }

    /**
     * Sets the character's hp.
     * @param int $hp
     * @return void
     */
    function setHp($hp): void {
        $this->hp = $hp;
    }

    /**
     * Gets the character's id.
     * @return int
     */
    function getId(): int
    {
        return $this->id;
    }

    /**
     * Sets the character's id.
     * @param int $id
     * @return void
     */
    function setId($id): void
    {
        $this->id = $id;
    }


}
