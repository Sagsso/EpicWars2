<?php

// require_once DATABASE."connection.php";
 
class Characters_bl
{

    public static function getClass($id) {
        $result1 = Connection::getInstance()->select('characterClassId', '`Character`', "id = ".$id);
        $idClass = $result1[0]['characterClassId'];
        $result = Connection::getInstance()->select('name', '`CharacterClass`', "id =".$idClass);
        return $result[0]["name"];
    }

    public static function getIdCharacter($name)
    {
        $result = Connection::getInstance()->select('id', '`Character`', "name = '" . $name."'");
        return $result[0]["id"];
    }

    public static function getLevel($id) {
        $result = Connection::getInstance()->select('level', '`Character`', "id = ".$id); 
        return $result[0]["level"];
    }
    
    public static function getCharacterName($id) {
        if($id != null) {
            $result = Connection::getInstance()->select('name', '`Character`', "id = ".$id); 
            return $result[0]["name"];
        } else {
            return '';
        }
    }


    
    public static function getAll() {
        $query = "SELECT `Character`.id as idCharacter,`Character`.name, `Character`.level, `CharacterClass`.`name`as class FROM `User_has_Character` 
        INNER JOIN `Character` ON `User_has_Character`.Characterid = `Character`.id 
        INNER JOIN `CharacterClass` ON `Character`.`characterClassId` = `CharacterClass`.id
        WHERE `User_has_Character`.`Userid` = '" . $_SESSION["user_id"] . "'";
        $result = Connection::getInstance()->query($query); 
        if(sizeof($result)>0){
            if(!isset($_SESSION['character_selected'])) {
                $_SESSION['character_selected'] = $result[0]["name"];
            }
            if(!isset($_SESSION['id_character_selected'])) {
                $_SESSION['id_character_selected'] = $result[0]["idCharacter"];
            }
        }
        
        return $result;     
    }

    public static function getRivals($idCharacter) {
        if(isset($_SESSION['id_character_selected'])){
            $username = $_SESSION['username'];
            $id = $_SESSION['user_id'];
            // $characterSelected = $_SESSION['character_selected'];
            // $level = self::getLevel($_SESSION['id_character_selected']);
            $level = self::getLevel($idCharacter);
            // echo $_SESSION['id_character_selected']." - ".$level;
            $limitLevel = $level + 2;
            $queryRivals = "SELECT `Character`.id as idCharacter,`User`.id, `User`.username, `Character`.name, `Character`.level, `CharacterClass`.`name` as class 
            FROM `User_has_Character` 
            INNER JOIN `Character` ON `User_has_Character`.Characterid = `Character`.id 
            INNER JOIN `User` ON `User_has_Character`.`Userid` = `User`.id 
            INNER JOIN `CharacterClass` ON `Character`.`characterClassId` = `CharacterClass`.id WHERE `User_has_Character`.`Userid` != $id AND `Character`.level BETWEEN $level AND $limitLevel";
            //Obtener los personajes de otros usuarios entre los niveles cercanos.
            $result = Connection::getInstance()->query($queryRivals);
            return $result;
        } 
    }

    public static function delete($id) {
        $data = array("Characterid" => $id);
        Connection::getInstance()->delete('User_has_Character', $data);
        $data2 = array("id" => $id);
        Connection::getInstance()->delete('`Character`', $data2);
    }

    public static function update($character) {
        $data = array("level" => $character->getLevel());
        Connection::getInstance()->update(`Character`, $data, 'id = '.$character->getId());
    }

    public static function create() {
        if (isset($_POST['name']) && isset($_POST['class'])) {
            $name = $_POST['name'];
            $class = $_POST['class'];


            switch ($class) {
                case 'Mage':
                    $newCharacter = CharacterFactory::createMage($name);
                    Connection::getInstance()->insert('`Character`', ["name" => $name, "level" => $newCharacter->getLevel(), "characterClassId" => 1]);
                    break;
                case 'Rogue':
                    $newCharacter = CharacterFactory::createRogue($name);
                    Connection::getInstance()->insert('`Character`', ["name" => $name, "level" => $newCharacter->getLevel(), "characterClassId" => 2]);
                    break;
                case 'Warrior':
                    $newCharacter = CharacterFactory::createWarrior($name);
                    Connection::getInstance()->insert('`Character`', ["name" => $name, "level" => $newCharacter->getLevel(), "characterClassId" => 3]);
                    break;
                default:
                    # code...
                    break;
            }

            $newId = self::getIdCharacter($name);
            Connection::getInstance()->insert('`User_has_Character`', ["Userid" => $_SESSION['user_id'], "Characterid" => $newId]);

            header('Location: ' . URL . "characters");
        }

    }


}
