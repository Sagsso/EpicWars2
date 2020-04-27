<?php

require_once DATABASE . "connection.php";


class History_bl{

    public static function show() {
        $query = "SELECT `History`.challengerId, `History`.challengedId, `History`.result , `History`.detail, `User`.id, `User`.username FROM `History` INNER JOIN `User_has_Character` ON `History`.challengerId = `User_has_Character`.Characterid
        INNER JOIN `User` ON `User_has_Character`.Userid = `User`.id
        WHERE `User_has_Character`.`Userid` = '" . $_SESSION["user_id"] . "'";
        $result = Connection::getInstance()->query($query); 
        return $result;
    }

    public static function create($history) {
        Connection::getInstance()->insert('`History`', ["userid" =>$history->getChallengerId(), "duelo" => $history->getDuelo(), "result" => $history->getResult(), "detail" => $history->getDetail()]);
    }
}
?>