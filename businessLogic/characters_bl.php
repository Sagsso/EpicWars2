<?php

require_once DATABASE."connection.php";

/**
 * Description of Characters_bl.
 * 
 * It is in charge of creating, bringing, updating, or deleting 
 * specific data, according to the function, 
 * from the table character in the database. 
 */
class Characters_bl
{
    /**
     * Get the class of a character.
     * 
     * Its function is to search the database for the class that corresponds 
     * to the character with a specific ID.
     * 
     * @param int $id It receives a number that represents a specific character 
     * on the character table.
     * @return string The character's class.
     */
    public static function getClass($id) {
        $result1 = Connection::getInstance()->select('characterClassId', '`Character`', "id = ".$id);
        $idClass = $result1[0]['characterClassId'];
        $result = Connection::getInstance()->select('name', '`CharacterClass`', "id =".$idClass);
        return $result[0]["name"];
    }

    /**
     * Get the ID of a character.
     * 
     * Its function is to search the database for the ID number that corresponds 
     * to the name of the character.
     * 
     * @param string $name It receives the character's name.
     * @return int The character's ID.
     */
    public static function getIdCharacter($name)
    {
        $result = Connection::getInstance()->select('id', '`Character`', "name = '" . $name."'");
        return $result[0]["id"];
    }

    /**
     * Get the level of a character.
     * 
     * Its function is to search the database for the level that corresponds 
     * to the character with a specific ID.
     * 
     * @param int $id It receives a number that represents a specific character 
     * on the character table.
     * @return int The character's level.
     */
    public static function getLevel($id) {
        $result = Connection::getInstance()->select('level', '`Character`', "id = ".$id); 
        return $result[0]["level"];
    }
    
    /**
     * Get the name of a character.
     * 
     * Its function is to search the database for the name that corresponds 
     * to the character with a specific ID.
     * 
     * @param int $id It receives a number that represents a specific character 
     * on the character table.
     * @return string The character name.
     */
    public static function getCharacterName($id) {
        if($id != null) {
            $result = Connection::getInstance()->select('name', '`Character`', "id = ".$id); 
            return $result[0]["name"];
        } else {
            return '';
        }
    }
    
    /**
     * Get all the characters of a user.
     * 
     * Its function is to search for all the information corresponding to the 
     * current user's characters. It also determines the *character_selected* 
     * and *id_character_selected* depending on the first character the current 
     * user has registered in the character table.
     * 
     * @return array Of characters.
     */
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

    /**
     * Get the rivals depending the character selected.
     * 
     * Depending on the *id_character_selected* in the current user session, the 
     * function will be searched for the characters of other players with the same 
     * level or within a range of 2 levels higher and lower.
     * 
     * @param int $idCharacter It receives a number that represents a specific 
     * character on the character table.
     * @return array Of characters.
     */
    public static function getRivals($idCharacter) {
        if(isset($_SESSION['id_character_selected'])){
            $username = $_SESSION['username'];
            $id = $_SESSION['user_id'];
            $level = self::getLevel($idCharacter);
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

    /**
     * Delete a character.
     * 
     * This function takes care of removing a row from the character table, 
     * depending on the specific character ID delivered.
     * 
     * @param int $id It receives a number that represents a specific 
     * character on the character table.
     * @return void
     */
    public static function delete($id) {
        $data = array("Characterid" => $id);
        Connection::getInstance()->delete('User_has_Character', $data);
        $data2 = array("id" => $id);
        Connection::getInstance()->delete('`Character`', $data2);
    }

    /**
     * Update the level of a character.
     * 
     * This function updates the level in the database depending on the 
     * specific character ID.
     * 
     * @param ICharacter $character Receives a character-type object.
     * @return void
     */
    public static function update($character) {
        $data = array("level" => $character->getLevel());
        Connection::getInstance()->update(`Character`, $data, 'id = '.$character->getId());
    }

    /**
     * Create a character.
     * 
     * This function is in charge of creating the character depending on 
     * the data obtained by POST method. It calls the character factory to 
     * create an instance of the new character as well as create a new 
     * character in the database.
     * 
     * @return void
     */
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

?>