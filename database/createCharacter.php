<?php

require_once 'connection.php';
echo "Personaje creado";
if (isset($_POST['name']) && isset($_POST['class'])) {
    $name = $_POST['name'];
    $class = $_POST['class'];
    
    print_r($name);
    print_r($class);

    switch ($class) {
        case 'Mage':
            $newCharacter = CharacterFactory::getMage($name);
            $conexion->insert('user_character', ["username" => $_SESSION['username'] ,"name" => $name, "level" => $newCharacter->getLevel(), "class" => $class]);
            break;
        case 'Warrior':
            $newCharacter = CharacterFactory::getWarrior($name);
            $conexion->insert('user_character', ["username" => $_SESSION['username'], "name" => $name, "level" => $newCharacter->getLevel(), "class" => $class]);
            break;
        case 'Rogue':
            $newCharacter = CharacterFactory::getRogue($name);
            $conexion->insert('user_character', ["username" => $_SESSION['username'], "name" => $name, "level" => $newCharacter->getLevel(), "class" => $class]);
            break;
        default:
            # code...
            break;
    }

    // $conexion->insert('user', ["username" =>  $username, "password" => $password]);

    // echo "usuario registrado";

    // header('Location: ' . URL);
}
