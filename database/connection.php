<?php

require_once 'MySQLiMAdapter.php';

/**
 * Description of Connection.
 * 
 * This is the class that manages the connection to the database.
 */
class Connection {

    /**
     * @var Connection $instance An instance of self.
     */
    private static $instance;

    private function __construct() {

    }
    
    /**
     * getInstance method.
     * 
     * This function is based on the Singleton design pattern, 
     * which controls the handling of instances in 1.
     * 
     * @return self An instance.
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new MySQLiMAdapter('localhost', 'root', '', 'epicwars_mmorpg');
        }

        return self::$instance;
    }
    
}