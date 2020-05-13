<?php

require_once BUSINESS.'Characters_bl.php';

/**
 * It's the class in charge of managing the logic of the game.
 */
class Game implements IGame{

    /**
     * @var ICharacter $character1 The first character, who challenges.
     */
    private $character1;

    /**
     * @var ICharacter $character2 The second character, who is challenged.
     */
    private $character2;

    /**
     * @var IHistory $history The history of the challenge.
     */
    private $history;

    function __construct(ICharacter $character1, ICharacter $character2) {
        $this->character1 = $character1;
        $this->character2 = $character2;
        $this->history = new History();
        $this->history->setChallengerId($_SESSION['user_id']);
        $this->history->setDuelo($this->character1->getName()." vs ".$this->character2->getName());
        $this->charactersbl = new Characters_bl();
    }
    
    /**
     * Manages the fights between characters.
     * 
     * Artificial intelligence that manages the turns of the characters as well 
     * as the attacks and defenses. It uses character specific functions for damage 
     * and life calculation, updating each character's stats in every iteration. 
     * It is a recursive function.
     * 
     * @param ICharacter $character1 (optional) The character he's going to attack.
     * @param ICharacter $character2 (optional) The character who gets attacked.
     * @return void
     */
    public function fight(ICharacter $character1 = null, ICharacter $character2 = null) :void{

        if ($character1 == null || $character2 == null) {
            //Para cuándo se inicia la pelea
            $character1 = $this->getCharacter1();
            $character2 = $this->getCharacter2();
        }

        $details = $character1->attack($character2);
        echo $this->history->locutor($character1, $character2, $details);

        $HP1 = $character1->getHp();
        $HP2 = $character2->getHp();

        if ($HP1 > 0 && $HP2 > 0) {
            //Aca se gestionan los turnos
            $this->fight($character2, $character1);
        }else if($HP1 <= 0){
            // Acá se elimina de la base de datos
            echo $this->history->death($character1);
            //Se determina si el que inicio el desafio gano
            $this->history->setResult($this->won($character1->getId()));
            $this->charactersbl->delete($character1->getId());
            //Acá se sube de nivel el jugador que ganó
            $character2->resetStats();
            $character2->setLevel(($character2->getLevel())+1);
            //Character_bl::update($character2);
            $_SESSION['id_character_selected'] = null;
        }else if($HP2 <= 0){
            // Acá se elimina de la base de datos
            echo $this->history->death($character2);
            //Se determina si el que inicio el desafio gano
            $this->history->setResult($this->won($character1));
            $this->charactersbl->delete($character2->getId());
            // Acá se sube de nivel el jugador que ganó
            $character1->resetStats();
            $character1->setLevel(($character1->getLevel())+1);
            //Character_bl::update($character1);
            $_SESSION['id_character_selected'] = null;
        }
    }

    /**
     * Determines the character that won.
     * 
     * This function determines if the player who challenges is 
     * the one who wins the fight. From there you can determine 
     * the status (Victory or Defeat).
     * 
     * @param ICharacter $character The character to be compared.
     * @return int Returns 0 if the challenging player is the one who enters as $character.
     */
    function won(ICharacter $character) {
        return ($character == $this->getCharacter1()) ? 1 : 0;
    }

    /**
     * Gets the character1.
     * @return ICharacter
     */
    function getCharacter1() {
        return $this->character1;
    }

    /**
     * Sets the character1.
     * @param ICharacter $character
     * @return void
     */
    function setCharacter1(ICharacter $character): void {
        $this->character1 = $character;
    }

    /**
     * Gets the character2.
     * @return ICharacter
     */
    function getCharacter2() {
        return $this->character2;
    }

    /**
     * Sets the character2.
     * @param ICharacter $character
     * @return void
     */
    function setCharacter2(ICharacter $character): void {
        $this->character2 = $character;
    }

    /**
     * Gets the history.
     * @return IHistory
     */
    function getHistory() {
        return $this->history;
    }

    /**
     * Sets the history.
     * @param IHistory $history
     * @return void
     */
    function setHistory(IHistory $history): void {
        $this->history = $history;
    }

}