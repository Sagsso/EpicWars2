<?php

require_once DATABASE . "connection.php";


class History_bl{

    public static function show() {
        $result = Connection::getInstance()->select('*', '`History`', "`History`.`userid` = '" . $_SESSION["user_id"] . "'");
        return $result;
    }

    public static function create($history) {
        return Connection::getInstance()->insert('`History`', ["userid" =>$history->getChallengerId(), "duelo" => $history->getDuelo(), "result" => $history->getResult(), "detail" => $history->getDetail()]);
    }
}
?>