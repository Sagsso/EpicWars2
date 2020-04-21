<?php

require_once 'MySQLiMAdapter.php';

$host = 'localhost';
$usuario = 'root';
$clave = '';
$bd = 'epicwars';

$conexion = new MySQLiMAdapter($host,$usuario,$clave,$bd);