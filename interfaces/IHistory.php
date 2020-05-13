<?php

/**
 * This interface is in charge of naming the 
 * functions that are specific to the history logic.
 */
interface IHistory {
    
    /**
     * It's in charge of reporting all the events that happen in the fight.
     * 
     * It generates chains of strings with information about the fight and 
     * accumulates them in an array to generate a final message. It is also 
     * in charge of saving all the messages in the fight history details 
     * variable.
     * 
     * @param ICharacter $character1 The character he's going to attack.
     * @param ICharacter $character2 The character who gets attacked.
     * @param array $details Array with the attack and defense calculations.
     * @return string Final message.
     */
    function locutor(ICharacter $character1, ICharacter $character2, array $details) :string;
    
    /**
     * The function that announces the death of a player. 
     * It also saves the message within the history details.
     * 
     * @param ICharacter $character The character who died.
     * @return string Final message.
     */
    function death(ICharacter $stats) :string;
}