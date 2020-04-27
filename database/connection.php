<?php

require_once 'MySQLiMAdapter.php';



class Connection {

    private static $instance;

    private function __construct() {

    }
    
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new  MySQLiMAdapter('localhost', 'root', '', 'epicwars_mmorpg');
            // echo "conectado";
        }

        return self::$instance;
    }
    
}