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
class History implements IHistory{

    private $detail;
    private $challengerId;
    private $challengedId;
    private $duelo;
    private $result;
    
    function __construct() {
        $this->msn = '';
    }

    public function locutor(ICharacter $character1, ICharacter $character2, array $details) :string{

        $msn1 = $character1->getName().' attacks '.$character2->getName().', ';
        if ($details['critical']) {
            $msn2 = 'and gets a critical hit! generating a total damage of '.$details['damage'].'</br>';
        }else{
            $msn2 = 'and generates a total damage of '.$details['damage'].'</br>';
        }
        if ($details['magical']) {
            $msn3 = $character1->getName().' has a magical defense of '.$character1->getMDef().' and gets a total damage of '.$details['takenDamage'].'</br>';
        }else{
            $msn3 = $character1->getName().' has a physical defense of '.$character1->getMDef().' and gets a total damage of '.$details['takenDamage'].'</br>';
        }
        $msn4 = $character1->getName().' now has '.$character1->getHp().' hp. </br>';

        $msnfinal = "$msn1 $msn2 $msn3 $msn4";
        $this->setDetail($msnfinal);

        return $msnfinal;
    }
    
    public function death(ICharacter $character) :string{

        $msn1 = $character->getName().' has died';
        $this->setDetail($msn1);
        return $msn1;
    }

    function getChallengerId() {
        return intval($this->challengerId);
    }

    function setChallengerId(string $id): void {
        $this->challengerId = $id;
    }
    function getChallengedId() {
        return intval($this->challengedId);
    }

    function setChallengedId(string $id): void {
        $this->challengedId = $id;
    }
    function getDuelo() {
        return $this->duelo;
    }

    function setDuelo(string $str): void {
        $this->duelo = $str;
    }

    function getDetail() {
        return $this->detail;
    }

    function setDetail(string $newMsn): void {
        $this->detail = $this->getDetail().$newMsn;
    }

    function getResult() {
        return $this->result;
    }

    function setResult($result): void {
        $this->result = $result;
    }

}