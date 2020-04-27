<?php

require_once BUSINESS."characters_bl.php";
require_once FACTORIES."CharacterFactory.php";
//Pa cuando funcione
if (isset($_POST['character'])) {
    header('Location: ' . URL."challenge");
}

$history = [];
$one = CharacterFactory::getWarrior('Garen');
$two = CharacterFactory::getMage('Aurelion');
//fight($one, $two);

function fight($character1, $character2){
    
    $details = $character1->attack($character2);
    gameAnnouncer($character1, $character2, $details);
    
    $HP1 = $character1->getHp();
    $HP2 = $character2->getHp();

    if ($HP1 > 0 && $HP2 > 0) {
        //Aca se gestionan los turnos
        fight($character2, $character1);
    }else if($HP1 <= 0){
        // Acá se elimina de la base de datos
        echo '- '.$character1->getName().' has died';
        //Acá se sube de nivel el jugador que ganó
        $character2->resetStats();
        $character2->setLevel(($character2->getLevel())+1);
    }else if($HP2 <= 0){
        // Acá se elimina de la base de datos
        echo '- '.$character2->getName().' has died';
        // Acá se duce de nivel el jugador que ganó
        $character1->resetStats();
        $character1->setLevel(($character1->getLevel())+1);
    }
}

function gameAnnouncer($character1, $character2, $details){

    //Mensajes a mostrar, y a concatenar para el historial

    echo '- '.$character1->getName().' attacks '.$character2->getName().', ';
    if ($details['critical']) {
        echo 'and gets a critical hit! generating a total damage of '.$details['damage'].'</br>';
    }else{
        echo 'and generates a total damage of '.$details['damage'].'</br>';
    }
    if ($details['magical']) {
        echo $character1->getName().' has a magical defense of '.$character1->getMDef().' and gets a total damage of '.$details['takenDamage'].'</br>';
    }else{
        echo $character1->getName().' has a physical defense of '.$character1->getFDef().' and gets a total damage of '.$details['takenDamage'].'</br>';
    }
    echo $character1->getName().' now has '.$character1->getHp().' hp </br>';

}

?>