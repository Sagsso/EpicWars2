<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Character
 *
 * @author pabhoz
 */

require_once BUSINESS.'characters_bl.php';

class Game implements IGame{

    private $character1;
    private $character2;
    private $history;

    function __construct(ICharacter $character1, ICharacter $character2) {
        $this->character1 = $character1;
        $this->character2 = $character2;
        $this->history = new History();
    }
    
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
            Characters_bl::delete($character1);
            //Acá se sube de nivel el jugador que ganó
            $character2->resetStats();
            $character2->setLevel(($character2->getLevel())+1);
            $_SESSION['id_character_selected'] = null;
        }else if($HP2 <= 0){
            // Acá se elimina de la base de datos
            echo $this->history->death($character2);
            //Se determina si el que inicio el desafio gano
            $this->history->setResult($this->won($character1));
            Characters_bl::delete($character2->getId());
            // Acá se sube de nivel el jugador que ganó
            $character1->resetStats();
            $character1->setLevel(($character1->getLevel())+1);
            $_SESSION['id_character_selected'] = null;
        }
    }

    function won(ICharacter $character): bool {
        return ($character == $this->getCharacter1()) ? true: false;
    }

    function getCharacter1() {
        return $this->character1;
    }

    function setCharacter1(ICharacter $character): void {
        $this->character1 = $character;
    }

    function getCharacter2() {
        return $this->character2;
    }

    function setCharacter2(ICharacter $character): void {
        $this->character2 = $character;
    }

    function getHistory() {
        return $this->history;
    }

    function setHistory(IHistory $history): void {
        $this->history = $history;
    }

}