<?php

require_once "/opt/lampp/htdocs/backendProjects/Parcial2/database/connection.php";

class Characters_bl
{
    
    public static function getAll() {
            return Connection::getInstance()->select('*', 'user_character', "username = '" . $_SESSION["username"] . "'");
    }

    // public static function getAll()
    // {
    //     $patients = Patient::getAll();
    //     return $patients;
    // }

    // public static function create($data)
    // {
    //     if (!isset($data["id"])) {
    //         $data["id"] = null;
    //     }
    //     $patient = Patient::instanciate($data);
    //     $result = $patient->create();
    //     return $result;
    // }
}
