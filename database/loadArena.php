<?php

require_once 'connection.php';

    $username = $_SESSION['username'];
    // $characterSelected = $_SESSION['characterselected'];
    $level = Connection::getInstance()->select('level','user_character', "username = '".$username."'")[0]["level"];
    print_r($level);
    $limitLevel = $level+2;

    //Obtener los personajes de otros usuarios entre los niveles cercanos.
    $result = Connection::getInstance()->select('*','user_character', "username != '$username' AND level BETWEEN $level AND $limitLevel");
    print_r($result);