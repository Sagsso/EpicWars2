<?php

require_once 'connection.php';
if (isset($_POST['name']) && isset($_POST['class'])) {
    $name = $_POST['name'];
    $class = $_POST['class'];
    

    switch ($class) {
        case 'Mage':
            $newCharacter = CharacterFactory::getMage($name);
            Connection::getInstance()->insert('user_character', ["username" => $_SESSION['username'] ,"name" => $name, "level" => $newCharacter->getLevel(), "class" => $class]);
            break;
        case 'Warrior':
            $newCharacter = CharacterFactory::getWarrior($name);
            Connection::getInstance()->insert('user_character', ["username" => $_SESSION['username'], "name" => $name, "level" => $newCharacter->getLevel(), "class" => $class]);
            break;
        case 'Rogue':
            $newCharacter = CharacterFactory::getRogue($name);
            Connection::getInstance()->insert('user_character', ["username" => $_SESSION['username'], "name" => $name, "level" => $newCharacter->getLevel(), "class" => $class]);
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
