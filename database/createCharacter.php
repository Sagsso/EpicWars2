<?php

require_once 'connection.php';
if (isset($_POST['name']) && isset($_POST['class'])) {
    $name = $_POST['name'];
    $class = $_POST['class'];
    

    switch ($class) {
        case 'Mage':
            $newCharacter = CharacterFactory::getMage($name);
            Connection::getInstance()->insert('`Character`', [ "name" => $name, "level" => $newCharacter->getLevel(), "characterClassId" => 1]);
            $totalId = Connection::getInstance()->query("SELECT COUNT(*) AS total FROM `Character`")[0]["total"];
            Connection::getInstance()->insert('`User_has_Character`', ["Userid" => $_SESSION['user_id'] ,"Characterid" => $totalId]);
            break;
        case 'Rogue':
            $newCharacter = CharacterFactory::getRogue($name);
            Connection::getInstance()->insert('`Character`', ["name" => $name, "level" => $newCharacter->getLevel(), "characterClassId" => 2]);
            $totalId = Connection::getInstance()->query("SELECT COUNT(*) AS total FROM `Character`")[0]["total"];
            Connection::getInstance()->insert('`User_has_Character`', ["Userid" => $_SESSION['user_id'], "Characterid" => $totalId]);
            break;
        case 'Warrior':
            $newCharacter = CharacterFactory::getWarrior($name);
            Connection::getInstance()->insert('`Character`', ["name" => $name, "level" => $newCharacter->getLevel(), "characterClassId" => 3]);
            $totalId = Connection::getInstance()->query("SELECT COUNT(*) AS total FROM `Character`")[0]["total"];
            Connection::getInstance()->insert('`User_has_Character`', ["Userid" => $_SESSION['user_id'], "Characterid" => $totalId]);
            break;
        default:
            # code...
            break;
    }

    header('Location: ' . URL."characters");

    // $conexion->insert('user', ["username" =>  $username, "password" => $password]);

    // echo "usuario registrado";

    // header('Location: ' . URL);
}
