<?php

/**
 * Description of CharacterFactory
 *
 * This factory is in charge of managing the instance of the characters.
 */
class CharacterFactory implements ICharacterFactory{
    
    /**
     * Create a mage type character.
     * 
     * Creates the instance of a new mage, with a predefined level of 1.
     * 
     * @param string $name Name of the character.
     * @return Mage An instance.
     */
    public static function createMage(string $name): \Mage {
        return new Mage($name);
    }

    /**
     * Create a rogue type character.
     * 
     * Creates the instance of a new rogue, with a predefined level of 1.
     * 
     * @param string $name Name of the character.
     * @return Rogue An instance.
     */
    public static function createRogue(string $name): \Rogue {
        return new Rogue($name);
    }

    /**
     * Create a warrior type character.
     * 
     * Creates the instance of a new warrior, with a predefined level of 1.
     * 
     * @param string $name Name of the character.
     * @return Warrior An instance.
     */
    public static function createWarrior(string $name): \Warrior {
        return new Warrior($name);
    }

    /**
     * Create an existing character.
     * 
     * Creates an instance for a character that is brought from the database.
     * 
     * @param int $id It receives a number that represents a specific character 
     * on the character table.
     * @return ICharacter An instance of character-type.
     */
    public static function getCharacter(int $id): \ICharacter {
        $className = "create".ucfirst(Characters_bl::getClass($id));
        $character = CharacterFactory::{$className}(Characters_bl::getCharacterName($id));
        $character->setId($id);
        $character->setLevel(Characters_bl::getLevel($id));
        return $character;
    }

}
