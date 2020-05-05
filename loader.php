<?php

/**
 * Lazy loader.
 *
 * It manages the loading of all project paths and performs all 
 * important file imports so that the program can function and 
 * communicate.
 */
spl_autoload_register(function($class){
    
    if(file_exists(INTERFACES.$class.".php")){
        require_once INTERFACES.$class.".php";
        return 0;
    }
    
    if(file_exists(FACTORIES.$class.".php")){
        require_once FACTORIES.$class.".php";
        return 0;
    }

    if(file_exists(MODELS.$class.".php")){
        require_once MODELS.$class.".php";
        return 0;
    }

    if (file_exists(BUSINESS.$class.".php")) {
        require_once BUSINESS.$class.".php";
        return 0;
    }
    
    require DATABASE . "connection.php";
    

});

