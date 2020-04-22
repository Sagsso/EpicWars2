<?php

    $https = filter_input(INPUT_SERVER, 'HTTPS');
    $http_host = filter_input(INPUT_SERVER, 'HTTP_HOST');
    $document_root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
    $server_name = filter_input(INPUT_SERVER, 'SERVER_NAME');
    $request_uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
    
    $_PROTOCOL = (!is_null($https) && $https != 'off') ? 'https://' : 'http://';
    define('URL',$_PROTOCOL.preg_replace('/[^a-zA-Z0-9]\.:/i','',$http_host)
    .str_replace('\\','/',substr(dirname(__FILE__),strlen($document_root))).'/');
    
    define('INTERFACES',__DIR__.'/interfaces/');
    define('FACTORIES',__DIR__.'/factories/');
    define('MODELS',__DIR__.'/models/');
    define('DATABASE',__DIR__.'/database/');
    define('BUSINESS',__DIR__.'/businessLogic/');

    define('CONTROLLERS',__DIR__.'/controllers/');
    define('VIEWS',__DIR__.'/views/');

    define('VENDORS','./views/_vendors/');
    define('STYLES','./views/_styles/');

    require_once './loader.php';


