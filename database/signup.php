<?php

require_once 'connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conexion->insert('user', ["username" =>  $username, "password" => $password]);

    echo "usuario registrado";

    header('Location: ' . URL);
}
?>