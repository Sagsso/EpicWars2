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
    
    public static function createMage(string $name, string $house = null): \Mage {
        return new Mage($name);
    }

    public static function createRogue(string $name): \Rogue {
        return new Rogue($name);
    }

    public static function createWarrior(string $name): \Warrior {
        return new Warrior($name);
    }

    public static function getCharacter(int $id): \ICharacter {
        $className = "create".ucfirst(Characters_bl::getClass($id));
        $character = CharacterFactory::{$className}(Characters_bl::getCharacterName($id));
        $character->setId($id);
        $character->setLevel(Characters_bl::getLevel($id));
        return $character;
    }

}
