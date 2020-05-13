<?php

/**
 * This interface is in charge of naming the 
 * functions that are specific to the character factory object.
 */
interface ICharacterFactory {

    /**
     * Create a mage type character.
     * 
     * Creates the instance of a new mage, with a predefined level of 1.
     * 
     * @param string $name Name of the character.
     * @return Mage An instance.
     */
    function createMage(string $name): Mage;

    /**
     * Create a rogue type character.
     * 
     * Creates the instance of a new rogue, with a predefined level of 1.
     * 
     * @param string $name Name of the character.
     * @return Rogue An instance.
     */
    function createRogue(string $name): Rogue;

    /**
     * Create a warrior type character.
     * 
     * Creates the instance of a new warrior, with a predefined level of 1.
     * 
     * @param string $name Name of the character.
     * @return Warrior An instance.
     */
    function createWarrior(string $name): Warrior;

    /**
     * Create an existing character.
     * 
     * Creates an instance for a character that is brought from the database.
     * 
     * @param int $id It receives a number that represents a specific character 
     * on the character table.
     * @return ICharacter An instance of character-type.
     */
    function getCharacter(int $id, Characters_bl $charactersbl): ICharacter;
}
