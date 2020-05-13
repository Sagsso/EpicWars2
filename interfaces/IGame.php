<?php

/**
 * This interface is in charge of naming the 
 * functions that are specific to the game logic.
 */
interface IGame {
    
    /**
     * It is the basis of the game, which consists of recreating the battle 
     * of 2 characters using the attack and defense of each player according to the turns.
     * 
     * @param ICharacter $character1 The character he's going to attack.
     * @param ICharacter $character2 The character who gets attacked.
     * @return void
     */
    function fight(ICharacter $character1, ICharacter $character2) :void;

}