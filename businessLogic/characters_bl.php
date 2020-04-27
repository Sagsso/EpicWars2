<?php

require_once DATABASE."connection.php";

class Characters_bl
{

    public static function getLevel($id) {
        $result = Connection::getInstance()->select('level', '`Character`', "id = ".$id); 
        return $result[0]["level"];
    }
    public static function getCharacter($id) {
        $result = Connection::getInstance()->select('name', '`Character`', "id = ".$id); 
        return $result[0]["name"];
    }
    
    public static function getAll() {
        $query = "SELECT `Character`.id as idCharacter,`Character`.name, `Character`.level, `CharacterClass`.`name`as class FROM `User_has_Character` 
        INNER JOIN `Character` ON `User_has_Character`.Characterid = `Character`.id 
        INNER JOIN `CharacterClass` ON `Character`.`characterClassId` = `CharacterClass`.id
        WHERE `User_has_Character`.`Userid` = '" . $_SESSION["user_id"] . "'";
        $result = Connection::getInstance()->query($query); 
        if(!$_SESSION['character_selected']) {
            $_SESSION['character_selected'] = $result[0]["name"];
        }
        if (!$_SESSION['id_character_selected']) {
            $_SESSION['id_character_selected'] = $result[0]["idCharacter"];
        }
        
        return $result;     
    }

    public static function getRivals() {
        $username = $_SESSION['username'];
        $id = $_SESSION['user_id'];
        // $characterSelected = $_SESSION['character_selected'];
        $level = self::getLevel($_SESSION['id_character_selected']);
        echo $_SESSION['id_character_selected']." - ".$level;
        $limitLevel = $level + 2;
        $queryRivals = "SELECT `User`.id, `User`.username, `Character`.name, `Character`.level, `CharacterClass`.`name` as class 
        FROM `User_has_Character` 
        INNER JOIN `Character` ON `User_has_Character`.Characterid = `Character`.id 
        INNER JOIN `User` ON `User_has_Character`.`Userid` = `User`.id 
        INNER JOIN `CharacterClass` ON `Character`.`characterClassId` = `CharacterClass`.id WHERE `User_has_Character`.`Userid` != $id AND `Character`.level BETWEEN $level AND $limitLevel";
        //Obtener los personajes de otros usuarios entre los niveles cercanos.
        $result = Connection::getInstance()->query($queryRivals);
        return $result;
    }

}
