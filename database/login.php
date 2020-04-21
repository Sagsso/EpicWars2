<?php

require_once 'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$conexion->insert('user', ["username" =>  $username, "password" => $password]);