<?php

require_once DATABASE . "connection.php";

/**
 * Description of History_bl.
 * 
 * It is in charge of creating, bringing, updating, or deleting 
 * specific data, according to the function, 
 * from the table history in the database.  
 */
class History_bl{

    /**
     * show method.
     * 
     * This function is in charge of searching all the histories 
     * related to the current user.
     * 
     * @return array Of histories.
     */
    public static function show() {
        $result = Connection::getInstance()->select('*', '`History`', "`History`.`userid` = '" . $_SESSION["user_id"] . "'");
        return $result;
    }

    /**
     * create method.
     * 
     * This function is responsible for creating a history in the 
     * database related to the current user.
     * 
     * @param IHistory $history Receives a history-type object.
     * @return void
     */
    public static function create($history) {
        Connection::getInstance()->insert('`History`', ["userid" =>$history->getChallengerId(), "duelo" => $history->getDuelo(), "result" => $history->getResult(), "detail" => $history->getDetail()]);
    }
}
?>