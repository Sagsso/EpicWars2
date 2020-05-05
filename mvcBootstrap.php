<?php
/**
 * Description of mvcBootstrap
 *
 * It is in charge of filtering the url addresses, 
 * and partitions them into according to the relevant information, 
 * which is divided into controllers and views to be displayed.
 */

$url = ( isset($_GET["url"]) ) ? $_GET["url"] : "Index/index";
$url = explode("/", $url);

$ctrlr = "Index_controller";
$method = ( isset($url[0]) && $url[0] != null ) ? $url[0] : "index";
$params = ( isset($url[1]) && $url[1] != null ) ? $url[1] : null;


$path = "./controllers/" . $ctrlr . ".php";

if (file_exists($path)) {
    require_once $path;
    
    $ctrlr = new $ctrlr();
    if (method_exists($ctrlr, $method)) {
        if ($params != null) {
            $ctrlr->{$method}($params);
        } else {
            $ctrlr->{$method}();
        }
    } else {
        die('DIE!');
    }
    
}

?>