<?php

require_once DATABASE."connection.php";

class Characters_bl
{
    
    public static function getAll() {
            return Connection::getInstance()->select('*', 'user_character', "username = '" . $_SESSION["username"] . "'");
    }

    public static function getRivals() {
        $username = $_SESSION['username'];
        // $characterSelected = $_SESSION['characterselected'];
        $level = Connection::getInstance()->select('level', 'user_character', "username = '" . $username . "'")[0]["level"];
        $limitLevel = $level + 2;
        //Obtener los personajes de otros usuarios entre los niveles cercanos.
        $result = Connection::getInstance()->select('*', 'user_character', "username != '$username' AND level BETWEEN $level AND $limitLevel");
        return $result;
    }

}
