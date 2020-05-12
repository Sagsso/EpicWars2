<?php

/**
 * Description of History
 *
 * The history class is in charge of creating an object of the history 
 * entity with all its respective attributes, and its main objective 
 * is to keep the history of the fights between characters.
 */
class History implements IHistory{

    /**
     * @var string $detail All the events that occurred in the fight.
     * @var int $challengerId Character's ID.
     * @var string $duelo Announce the characters of the fight.
     * @var int $result The result of the fight.
     */
    private $detail;
    private $challengerId;
    private $duelo;
    private $result;
    
    function __construct() {
        $this->msn = '';
    }

    /**
     * He's in charge of reporting all the events that happen in the fight.
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
            $msn3 = $character1->getName().' has a physical defense of '.$character1->getFDef().' and gets a total damage of '.$details['takenDamage'].'</br>';
        }
        $msn4 = $character1->getName().' now has '.$character1->getHp().' hp. </br>';

        $msnfinal = "$msn1 $msn2 $msn3 $msn4";
        $this->setDetail($msnfinal);

        return $msnfinal;
    }
    
    /**
     * The function that announces the death of a player. 
     * It also saves the message within the history details.
     * 
     * @param ICharacter $character The character who died.
     * @return string Final message.
     */
    public function death(ICharacter $character) :string{
        $msn1 = $character->getName().' has died';
        $this->setDetail($msn1);
        return $msn1;
    }

    /**
     * Gets the challenger's ID.
     * @return int
     */
    function getChallengerId() {
        return intval($this->challengerId);
    }

    /**
     * Sets the challenger's ID.
     * @param int $id
     * @return void
     */
    function setChallengerId(int $id): void {
        $this->challengerId = $id;
    }

    /**
     * Gets the Duelo.
     * @return string
     */
    function getDuelo() {
        return $this->duelo;
    }

    /**
     * Sets the Duelo.
     * @param string $duelo
     * @return void
     */
    function setDuelo(string $duelo): void {
        $this->duelo = $duelo;
    }

    /**
     * Gets the details (final message).
     * @return string
     */
    function getDetail() {
        return $this->detail;
    }

    /**
     * Concatenate a new message to the final history details.
     * @param string $newMsn
     * @return void
     */
    function setDetail(string $newMsn): void {
        $this->detail = $this->getDetail().$newMsn;
    }

    /**
     * Gets the result.
     * @return int
     */
    function getResult() {
        return $this->result;
    }

    /**
     * Sets the result.
     * @param string $result
     * @return void
     */
    function setResult($result): void {
        $this->result = $result;
    }

}