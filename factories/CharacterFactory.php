<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CharacterFactory
 *
 * @author pabhoz
 */
class CharacterFactory implements ICharacterFactory{
    
    public static function getMage(string $name, string $house = null): \Mage {
        return new Mage($name, $house);
    }

    public static function getRogue(string $name): \Rogue {
        return new Rogue($name);
    }

    public static function getWarrior(string $name): \Warrior {
        
    }

}
